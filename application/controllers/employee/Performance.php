<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Performance extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/performance_model', 'performance');
        $this->load->model('admin/category_model', 'category');
        // $this->load->model('admin/banner_model');

        $this->isEmployeeLoggedIn();
    }

    function index()
    {
        $currentMonth = date("Y-F");
        $lastMonth =  date('Y-F',strtotime($currentMonth . ' -1 month'));
        $last12Month =  date('Y-F',strtotime($currentMonth . ' -11 month'));

        // this month performance 
        $w = array();
        $w['month'] = $currentMonth;
        $w['emp_id'] = $_SESSION['employeeId'];
        $thisMonthPerformance = $this->performance->findDynamic($w);
        $data['thisMonthPerformance'] = count($thisMonthPerformance);
        
        // last month performance 
        $w = array();
        $w['month'] = $lastMonth;
        $w['emp_id'] = $_SESSION['employeeId'];
        $lastMonthPerformance = $this->performance->findDynamic($w);
        $data['lastMonthPerformance'] = count($lastMonthPerformance);
        
        // last 12 month performance 
        $this->db->from('performance');
        $this->db->select('id');
        $this->db->where('emp_id', $_SESSION['employeeId']);
        $this->db->where('month >=', date("Y-F", strtotime($last12Month)));
        $this->db->where('month <=', date("Y-F"));
        $query = $this->db->get();
        $last12MonthPerformance = $query->result();
        $data['last12MonthPerformance'] = count($last12MonthPerformance);

        // total performance 
        // last month performance 
        $w = array();
        $w['emp_id'] = $_SESSION['employeeId'];
        $totalEmployeePerformance = $this->performance->findDynamic($w);
        $data['totalEmployeePerformance'] = count($totalEmployeePerformance);


        $this->global['title'] = "Performance";
      
        $deviceType = getDevice();
        if(isset($deviceType) && $deviceType == "mobile"){
            $this->loadEmployeeViews("employee/performance/managemobile", $this->global, $data , NULL,'employee');
        }else{
            $this->loadEmployeeViews("employee/performance/manage", $this->global, $data , NULL,'employee');
        }

    }

    // end code for get list // like country , state , city 

    // code for Add start
    public function add()
    {
        // upload profile image start
        if (isset($_FILES['document']['name']) && $_FILES['document']['name'] != "") {
            $document = $this->uploadSingleImg($_FILES['document'], 'performance_dox', NULL);
        }
            $month = date("Y-F",strtotime($_POST['month']));
        // exit;
        $insertData = array();
        $insertData['document'] = $document;
        $insertData['department'] = $_SESSION['department'];
        $insertData['emp_id'] = $_SESSION['employeeId'];
        $insertData['month'] = $month;
        $insertData['status'] = 1;
        $insertData['created_at'] = date("Y-m-d H:i:s");

        $result = $this->performance->save($insertData);

        // pre($result);
        // exit;

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Performance Added Successfully!');
        } else {
            $this->session->set_flashdata('failed', 'Failed to Add Performance !');
        }
        redirect('employee/performance');
        
    }
    // code for Add end

    //  code for ajax list 
    public function ajax_list()
    {
        $list = $this->performance->get_datatables();

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


            if (isset($currentObj->document) && !empty($currentObj->document)) {
                $document = '<img src="' . base_url().'assets/images/file.png" alt="" style="width:30px;height:30px;border-radius:50%;">';
            } else {
                $document = '<img src="' . base_url() . 'assets/images/file.png" alt="" style="width:30px;height:30px;border-radius:50%;">';
            }

            $action = '<div class="d-flex flex-row bd-highlight mb-3"> 
                            <button class="btn p-1"><a class="text-light" href="' . base_url() . 'employee/performance/view/' . $currentObj->id . '" title="View performance" ><i class="bi bi bi-eye-fill"></i></i></a></button>&nbsp;
                       </div>';
            $no++;
            $row = [];
            $row[] = '<a href="' . base_url() . 'employee/performance/view/' . $currentObj->id . '" title="View performance" class="d-flex" >' . $document .'</a>';
            $row[] = $currentObj->fname.' '.$currentObj->lname;
            $row[] = $currentObj->emp_code;
            $row[] = $currentObj->rating;
            $row[] = $currentObj->month;
            $row[] = $currentObj->created_at;
            $row[] = $action;
            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->performance->count_all(),
            "recordsFiltered" => $this->performance->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    // end code for ajax list

    

    //  code for mobile_ajax_list 
    public function mobile_ajax_list()
    {
        $list = $this->performance->get_datatables();

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


            if (isset($currentObj->document) && !empty($currentObj->document)) {
                $document = '<img src="' . base_url().'assets/images/file.png" alt="" style="width:30px;height:30px;border-radius:50%;">';
            } else {
                $document = '<img src="' . base_url() . 'assets/images/file.png" alt="" style="width:30px;height:30px;border-radius:50%;">';
            }

            $action = '<div class="d-flex flex-row bd-highlight mb-3"> 
                            <button class="btn p-1"><a class="text-light" href="' . base_url() . 'employee/performance/view/' . $currentObj->id . '" title="View performance" ><i class="bi bi bi-eye-fill"></i></i></a></button>&nbsp;
                       </div>';
            $no++;
            $row = [];
            $row[] = $currentObj->rating;
            $row[] = $currentObj->month;
            $row[] = $action;
            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->performance->count_all(),
            "recordsFiltered" => $this->performance->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    // end code for mobile_ajax_list


    function view($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;
            $data["view_data"] = $this->performance->find($id);

            $this->global['title'] = "View Performance";
            $this->loadEmployeeViews("employee/performance/view", $this->global, $data , NULL,'employee');

        }
    }
    // end code for ajax list 

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