<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.

 * @since : 15 November 2016
 */
class Attendance extends BaseController
{
	function __construct()
	{

		parent::__construct();

		$this->load->library('pagination');

		 $this->load->helper('url');

		//$this->load->library('ion_auth');

		$this->load->library('form_validation');

		$this->load->model('admin/category_model','category');
		$this->load->model('admin/employee_model','employee');
        $this->load->model('admin/attendance_model', 'attendance');
        // end live codes 
		$this->isEmployeeLoggedIn();
	}

	function index()
	{

        $currentDate = date("Y-m-d");
        $lastMonth = date("M-Y", strtotime($currentDate . ' -1 month'));

        // get this month attendence
        $query = "";
        $this->db->from('emp_attandance');
        $this->db->select('id');
        $this->db->where('salary_month', date("M-Y"));
        $this->db->where('employeeId', $_SESSION['employeeId']);
        $query = $this->db->get();
        $thisMonthAttendance = $query->result();
        $data['thisMonthAttendance'] = count($thisMonthAttendance);
        
        // get last month attendence
        $query = "";
        $this->db->from('emp_attandance');
        $this->db->select('id');
        $this->db->where('salary_month', $lastMonth);
        $this->db->where('employeeId', $_SESSION['employeeId']);
        $query = $this->db->get();
        $lastMonthAttendance = $query->result();
        $data['lastMonthAttendance'] = count($lastMonthAttendance);

        // get total attendence
        $query = "";
        $this->db->from('emp_attandance');
        $this->db->select('id');
        $this->db->where('employeeId', $_SESSION['employeeId']);
        $query = $this->db->get();
        $totalAttendance = $query->result();
        $data['totalAttendance'] = count($totalAttendance);

        $this->global['title'] = "Attendance";
        
        // pre($this->global['totalNotification']);
        // exit();

        $deviceType = getDevice();
        if(isset($deviceType) && $deviceType == "mobile"){
            $this->loadEmployeeViews("employee/attandance/managemobile", $this->global, $data , NULL,'employee');
        }else{
            $this->loadEmployeeViews("employee/attandance/manage", $this->global, $data , NULL,'employee');
        }

    }

	function view($id)
	{

        $query = "";
        $this->db->from('emp_attandance');
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('employeeId', $_SESSION['employeeId']);
        $query = $this->db->get();
        $attendance = $query->result();
        $data['attendance']  = $attendance[0];

        $w = array();
        $w['id'] = $_SESSION['employeeId'];
        $w['field'] = "id,fname,lname,email,phone,profile_image,department,role";
        $employee = $this->employee->findDynamic($w);
        if (!empty($employee)) {
            $data['employee'] = $employee[0];
        }


        $this->global['title'] = "View Attendance";

        $deviceType = getDevice();
        if(isset($deviceType) && $deviceType == "mobile"){
            $this->loadEmployeeViews("employee/attandance/mobileview", $this->global, $data , NULL,'employee');
        }else{
            $this->loadEmployeeViews("employee/attandance/view", $this->global, $data , NULL,'employee');
        }

    }


    

    // end code for ajax_list


    public function ajax_list()
    {
     
        $list = $this->attendance->get_datatables();

        $data = [];
        $no = isset($_POST['start']) ? $_POST['start'] : '';
        // save data for parent catelgory list

        // save data for parent catelgory list

        foreach ($list as $currentObj) {
            error_reporting(0);

            $temp_date = $currentObj->created_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $image = (isset($currentObj->profile_image) && !empty($currentObj->profile_image))?$currentObj->profile_image:'assets/images/user.png';
            $profile_image = '<img src="' . base_url() .$image . '" class="profile_image"> ';
            $name = (isset($currentObj->fname) && !empty($currentObj->fname)) ? $profile_image . $currentObj->fname : '<span class="badge bg-inverse-danger">N/A</span>';
           
            $editBtn = "";
            $deteteBtn = "";
            $no++;
            $row = [];
            $row[] = '<a href="' . base_url() . 'admin/payroll/attendance_view/' . $currentObj->id . '">' . $name . '</a>';
            $row[] = $currentObj->phone;
            $row[] = $currentObj->email;
            $row[] = $this->config->item('department')[$currentObj->department];
            $row[] = date("F-Y",strtotime($currentObj->salary_month));
            $row[] = $date_at;
            $row[] = $currentObj->updated_at;
            $row[] =
                '
                <div class="d-flex mt-2">'.$editBtn.'
                <a class="text-light" href="' . base_url() . 'employee/attendance/view/' . $currentObj->id . '" title="View Attendance" ><i class="bi bi bi-eye-fill mr-2"></i></i></a>' . $deteteBtn . '
                </div> ';

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->attendance->count_all(),
            "recordsFiltered" => $this->attendance->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    // end code for ajax_list




    
    // end code for mobile_ajax_list


    public function mobile_ajax_list()
    {
     
        $list = $this->attendance->get_datatables();

        $data = [];
        $no = isset($_POST['start']) ? $_POST['start'] : '';
        // save data for parent catelgory list

        // save data for parent catelgory list

        foreach ($list as $currentObj) {
            error_reporting(0);

            $temp_date = $currentObj->created_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $image =  (isset($currentObj->profile_image) && !empty($currentObj->profile_image))?$currentObj->profile_image:"assets/images/user.png";
            $profile_image = '<img src="' .base_url().$image. '" class="profile_image"> ';

            $name = (isset($currentObj->fname) && !empty($currentObj->fname)) ? $profile_image . $currentObj->fname : '<span class="badge bg-inverse-danger">N/A</span>';
           
            $editBtn = "";
            $deteteBtn = "";
            $no++;
            $row = [];
            $row[] = '<a href="' . base_url() . 'admin/payroll/attendance_view/' . $currentObj->id . '">' . $name . '</a>';
            $row[] = $currentObj->phone;
            $row[] =
                '
                <div class="d-flex mt-2">'.$editBtn.'
                <a class="text-light" href="' . base_url() . 'employee/attendance/view/' . $currentObj->id . '" title="View Attendance" ><i class="bi bi bi-eye-fill mr-2"></i></i></a>' . $deteteBtn . '
                </div> ';

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->attendance->count_all(),
            "recordsFiltered" => $this->attendance->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    // end code for mobile_ajax_list


 

}