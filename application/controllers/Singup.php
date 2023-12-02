<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';
class Singup extends CI_Controller
{
    
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('base_library');
        $this->load->model('user_model');

        // Cookie helper
        $this->load->helper('cookie');
        // $this->isUserLoggedIn();

     }

    // Index =============================================================
    public function index()
    {

       $data["title"]="Masala Mandali";
       $data["file"]="front/singup";
       $this->load->view('front/includes/template',$data);
    } 

    // code for register 
    public function register()
    {
   
       
        if (isset($_POST)) {
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname', 'First name ', 'required|max_length[25]|trim');
            $this->form_validation->set_rules('phone', 'phone ', 'required|max_length[10]|trim');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[128]|trim');
            $this->form_validation->set_rules('password', 'password', 'required|max_length[255]|trim');
            
            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array(
                    'status' => 'true1',
                    'message' => $this->session->set_flashdata('error', 'Please Fill the form correctly'),
                    // 'reload' => base_url()
                ));
                // $this->session->set_flashdata('error', 'Please Fill the form correctly !');
                //         redirect(base_url('Signup/register'));

                // $this->index();
                
            } else {
                
                $email           = $this->input->post('email');
                $where['email']  = $email;
                $email_status    = $this->user_model->findOneBy($where);
                $where           = array();
                $mobile          = $this->input->post('phone');
                $where['mobile']  = $mobile;
                $mobile_status   = $this->user_model->findOneBy($where);
                
                if (!empty($email_status) || !empty($mobile_status)) {
                    if (!empty($mobile_status) && !empty($email_status)) {

                        echo json_encode(array(
                            'status' => 'true2',
                            // 'message' => $this->session->set_flashdata('error', 'Email or Mobile number alrady exist'),
                            // 'reload' => base_url('Clint_account/register1')
                        ));
                      
                        
                        // $this->session->set_flashdata('error', 'Email or Mobile number alrady exist !');
                        // redirect(base_url('Signup/register'));
                        
                    } else if (!empty($mobile_status)) {
                        echo json_encode(array(
                            'status' => 'true3',
                            // 'message' => $this->session->set_flashdata('error', 'Mobile number alrady exist !'),
                            // 'reload' => base_url('Clint_account/register1')
                        ));

                        // $this->session->set_flashdata('error', 'Mobile number alrady exist !');
                        // redirect(base_url('Clint_account/register1'));
                        
                    } else if (!empty($email_status)) {
                        echo json_encode(array(
                            'status' => 'true4',
                            // 'message' => $this->session->set_flashdata('error', 'Email number alrady exist !'),
                            // 'reload' => base_url('Clint_account/register1')
                        ));

                        // $this->session->set_flashdata('error', 'Email number alrady exist !');
                        // redirect(base_url('Clint_account/register1'));
                        
                    }
                    
                } else {
                   
                    date_default_timezone_set('Asia/Kolkata');
                    $insertdata['name']       = $this->input->post('fname').' '.$this->input->post('lname');
                    $insertdata['email']       = $this->input->post('email');
                    $insertdata['mobile']       = $this->input->post('phone');
                    $insertdata['password']    = md5($this->input->post('password'));
                    $insertdata['status']      = 1;
                    $insertdata['date_at']          = date('Y-m-d H:i:s');
                   
                    $result   =   $this->user_model->save($insertdata);

                    
                    $sessionArray = array(
                        'id'=> $result,
                        'role' => 'User',
                        'email' => $insertdata['email'],
                        'mobile' => $insertdata['mobile'],
                        'name' => $insertdata['name'],
                        'isUserLoggedIn' => TRUE
                    );
                    $this->session->set_userdata($sessionArray);

                    if ($result > 0) {
                        
                        $toEmail = "sadmin@insaaf99.com"; // admin email 
                        $subject = "New Clint Registered ";
                        $message = join('', array(
                          "<div style='background:#ecc9dd; border-radius:8px;padding:7px;'>",
                          "Dear Admin ",
                          "<br/>",
                          "<b style='font-size:15px; color:#3a3a8a;'>",
                          "New Clint Registered Successfully ",
                          "</b>",
                          "<br/>",
                          "<b style='font-size:15px; color:#3a3a8a;'>",
                          "Client Name : ",
                          "</b>",
                          "<b style='font-size:15px;'>",
                          $insertdata['name'],
                          "</b>",
                          "<br/>",
                          "<b style='font-size:15px; color:#3a3a8a;'>",
                          "E-mail : ",
                          "</b>",
                          "<b style='font-size:15px;'>",
                          $insertdata['email'],
                          "</b>",
                          "<br/>",
                          "<b style='font-size:15px;color:#162c97;'>",
                          "Mobile :",
                          "</b>",
                          "<b style='font-size:15px;'>",
                          $insertdata['mobile'],
                          "</b>",
                          "<br>",
                          "<b style='font-size:15px;color:#162c97;'>",
                          "Your Password is :",
                          "</b>",
                          "<b style='font-size:15px;'>",
                          $this->input->post('password'),
                          "</b>",
                          "<div>"
                        ));
                    //    $this->send_email($toEmail, $subject, $message);
                        
                        
                        /* code for send clint registration success mail */
                        $toEmail = $insertdata['email'] ;// client gmail addresss 
                        $subject = "Registered Successfully";
                        $message = join('', array(
                          "<div style='background:#ecc9dd; border-radius:8px;padding:7px;'>",
                          " Hello Dear ",
                          "<b style='font-size:15px; color:#3a3a8a;'>" . $insertdata['name'],
                          "</b>" . " you've registered successfully into <b>Masala Mandli</b>",
                          "<br/>",
                          "<b style='font-size:15px; color:#3a3a8a;'>",
                          "E-mail : ",
                          "</b>",
                          "<b style='font-size:15px;'>",
                          $insertdata['email'],
                          "</b>",
                          "<br/>",
                          "<b style='font-size:15px;color:#162c97;'>",
                          "Mobile :",
                          "</b>",
                          "<b style='font-size:15px;'>",
                          $insertdata['mobile'],
                          "</b>",
                          "<br>",
                          "<b style='font-size:15px;color:#162c97;'>",
                          "Your Login Password is :",
                          "</b>",
                          "<b style='font-size:15px;'>",
                          $this->input->post('password'),
                          "</b>",
                          "<br>",
                          "<b style='font-size:15px;color:#162c97;'>",
                          "Go To Masala Mandli:",
                          "</b>",
                          "<b style='font-size:15px;'>",
                          "<a href='".base_url()."'>Click Here</a>",
                          "</b>",
                          "<div>"
                      ));
                    //    $this->send_email($toEmail, $subject, $message);
                        
                        /* end code for send user registration success mail */
                    }
                    
                    if ($result > 0) {
                       
                    echo json_encode(array(
                            'status' => 'true5',
                            // 'message' => $this->session->set_flashdata('error', 'You have Successfully Registered into'),
                            'reload' => base_url()
                        ));

                    // $this->session->set_flashdata('success', 'You have Successfully Registered into Insaaf99.com');
                    // redirect(base_url('client_dash/Dashboard/index/'.$_SESSION['id']));
                        // $this->session->set_flashdata('success', 'You have Successfully Registered into Insaaf99.com');
                        // redirect(base_url('Clint_account/register1'));
                    } else {
                       
                        echo json_encode(array(
                            'status' => 'true6',
                            // 'message' => $this->session->set_flashdata('error', 'Failed to Register'),
                            // 'reload' => base_url()
                        ));

                        // $this->session->set_flashdata('error', ' Failed to Register');
                        // redirect(base_url('Clint_account/register1'));
                    }
                  
                  
                    
                    
                }
            }
        }
    }


}

?>