<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Holiday extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('admin/holiday_model', 'holiday');
        $this->load->model('admin/category_model', 'category');
        $this->isEmployeeLoggedIn();
    }

    function index()
    {
        $data = array();
        $this->global['title'] = "Holiday";
      
        $deviceType = getDevice();
        if(isset($deviceType) && $deviceType == "mobile"){
            $this->loadEmployeeViews("employee/holiday/managemobile", $this->global, $data , NULL,'employee');
        }else{
            $this->loadEmployeeViews("employee/holiday/manage", $this->global, $data , NULL,'employee');
        }
    }

   //  code for ajax list 
   public function ajax_list()
   {
       $list = $this->holiday->get_datatables();
       $data = [];
       $no = isset($_POST['start']) ? $_POST['start'] : '';
       // save data for parent catelgory list

       // save data for parent catelgory list

       foreach ($list as $currentObj) {
           error_reporting(0);
           // end code for iamge 
           $temp_date = $currentObj->created_at;
           $date_at = date("d-m-Y", strtotime($temp_date));
           $temp_updated_at = $currentObj->updated_at;
           $updated_at = date("d-m-Y", strtotime($temp_updated_at));


           if ($currentObj->status == 1) {
               $status = '<img src="' . base_url() . 'assets/images/verify.png" alt="" style="width: 17px;">';
           } else {
               $status = '<img src="' . base_url() . 'assets/images/unverify.png" alt="" style="width: 17px;">';
           }

           $no++;
           $row = [];
           $row[] = $currentObj->day_name;
           $row[] = $currentObj->date_from;
           $row[] = $currentObj->date_to;
           $row[] = $currentObj->holiday_reason;
           $row[] = $currentObj->days;
           $row[] = $status;
           $data[] = $row;
       }
       $output = [
           "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
           "recordsTotal" => $this->holiday->count_all(),
           "recordsFiltered" => $this->holiday->count_filtered(),
           "data" => $data,
       ];
       //output to json format
       echo json_encode($output);
   }
   // end code for ajax list
}