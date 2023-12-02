<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Job extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/job_module', 'job');
        $this->load->model('admin/category_model', 'category');

        $this->isEmployeeLoggedIn();
    }

    function index()
    {
        $data = null;
        $this->global['title'] = "Jobs";
 
        $deviceType = getDevice();
        if(isset($deviceType) && $deviceType == "mobile"){
            $this->loadEmployeeViews("employee/job/managemobile", $this->global, $data , NULL,'employee');
        }else{
            $this->loadEmployeeViews("employee/job/manage", $this->global, $data , NULL,'employee');
        }
    }

    
    //  code for  job_ajax_list 
    public function ajax_list()
    {
        $list = $this->job->get_datatables();

        $data = [];
        $no = isset($_POST['start']) ? $_POST['start'] : '';
        // save data for parent catelgory list

        // save data for parent catelgory list

        foreach ($list as $currentObj) {
            error_reporting(0);
            // pre($currentObj);
            // end code for iamge 
            $temp_date = $currentObj->created_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $temp_updated_at = $currentObj->updated_at;
            $updated_at = date("d-m-Y", strtotime($temp_updated_at));

            $status = (isset($currentObj->status) && $currentObj->status == 1) ? '<span class="bg-inverse-success badge">Post Sent</span>' : '<span class="bg-inverse-warning badge">Post Not Sent</span>';
            $attachment = (isset($currentObj->attachment) && !empty($currentObj->attachment)) ? '<a href="' . base_url() . $currentObj->attachment . '" target="_blank" title="View Attachment"><img src="' . base_url() . 'assets/images/file.png" style="width:20px;height:20px;"></a>' : '<img src="' . base_url() . 'assets/images/nofile.png" style="width:30px;height:30px;border-radius:50%;">';
            $no++;
            $row = [];
            $row[] = $attachment;
            $row[] = $currentObj->designation;
            $row[] = $currentObj->experience;
            $row[] = $status;
            $row[] = $date_at;
            $row[] =
                '
                <a  href="' . base_url() . 'admin/jobportal/edit_job/' . $currentObj->id . '" title="Edit Salarys" ><i class="bi bi-pencil-square"></i></a>
                <a href="javascript:void(0)" data_id="' . $currentObj->id . '" ><i class="bi bi-trash"></i></a>
              
                      ';
            //   <li class=""><a class="" href="' .base_url() .'admin/jobportal/view_history/' .$currentObj->id .'" title="View History" >View History</i></a></li>

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->job->count_all(),
            "recordsFiltered" => $this->job->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    // end code for ajax list 
    
    //  code for  mobile_ajax_list 
    public function mobile_ajax_list()
    {
        $list = $this->job->get_datatables();

        $data = [];
        $no = isset($_POST['start']) ? $_POST['start'] : '';
        // save data for parent catelgory list

        // save data for parent catelgory list

        foreach ($list as $currentObj) {
            error_reporting(0);
            // pre($currentObj);
            // end code for iamge 
            $temp_date = $currentObj->created_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $temp_updated_at = $currentObj->updated_at;
            $updated_at = date("d-m-Y", strtotime($temp_updated_at));

            $status = (isset($currentObj->status) && $currentObj->status == 1) ? '<span class="bg-inverse-success badge">Post Sent</span>' : '<span class="bg-inverse-warning badge">Post Not Sent</span>';
            $attachment = (isset($currentObj->attachment) && !empty($currentObj->attachment)) ? '<a href="' . base_url() . $currentObj->attachment . '" target="_blank" title="View Attachment"><img src="' . base_url() . 'assets/images/file.png" style="width:20px;height:20px;"></a>' : '<img src="' . base_url() . 'assets/images/nofile.png" style="width:30px;height:30px;border-radius:50%;">';
            $no++;
            $row = [];
            $row[] = $attachment;
            $row[] = $currentObj->designation;
            $row[] = $status;
            $row[] =
                '
                <a  href="' . base_url() . 'admin/jobportal/edit_job/' . $currentObj->id . '" title="Edit Salarys" ><i class="bi bi-pencil-square"></i></a>
                <a href="javascript:void(0)" data_id="' . $currentObj->id . '" ><i class="bi bi-trash"></i></a>
              
                      ';
            //   <li class=""><a class="" href="' .base_url() .'admin/jobportal/view_history/' .$currentObj->id .'" title="View History" >View History</i></a></li>

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->job->count_all(),
            "recordsFiltered" => $this->job->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    // end code for mobile_ajax_list 

}