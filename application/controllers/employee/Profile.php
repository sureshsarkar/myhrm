<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Profile extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('admin/employee_model', 'employee');
        $this->load->model('admin/category_model', 'category');
        $this->isEmployeeLoggedIn();
    }

    function index()
    {

        $data = array();
        $data["view_data"] = $this->employee->find($_SESSION['employeeId']);
        $this->global['title'] = "Employee Profile";
      
       update_employee_session($_SESSION['employeeId']);// update profile complition

        $this->loadEmployeeViews("employee/employee/profile", $this->global, $data , NULL,'employee');
    }



   public function addPoliceCode()
    {

    $screenshort =  $this->uploadSingleImg($_FILES['police_code_file'], 'profile', NULL);

    $updateData = array();
    $updateData['id'] = $_SESSION['employeeId'];
    $updateData['police_code'] = $_POST['police_code'];
    $updateData['police_code_file'] = $screenshort;

    $this->employee->save($updateData);

    redirect('employee/profile');

    }


    
    // upload uploadSingleImg start
    public function uploadSingleImg($FILENAME, $FOLDERNAME, $OLDFILES)
    {
        if (isset($FILENAME['name']) && $FILENAME['name'] != "") {
            $f_name = $FILENAME['name'];
            $f_tmp = $FILENAME['tmp_name'];
            $f_size = $FILENAME['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = 'hrm_' . uniqid() . '.' . $f_extension;
            $store = 'uploads/' . $FOLDERNAME . '/' . $f_newfile;
            if (!move_uploaded_file($f_tmp, $store)) {
                $this->session->set_flashdata('failed', 'Image Upload Failed .');
            } else {
                $file = (isset($OLDFILES)) ? $OLDFILES : "";
                if (file_exists($file)) {
                    unlink($file);
                }
                return $store;
            }
        }

    }
    // upload uploadSingleImg end



}