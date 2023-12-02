<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Login extends BaseController
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
       
     }

    // Index =============================================================
    public function index()
    {
    //    session_unset();
       $data["title"]="LearnWithS2 - Tutorial";
       $data["file"]="front/login";
       $this->load->view('front/includes/template',$data);
    } 

    public function loginNow()
    {
       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array(
                'status' => 'true1',
                // 'message' => $this->session->set_flashdata('error', 'Please Fill the form correctly'),
                // 'reload' => base_url()
            ));
        }
        else
        {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            
            $result = $this->user_model->loginMe($email, $password);
			if(count($result) > 0)
            {

            
                foreach ($result as $res)
                {
                    $sessionArray = array('id'=>$res->id,                    
                                            'role'=> 'User',
                                            'email'=>$res->email,
                                            'phone'=>$res->mobile,
                                            'name'=>$res->name,
                                            'isUserLoggedIn' => TRUE
                                    );
                                    
                $this->session->set_userdata($sessionArray);
                     
            echo json_encode(array(
                'status' => 'true2',
                // 'message' => $this->session->set_flashdata('error', 'Please Fill the form correctly'),
                'reload' => base_url()
            ));
                }
            }
            else	
            {

                echo json_encode(array(
                    'status' => 'true3',
                    // 'message' => $this->session->set_flashdata('error', 'Please Fill the form correctly'),
                    // 'reload' => base_url()
                ));
                
             
                // $this->session->set_flashdata('error', 'Email or password mismatch');
                
                // redirect('/admin/login');
            }
        }
    }

     // Logout =============================================================
     public function logout()
     {
        session_unset();
        session_destroy();
        $data["title"]="Masala Mandli";
        $data["file"]="front/index";
        $this->load->view('front/includes/template',$data);
     } 
}

?>