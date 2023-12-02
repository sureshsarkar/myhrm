<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.

 * @since : 15 November 2016
 */
class Login extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');

        $this->load->helper('url');

        //$this->load->library('ion_auth');

        $this->load->library('form_validation');
        $this->load->model('sub_admin/login_model');

    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        // echo "ok";
        $this->isLoggedInSubAdmin();
    }

    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedInSubAdmin()
    {
        //  $this->load->view('sub_admin/login');
        $isLoggedInSubAdmin = $this->session->userdata('isLoggedInSubAdmin');
       
        if (!isset($isLoggedInSubAdmin) || $isLoggedInSubAdmin != true) {
            
            $this->load->view('sub_admin/login');
        } else {
           
            redirect('sub_admin/dashboard');
        }
        
    }

    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $result = $this->login_model->loginMe($email, md5($password));
            if (count($result) > 0) {
                $up = array();
                $up['id'] = $result[0]->id;
                $up['last_activity'] =date('Y-m-d H:i:s');
                $up['system_ip'] = $_SERVER['SERVER_ADDR'];
                $up['last_login'] = date("Y-m-d H:i:s");
                $this->login_model->save($up);

                $this->load->model('admin/user_history_model','user_history');

                $w = array();
                $w['owner_id'] = $result[0]->id;
                $w['owner_name'] = $result[0]->name;
                $w['login_at'] =date('Y-m-d H:i:s');
                $w['system_ip'] = $_SERVER['SERVER_ADDR'];
                $this->user_history->save($w);
              

                foreach ($result as $res) {
                    $sessionArray = ['userId' => $res->id, 'role' => $res->role, 'email' => $res->email, 'phone' => $res->phone, 'name' => $res->name, 'isLoggedInSubAdmin' => true];

                    $this->session->set_userdata($sessionArray);

                    redirect('/sub_admin/dashboard');
                }
            } else {
                $this->session->set_flashdata('error', 'Email or password mismatch');

                redirect('/sub_admin/login');
            }
        }
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $this->load->view('sub_admin/forgotpassword');
    }

    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {
        $status = '';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('login_email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->forgotPassword();
        } else {
            $email = $this->input->post('login_email');

            if ($this->login_model->checkEmailExist($email)) {
                $encoded_email = urlencode($email);

                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum', 15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();

                $save = $this->login_model->resetPasswordUser($data);

                if ($save) {
                    $data1['reset_link'] = base_url() . "admin/login/resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if (!empty($userInfo)) {
                        $data1["name"] = $userInfo[0]->name;
                        $data1["email"] = $userInfo[0]->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);
                    if ($sendStatus) {
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                } else {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            } else {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('sub_admin/login/forgotPassword');
        }
    }

    // This function used to reset the password
    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);

        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

        $data['email'] = $email;
        $data['activation_code'] = $activation_id;

        if ($is_correct == 1) {
            $this->load->view('newPassword', $data);
        } else {
            redirect('sub_admin/login');
        }
    }

    // This function used to create new password
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = $this->input->post("email");
        $activation_id = $this->input->post("activation_code");

        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');

        if ($this->form_validation->run() == false) {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        } else {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');

            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

            if ($is_correct == 1) {
                $this->login_model->createPasswordUser($email, $password);

                $status = 'success';
                $message = 'Password changed successfully';
            } else {
                $status = 'error';
                $message = 'Password changed failed';
            }

            setFlashData($status, $message);

            redirect("sub_admin/login");
        }
    }

    // checkLogin 
    public function checkLogin(){
       if(isset($_POST['live']) && $_POST['live'] == '1'){
       $this->updateLogin($_SESSION['userId']);
       echo "online";
       }
     
    }

    // updateLogin
    public function updateLogin($userId){
        $up['id'] = $userId;
        $up['last_activity'] =date('Y-m-d H:i:s');
        $up['system_ip'] = $_SERVER['SERVER_ADDR'];
        $this->login_model->save($up);
    }

    function logout()
    {
        $w = array();
        $w['id'] = $_SESSION['userId'];
        $w['last_logout'] = date("Y-m-d H:i:s");
        $this->login_model->save($w);
        // $this->session->sess_destroy();
        session_unset();
        redirect("sub_admin/login");
    }
}

?>
