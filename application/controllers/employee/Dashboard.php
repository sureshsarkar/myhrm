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
		$this->isEmployeeLoggedIn();
	}



	function index()
	{
 
		// pre($this->global['totalNotification']);
		// exit;

        $w = array();
        $w['emp_id'] = $_SESSION['employeeId']; 
        $w['table'] = "salary"; 
        $totalSalary = $this->employee->findDynamic($w);
        $data['totalSalary'] = count($totalSalary);

		$w = array();
        $w['employeeId'] = $_SESSION['employeeId']; 
        $w['table'] = "attendance"; 
        $totalAttandance = $this->employee->findDynamic($w);
        $data['totalAttandance'] = count($totalAttandance);
		
		
		$w = array();
        $w['table'] = "holiday"; 
        $totalHoliday = $this->employee->findDynamic($w);
        $data['totalHoliday'] = count($totalHoliday);

			
		$w = array();
        $w['table'] = "job_module"; 
        $totalJobs = $this->employee->findDynamic($w);
        $data['totalJobs'] = count($totalJobs);

		$w = array();
        $w['emp_id'] = $_SESSION['employeeId']; 
        $w['table'] = "leave_management"; 
        $totalLeave = $this->employee->findDynamic($w);
        $data['totalLeave'] = count($totalLeave);

		$w = array();
        $w['emp_id'] = $_SESSION['employeeId']; 
        $w['table'] = "performance";
        $totalPerformance = $this->employee->findDynamic($w);
        $data['totalPerformance'] = count($totalPerformance);
		
        // events 
        $currentMonth = date("Y-m-d");
        $last12Month =  date('Y-m-d',strtotime($currentMonth . ' -11 month'));
        $add1Month =  date('Y-m-d',strtotime($currentMonth . ' +1 month'));
        $query = "";
        $this->db->from('event');
        $this->db->select('*');
        $this->db->where('event.event_date >', $last12Month);
        $this->db->where('event.event_date <', $add1Month);
        $this->db->where('status',1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $data['eventsData'] = $query->result();

        $query = "";
        $this->db->from('leave_management');
        $this->db->select('id');
        $this->db->where('emp_id', $_SESSION['employeeId']);
        $this->db->where('created_at >', $last12Month);
        $this->db->where('created_at <', $currentMonth);
        $this->db->where('status',1);
        $query = $this->db->get();
        $data['casualLeave']= $query->result();


         //today events 
         $query = "";
         $this->db->from('event');
         $this->db->select('id');
         $this->db->where('event.event_date', $currentMonth);
         $this->db->where('status',1);
         $this->db->order_by('id','DESC');
         $query = $this->db->get();
         $data['eventEvent'] = count($query->result());

        // get all employee 
        
        $w = array();
        $w['field'] = "id,fname,lname"; 
        $allEmployee = $this->employee->findDynamic($w);
        $data['allEmployee'] = $allEmployee;
// pre($data['casualLeave']);
// exit;
        $this->global['title'] = 'TCHRMS :Dashboard';
        $this->loadEmployeeViews("employee/dashboard", $this->global, $data , NULL,'employee');
    }

    public function updateNotiSeen(){
        $totalNotiCount = $this->totalNotiCount();
       if(isset($totalNotiCount)){
           foreach ($totalNotiCount as $k => $v) {
            $this->updateNotification($v->id);
        }
       }
    }
}