<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.

 * @since : 15 November 2016
 */
class Dashboard extends BaseController
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
	
        // end live codes 
		$this->isLoggedIn();
	}



	function index()
	{
// pre($_SESSION);

        //New Employee
        $curentDate = new DateTime(); // Get the current date and time
        $curentDate->sub(new DateInterval('P3M')); // Subtract 3 months
        $lastData = $curentDate->format('Y-m-d');
        
        $this->load->model('admin/salary_model','salary');
        $this->load->model('admin/performance_model','performance');
        $this->load->model('admin/holiday_model','holiday');
        $this->load->model('admin/leavemanagement_model','leavemanagement');
        $this->load->model('admin/job_module','job');

        $data['totalEmployee'] = $this->employee->countRow();
        $data['totalsalary'] = $this->salary->countRow();
        $data['totalEmployeePerformance'] = $this->performance->countRow();
        $data['totalHoliday'] = $this->holiday->countRow();
        $data['totalLeaves'] = $this->leavemanagement->countRow();
        $data['totalJobs'] = $this->job->countRow();

        $this->db->from('employee');
        $this->db->select('id');
        $this->db->where('employee.joining_date >', $lastData);
        $query = $this->db->get();
        $totalNewEmployee = $query->result();
        $data['totalNewEmployee'] = count($totalNewEmployee);
        
        // $query = "";
        $totalMoney = 0;
        $w['field'] = "id,net_salary"; 
        $Salary =  $this->salary->findDynamic($w);
   
        if(isset($Salary[0])){
            for ($i=0; $i < count($Salary); $i++){ 
              $totalMoney = intval($totalMoney) + intval($Salary[$i]->net_salary);
            }
        }
        $data['totalSalaryMoney'] = $totalMoney;


        $month = date("F",strtotime(date("Y-m-d") . ' -1 month'));
        // get development salary
        $lastMonthDeveloperMoney = 0;
        $w = array();
        $w['month'] = $month;
        $w['department'] = 1; 
        $w['field'] = "id,emp_id,month,net_salary"; 
        $developerSalary =  $this->salary->findDynamic($w);
        if(isset($developerSalary[0])){
            for ($i=0; $i < count($developerSalary); $i++){ 
              $lastMonthDeveloperMoney = intval($lastMonthDeveloperMoney) + intval($developerSalary[$i]->net_salary);
            }
        }
        // get designer salary
        $lastMonthDesignerMoney = 0;
        $w = array();
        $w['month'] = $month; 
        $w['department'] = 2; 
        $w['field'] = "id,emp_id,month,net_salary"; 
        $designerSalary =  $this->salary->findDynamic($w);
        if(isset($designerSalary[0])){
            for ($i=0; $i < count($designerSalary); $i++){ 
              $lastMonthDesignerMoney = intval($lastMonthDesignerMoney) + intval($designerSalary[$i]->net_salary);
            }
        }
        // get SEO salary
        $lastMonthSeoMoney = 0;
        $w = array();
        $w['month'] = $month; 
        $w['department'] = 3; 
        $w['field'] = "id,emp_id,month,net_salary"; 
        $seoSalary =  $this->salary->findDynamic($w);
        if(isset($seoSalary[0])){
            for ($i=0; $i < count($seoSalary); $i++){ 
              $lastMonthSeoMoney = intval($lastMonthSeoMoney) + intval($seoSalary[$i]->net_salary);
            }
        }

        $pieChartSalaryData = array(['Developer', $lastMonthDeveloperMoney],['Design', $lastMonthDesignerMoney],['SEO', $lastMonthSeoMoney]);
        $data['lastMonthDeveloperMoney'] = (isset($lastMonthDeveloperMoney) && !empty($lastMonthDeveloperMoney))?$lastMonthDeveloperMoney:0;
        $data['lastMonthDesignerMoney'] =  (isset($lastMonthDesignerMoney) && !empty($lastMonthDesignerMoney))?$lastMonthDesignerMoney:0;
        $data['lastMonthSeoMoney'] =  (isset($lastMonthSeoMoney) && !empty($lastMonthSeoMoney))?$lastMonthSeoMoney:0;
        $data['pieChartSalaryData'] = json_encode($pieChartSalaryData,true);


        // last 6 month start 
        $last6MonthArr = array();
        $y = date("Y");

        for ($a=5; $a >=0 ; $a--) {
           
            $month =  date("F",strtotime(date("Y-m-d") . '-'.$a.' month'));
           
            $sql ='';
            $sql ="SELECT id,net_salary,month FROM `salary` WHERE `month` = '$month'";
            $wSalary =  $this->salary->rawquery($sql);

            $wSalaryArr = 0;
            if(isset($wSalary) && !empty($wSalary)){
                foreach ($wSalary as $k => $v) {
                    $wSalaryArr = $wSalaryArr + $v->net_salary;
                }
            }

            $last6MonthArr[] = array($month,$wSalaryArr);
        }

            $data['last6MonthData'] = json_encode($last6MonthArr,true);
        //last 6 month end

		// end code for total enquiry 
        $data['title']="dashboard";
        $this->load->view('admin/dashboard',$data);
    }

	public function total_list(){
		$list = $this->employee_model->get_datatables();
        $data = [];
        $no = isset($_POST['start']) ? $_POST['start'] : '';
        // save data for parent catelgory list
        foreach ($list as $currentObj) {
            $temp_date = $currentObj->date_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
          
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $currentObj->DestinationName;
            $row[] = $currentObj->type;
            $row[] = $currentObj->name;
            $row[] = $currentObj->email;
            $row[] = $currentObj->mobile;
            $row[] = $currentObj->message;
            $row[] = $currentObj->date_at;

            // $row[] = $currentObj->DestinationName;
            if($currentObj->status==1){
                $status1 = '<span class="btn-success badge">Active</span>
                
                ';
            }else{
                $status1 = '<span class="btn-danger badge">In-Active</span
                
                ';
            }
            $row[] = $status1;
            $row[] =
                '<a class="btn btn-sm btn-info" href="'.base_url().'admin/dashboard/viewEnq/'.$currentObj->id .'" title="Edit" ><i class="fa fa-eye"></i></a>&nbsp;&nbsp;  <a  title="Delete"   class="btn btn-sm btn-danger deletebtn deletebtn" href="javascript:void(0)" title="delete"  data_id="' .
                $currentObj->id .
                '" ><i class="fa fa-trash"></i></a> ';

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->employee_model->count_all(),
            "recordsFiltered" => $this->employee_model->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
	}

    public function total_list1(){
		$list = $this->visa_employee_model->get_datatables();
        $data = [];
        $no = isset($_POST['start']) ? $_POST['start'] : '';
        // save data for parent catelgory list

        // save data for parent catelgory list

        foreach ($list as $currentObj) {
            $temp_date = $currentObj->date_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
          
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $currentObj->DestinationName;
            $row[] = $currentObj->type;
            $row[] = $currentObj->name;
            $row[] = $currentObj->email;
            $row[] = $currentObj->mobile;
            $row[] = $currentObj->message;
            $row[] = $currentObj->date_at;

            // $row[] = $currentObj->DestinationName;
            if($currentObj->status==1){
                $status1 = '<span class="btn-success badge">Active</span>
                
                ';
            }else{
                $status1 = '<span class="btn-danger badge">In-Active</span
                
                ';
            }
            $row[] = $status1;
            $row[] =
                '<a class="btn btn-sm btn-info" href="'.base_url().'admin/dashboard/viewEnq1/'.$currentObj->id .'" title="Edit" ><i class="fa fa-eye"></i></a>&nbsp;&nbsp;  <a  title="Delete"   class="btn btn-sm btn-danger deletebtn deletebtn" href="javascript:void(0)" title="delete"  data_id="' .
                $currentObj->id .
                '" ><i class="fa fa-trash"></i></a> ';

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->visa_employee_model->count_all(),
            "recordsFiltered" => $this->Visa_Employee_model->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
	}
    public function total_list2(){
    
		$list = $this->Cus_Employee_model->get_datatables();
      
        $data = [];
        $no = isset($_POST['start']) ? $_POST['start'] : '';
        // save data for parent catelgory list

        // save data for parent catelgory list
        foreach ($list as $currentObj) {
            $temp_date = $currentObj->date_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            if(!empty($currentObj->hotelRattings)){
                $hotel_rating = json_decode($currentObj->hotelRattings);
            }else{
                $hotel_rating='';
            }
            if(!empty($currentObj->country_name)){
                $country_name = $currentObj->country_name;
            }else{
                $country_name='';
            }
            if($currentObj->flighttobeIncluded==1){
                $flighttobeIncluded='Yes';
            }else{
                $flighttobeIncluded="No";
            }
            if($currentObj->cabforlocal==1){
                $cabforlocal='Yes';
            }else{
                $cabforlocal="No";
            }
            if(!empty($currentObj->totalPrice)){
                $totalPrice ='	₹ '.$currentObj->totalPrice;
            }else{
                $totalPrice='';
            }

            if(!empty($currentObj->message)){
                $message =$currentObj->message;
            }else{
                $message='';
            }
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $currentObj->packageType;
            $row[] = $country_name;
            $row[] = $currentObj->name;
            $row[] = $currentObj->email;
            $row[] = $currentObj->mobile;
            $row[] = $message;
            $row[] = $hotel_rating;
            $row[] = $flighttobeIncluded;
            $row[] = $currentObj->adult;
            $row[] = $currentObj->Infant;
            $row[] = $currentObj->child;
            $row[] = $currentObj->iwillbook;
            $row[] = $cabforlocal;
            $row[] = $currentObj->packageprefer;
            $row[] = $currentObj->prefertocall;
            $row[] = $currentObj->age;
            $row[] = $currentObj->tourType;
            $row[] = $totalPrice;
            if($currentObj->status==1){
                $status1 = '<span class="btn-success badge">Active</span>
                
                ';
            }else{
                $status1 = '<span class="btn-danger badge">In-Active</span
                
                ';
            }
            $row[] = $status1;
            $row[] = $currentObj->date_at;

            // $row[] = $currentObj->DestinationName;
         
            $row[] =
                '<a class="btn btn-sm btn-info" href="'.base_url().'admin/dashboard/viewEnq2/'.$currentObj->id .'" title="Edit" ><i class="fa fa-eye"></i></a>&nbsp;&nbsp;  <a  title="Delete"   class="btn btn-sm btn-danger deletebtn deletebtn" href="javascript:void(0)" title="delete"  data_id="' .
                $currentObj->id .
                '" ><i class="fa fa-trash"></i></a> ';

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->Cus_Employee_model->count_all(),
            "recordsFiltered" => $this->Cus_Employee_model->count_filtered(),
            "data" => $data,
        ];

        //output to json format
        echo json_encode($output);
	}

 
	// code for delete enq 
	function Enqdelete($id = '')
    {
       
        if (isset($_POST)) {
            $id = $_POST["id"];
        }

        if (isset($id) and !empty($id)) {
          	$count = $this->employee_model->countRow();
            if (isset($count) and !empty($count)) {
                $this->employee_model->delete($id);

                $this->session->set_flashdata('message', ' Enquiry Deleted Successfully !');

                echo "success";

                exit();
            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }
    function Enqdelete2($id = '')
    {
       
        if (isset($_POST)) {
            $id = $_POST["id"];
        }

        if (isset($id) and !empty($id)) {
          	$count = $this->Cus_Employee_model->countRow();
            if(isset($count) and !empty($count)) {
                $this->Cus_Employee_model->delete($id);
                $this->session->set_flashdata('message', ' Enquiry Deleted Successfully !');
                echo "success";
                exit();
            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }
    function Enqdelete1($id = '')
    {
        if (isset($_POST)) {
            $id = $_POST["id"];
        }
        if (isset($id) and !empty($id)) {
          	$count = $this->visa_employee_model->countRow();
            if (isset($count) and !empty($count)) {
                $this->visa_employee_model->delete($id);

                $this->session->set_flashdata('message', ' Visa Enquiry Deleted Successfully !');

                echo "success";

                exit();
            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }

	// end code for delete enq 

}