<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.

 * @since : 15 November 2016
 */
class Salary extends BaseController
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
        $this->load->model('admin/salary_model', 'salary');
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

        $this->global['title'] = "Salary";
     
        $deviceType = getDevice();
        if(isset($deviceType) && $deviceType == "mobile"){
            $this->loadEmployeeViews("employee/salary/managemobile", $this->global, $data , NULL,'employee');
        }else{
            $this->loadEmployeeViews("employee/salary/manage", $this->global, $data , NULL,'employee');
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


        $this->global['title'] = "View Salary";
        $this->loadEmployeeViews("employee/salary/view", $this->global, $data , NULL,'employee');

    }

    // end code for ajax_list

 //  code for all salary list
 public function ajax_list()
 {
     $list = $this->salary->get_datatables();
     $data = [];
     $no = isset($_POST['start']) ? $_POST['start'] : '';

     foreach ($list as $currentObj) {
         error_reporting(0);
         // pre($currentObj);
         // end code for iamge 
         $temp_date = $currentObj->created_at;
         $date_at = date("d-m-Y", strtotime($temp_date));
         $temp_updated_at = $currentObj->updated_at;
         $updated_at = date("d-m-Y", strtotime($temp_updated_at));


         $profile_image = '<img src="' . base_url() . $currentObj->profile_image . '" style="width:30px;height:30px;border-radius:50%;"> ';

         $no++;
         $row = [];
         $row[] = (isset($currentObj->fname) && !empty($currentObj->fname)) ? $profile_image . $currentObj->fname : '<span class="badge bg-inverse-danger">N/A</span>';
         $row[] = '₹' . $currentObj->total_earning;
         $row[] = '₹' . $currentObj->total_deduction;
         $row[] = '₹' . $currentObj->net_salary;
         $row[] = $date_at;
         $row[] = '<button type="button" class="btn btn-outline-primary downloadSlip" data_id="' . $currentObj->id . '"><i class="bi bi-cloud-arrow-down"></i></button>';


         $data[] = $row;
     }
     $output = [
         "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
         "recordsTotal" => $this->salary->count_all(),
         "recordsFiltered" => $this->salary->count_filtered(),
         "data" => $data,
     ];
     //output to json format
     echo json_encode($output);
 }

 //  code for all salary list
 public function mobile_ajax_list()
 {
     $list = $this->salary->get_datatables();
     $data = [];
     $no = isset($_POST['start']) ? $_POST['start'] : '';

     foreach ($list as $currentObj) {
         error_reporting(0);
         // pre($currentObj);
         // end code for iamge 
         $temp_date = $currentObj->created_at;
         $date_at = date("d-m-Y", strtotime($temp_date));
         $temp_updated_at = $currentObj->updated_at;
         $updated_at = date("d-m-Y", strtotime($temp_updated_at));


         $profile_image = '<img src="' . base_url() . $currentObj->profile_image . '" style="width:30px;height:30px;border-radius:50%;"> ';

         $no++;
         $row = [];
         $row[] = (isset($currentObj->fname) && !empty($currentObj->fname)) ? $profile_image . $currentObj->fname : '<span class="badge bg-inverse-danger">N/A</span>';
         $row[] = '₹' . $currentObj->total_earning;
         $row[] = '<button type="button" class="btn btn-outline-primary downloadSlip" data_id="' . $currentObj->id . '"><i class="bi bi-cloud-arrow-down"></i></button>';


         $data[] = $row;
     }
     $output = [
         "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
         "recordsTotal" => $this->salary->count_all(),
         "recordsFiltered" => $this->salary->count_filtered(),
         "data" => $data,
     ];
     //output to json format
     echo json_encode($output);
 }

 

 function downloadSlip()
 {
     if (isset($_GET) && !empty($_GET)) {
         $id = $_GET['id'];

         $salaryData = $this->salary->find($id);
         if (isset($salaryData->emp_id) && !empty($salaryData->emp_id)) {
             $w = array();
             $w['id'] = $salaryData->emp_id;
             $w['field'] = "id,fname,lname,role,joining_date,pan_number,bank_name,bank_account_no";
             $employeeData = $this->employee->findDynamic($w);

             if (isset($employeeData) && !empty($employeeData)) {
                 $employeeData = $employeeData[0];
             }

         }

         // pre($salaryData);
         // exit;
         $employeeCode = "HPR" . $employeeData->id;
         $employeeName = $employeeData->fname . ' ' . $employeeData->lname;
         $employeeRole = $employeeData->role;
         $employeeBankName = $employeeData->bank_name;
         $employeeBankAccount = $employeeData->bank_account_no;
         $employeePanNumber = $employeeData->pan_number;
         $employeeJoinDate = $employeeData->joining_date;

         $salaryAttendanceDays = $salaryData->attendance_in_days;
         $salaryPayWithoutLeave = $salaryData->casual_leave;
         $salaryPaidLeave = $salaryData->paid_leave;
         $salaryBasic = $salaryData->paid_leave;
         $salaryTds = $salaryData->tds;
         $salaryHra = $salaryData->hra;
         $salaryConveAllowance = $salaryData->conveyance_allowance;
         $salarySpecialAllowance = $salaryData->special_allowance;
         $salaryCompensation = $salaryData->compensation;
         $salaryCasualLeaveAmount = $salaryData->casual_leave_amount;
         $salarySalaryAdvance = $salaryData->salary_advance;

         $salaryTotalEarning = $salaryData->total_earning;
         $salaryTotalEeduction = $salaryData->total_deduction;
         $salaryNetSalary = $salaryData->net_salary;



         include_once "salary_slip.php";

         $invoiceTemplate;
         //    echo $invoiceTemplate;
         //     exit;

         require APPPATH . "../assets/plugins/php_pdf/vendor/autoload.php";
         $pdfname = rand();
         $mpdf = new \Mpdf\Mpdf();
         $mpdf->WriteHTML($invoiceTemplate);
         //    $fileTempName = "uploads/slip/".$pdfname."invoice.pdf";
         //    $fileName = $fileTempName;
         $mpdf->Output('tc-salary-slip.pdf', 'D');
         /* code for save pdf file in database */
         //    pre($fileTempName);
         redirect('employee/payroll/salary');
     }
 }


}