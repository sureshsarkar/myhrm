<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Policy extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('admin/policy_model', 'policy');
        $this->load->model('admin/category_model', 'category');
        $this->isEmployeeLoggedIn();
    }

    function index()
    {
        $data = array();
        $data["view_data"] = $this->policy->all();
        $this->global['title'] = "Company Policy";
       
        $deviceType = getDevice();
        if(isset($deviceType) && $deviceType == "mobile"){
            $this->loadEmployeeViews("employee/policy/mobilemanage", $this->global, $data , NULL,'employee');
        }else{
            $this->loadEmployeeViews("employee/policy/manage", $this->global, $data , NULL,'employee');
        }
    }

    
     //  code for ajax list 
   public function ajax_list()
   {
       $list = $this->policy->get_datatables();

       $data = [];
       $no = isset($_POST['start']) ? $_POST['start'] : '';
       // save data for parent catelgory list

       // save data for parent catelgory list

       foreach ($list as $currentObj) {
           error_reporting(0);
        //    pre($currentObj);
           // end code for iamge 
           $temp_date = $currentObj->created_at;
           $date_at = date("d-m-Y", strtotime($temp_date));
           $temp_updated_at = $currentObj->updated_at;
           $updated_at = date("d-m-Y", strtotime($temp_updated_at));

           $action = '<div class="d-flex flex-row bd-highlight mb-3">
                           <button class="btn p-1"><a class="text-light" href="' . base_url() . $currentObj->policy_file . '" title="View Document" target="_blank"><i class="bi bi bi-eye-fill"></i></i></a></button>&nbsp;
                      </div>';
           $no++;
           $row = [];
           $row[] = $currentObj->policy_name;
           $row[] = $date_at;
           $row[] = $action;
           $data[] = $row;
       }
       $output = [
           "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
           "recordsTotal" => $this->policy->count_all(),
           "recordsFiltered" => $this->policy->count_filtered(),
           "data" => $data,
       ];
       //output to json format
       echo json_encode($output);
   }
   // end code for ajax list



}