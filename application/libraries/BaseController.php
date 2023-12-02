<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 
require APPPATH . "../assets/plugins/phpmailer/vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
/**
 * Class : BaseController
 * Base Class to control over all the classes

 * @since : 15 November 2016
 * @since : 02 November 2022
 */
class BaseController extends CI_Controller {
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $roleText = '';
	protected $global = array ();
	
	/**
	 * Takes mixed data and optionally a status code, then creates the response
	 *
	 * @access public
	 * @param array|NULL $data
	 *        	Data to output to the user
	 *        	running the script; otherwise, exit
	 */
	public function response($data = NULL) {
		$this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
	}
	
	/**
	 * This function used to check the user is logged in or not
	 */
	function isLoggedIn() {
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
			redirect ();
		} else {
			$this->role = $this->session->userdata ( 'role' );
			$this->vendorId = $this->session->userdata ( 'userId' );
			$this->name = $this->session->userdata ( 'name' );
			$this->roleText = $this->session->userdata ( 'roleText' );
			
			$this->global ['name'] = $this->name;
			$this->global ['role'] = $this->role;
			$this->global ['role_text'] = $this->roleText;
		}
	}

    function isEmployeeLoggedIn() {
		$isEmployeeLoggedIn = $this->session->userdata('isEmployeeLoggedIn' );
		
		if (! isset ( $isEmployeeLoggedIn ) || $isEmployeeLoggedIn != TRUE) {
			redirect ();
		} else {
            $this->global['totalNotiCount'] = $this->totalNotiCount();
            $this->global['totalNotification'] = $this->getNotification();
			$this->role = $this->session->userdata ( 'role' );
			$this->vendorId = $this->session->userdata ( 'userId' );
			$this->name = $this->session->userdata ( 'name' );
			$this->roleText = $this->session->userdata ( 'roleText' );
			
			$this->global ['name'] = $this->name;
			$this->global ['role'] = $this->role;
			$this->global ['role_text'] = $this->roleText;
		}
	}

	function isUserLoggedIn(){
		$isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
		
		if (! isset ( $isUserLoggedIn ) || $isUserLoggedIn != TRUE) {
			redirect ('login');
		} else {
			$this->role = $this->session->userdata ('role');
			$this->vendorId = $this->session->userdata ( 'id' );
			$this->name = $this->session->userdata ( 'name' );
			$this->global ['name'] = $this->name;
		}
	}
	

	function isAdmin() {
		if ($this->role != ROLE_ADMIN) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * This function is used to check the access
	 */
	function isTicketter() {
		if ($this->role != ROLE_ADMIN || $this->role != ROLE_MANAGER) {
			return true;
		} else {
			return false;
		}
	}
	
	   public function get_ordersales($day)

    {

      

        if($day==1){

            $day =0;

        }else{

            $day = $day;

        }

        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

        $date_at = date('Y-m-d H:i:s');

        $date_at = strtotime($date_at);

        $date_at = strtotime("-$day day", $date_at);     

        $week_date =  date('Y-m-d', $date_at);

        $current_date  = date('Y-m-d H:i:s');

        $sql = "SELECT * FROM `z_payment` WHERE `payment_date` BETWEEN '$week_date' AND '$current_date' ";

   

        $result = $this->payment_model->rawQuery($sql);

       // pre($result);

        if(!empty($result))

        {

            return $result;

        }



    }


	/**
	 * This function is used to load the set of views
	 */
	function loadThis() {
		$this->global ['pageTitle'] = 'CodeInsect : Access Denied';
		
		$this->load->view ( 'includes/header', $this->global );
		$this->load->view ( 'access' );
		$this->load->view ( 'includes/footer' );
	}
	
	/**
	 * This function is used to logged out user from system
	 */
	function logout() {
		$this->session->sess_destroy ();
		
		redirect ( 'login' );
	}

	/**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){

        $this->load->view('admin/includes/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('admin/includes/footer', $footerInfo);
    }

    function loadEmployeeViews($viewName = NULL, $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL,$type = NULL){

		
		if($type=='employee')
		{
			$header_location="employee/includes/header";
			$footer_location="employee/includes/footer";
		}

		if(!isset($pageInfo['header_hide'])){
        	$this->load->view($header_location, $headerInfo);
		}
        $this->load->view($viewName, $pageInfo);
		if(!isset($pageInfo['footer_hide'])){
        	$this->load->view($footer_location, $pageInfo);
		}
    }



    function loadSingleViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){

        //$this->load->view('admin/includes/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        //$this->load->view('admin/includes/footer', $footerInfo);
    }
	 

    /* code for menu */
    public function getCategory($data)
    {
    	
        $table = $data['table'];
        $arr = array();
        $arr['status']      = 1;
        $arr['field']       =   'id,cat_name,slug';
        $arr['limit']       =   $data['limit'];  
        $arr['table']       =   $table;
     
		$mainMenu = $this->category_model->findDynamic($arr);
		
        $mainCategoryList = array();
        foreach ($mainMenu as $key => $value) {
            $mainCategoryList[$value->id] = $value;
            $inData = isset($inData)?$inData.","."'".$value->id."'":"'".$value->id."'";
			
        }
        if(isset($inData)){
            $sql = "SELECT id,category_id,sub_category_name,slug FROM `sub_category` WHERE `category_id` in ($inData) AND `status`='1'";
            $rData = $this->category_model->rawQuery($sql);
		   
        }
        $subCategoryList = array();
        if(!empty($rData)){
			foreach ($rData as $value) {
				$subCategoryList[$value->id] = $value;
				$inData1 = isset($inData1)?$inData1.","."'".$value->id."'":"'".$value->id."'";
			}
		}
		
        $data = array('category' => $mainCategoryList, 'subCategory' =>$subCategoryList  );
        

		return $data;
        
    }


    function convert_number_to_words(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred','thousand','lakh', 'crore');
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
    }

    function findDynamic($where)  
    {
        foreach($where as $key=>$v)
        {
            // Fields set
            if($key == 'field')
            {
                $this->db->select($v);
            }
            // Order By
            if($key == 'orderby')
            {
                $temp_order = explode('-',$v);
                if(count($temp_order) >1)
                    $this->db->order_by($temp_order[1], 'DESC');
                else
                    $this->db->order_by($v, 'ASC');
            }
            // LIMIT
            if($key == 'limit')
            {
                $temp = explode(',', $v);
                if(isset($temp[1]))
                $this->db->limit($temp[0],$temp[1]);
                else
                $this->db->limit($v);
            }
            // Like
            if($key == 'like')
            {
                $temp = explode(',',$v);
                
                $this->db->like($temp[0], $temp[1]);
                
            }            
            // where
            if($key != 'field' AND $key != 'orderby' AND $key != 'limit' AND $key != 'table' AND $key != 'like')
            {
                $temp_where = array($key=>$v);
               $this->db->where($temp_where);
            }
            
        } 
        if(!isset($where['table']))
            $this->db->from($this->table);      
        else
            $this->db->from($where['table']); 

        $query = $this->db->get(); 
        //  $this->db->last_query();

        $result = $query->result();     
      //  pre($result);   
        return $result;
    }


    // end dynmic function

        // raw query
    function rawQuery($sql)  
    {
        $query = $this->db->query($sql);
        //$result =  $query->result_array();
        $result = $query->result();        
        return $result;
    }
// end raw query 
	/**
	 * This function used provide the pagination resources
	 * @param {string} $link : This is page link
	 * @param {number} $count : This is page count
	 * @param {number} $perPage : This is records per page limit
	 * @return {mixed} $result : This is array of records and pagination data
	 */
	function paginationCompress($link, $count, $perPage = 10) {
		$this->load->library ( 'pagination' );
	
		$config ['base_url'] = base_url () . $link;
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = SEGMENT;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 5;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
	
		$this->pagination->initialize ( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment ( SEGMENT );
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}


    public function send_email_old($toEmail,$subject,$message){

        $mail = new PHPMailer(true);

        //Enable SMTP debugging.

        $mail->SMTPDebug = 3; // if want on put 3 and hide 0

        //Set PHPMailer to use SMTP.

        $mail->isSMTP();

        //Set SMTP host name

        $mail->Host         = "smtp.gmail.com";

        //Set this to true if SMTP host requires authentication to send email

        $mail->SMTPAuth     = true;

        //Provide username and password

        $mail->Username     = "test@techcentrica.co.in";

        $mail->Password     = "Techcentrica$2023";

        //If SMTP requires TLS encryption then set it

        $mail->SMTPSecure   = "tls";

        //Set TCP port to connect to

        $mail->Port         = '25';//26;

        $mail->From         = "test@techcentrica.co.in";

        $mail->FromName     = "Techcentrica";

        //$mail->addAddress($userData['email']);

        $mail->addAddress($toEmail);//user email address

        $mail->isHTML(true);

        // attachment

       

        $mail->Subject =$subject;

        $mail->Body = $message;

        try {

            $mail->send();

           return 1;

        } catch (Exception $e) {

            echo "Mailer Error: " . $mail->ErrorInfo;

        }

    }


    
// send Email 

function send_email($toEmail,$subject,$message){

    if(empty($toEmail)){
      exit();
    }
    $mail = new PHPMailer(true);
  
    //Enable SMTP debugging.
     $mail->SMTPDebug = 0; 
    // $mail->SMTPDebug = 0; // if want on put 3 and hide 0
  
    //Set PHPMailer to use SMTP.
  
    $mail->isSMTP();
    // $mail->SMTPAuth = true;
  
    //Set SMTP host name
  
    // $mail->Host         = "smtp.gmail.com";
    // $mail->Host         = "clinvia.com";
    $mail->Host         = "mail.tclms.in";
  
    //Set this to true if SMTP host requires authentication to send email
  
    $mail->SMTPAuth     = true;
  
    //Provide username and password
  
    $mail->Username     = "inquiry@tclms.in";
  
    $mail->Password     = "NOIDA@2023";
  
    //If SMTP requires TLS encryption then set it
  
    $mail->SMTPSecure   = "tls";
  
    //Set TCP port to connect to
  
    $mail->Port         =587;// 465;//587;
  
    $mail->From         = "inquiry@tclms.in";
  
    $mail->FromName     = "Techcentrica";
  
    // $mail->addAddress($toEmail);//user email address
    $toArr = explode(',',$toEmail);
    foreach ($toArr as $mail_Id) {
        $mail->addAddress($mail_Id);//user email address
    }

    
  
    $mail->isHTML(true);
  
   // Attachments
   if(isset($attachmentPath) && !empty($attachmentPath)){
     $mail->addAttachment($attachmentPath);
   }
  
    $mail->Subject =$subject;
  
    $mail->Body = $message;
  
    try {
  
        $mail->send();
  
       return 1;
  
    } catch (Exception $e) {
  
        echo "Mailer Error: " . $mail->ErrorInfo;
  
    }
  
  }

    // get Notification 
    public function getNotification(){
        $currentMonth = date("Y-m-d H:i:s");
        $last12Month =  date('Y-m-d H:i:s',strtotime($currentMonth . ' -11 month'));

        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('emp_id', $_SESSION['employeeId']);
        $this->db->where('created_at >=', date("Y-m-d H:i:s", strtotime($last12Month)));
        $this->db->where('created_at <=', date("Y-m-d H:i:s"));
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query->num_rows();
        return $query->result(); 
    }

    //updateNotification 
    public function updateNotification($id){
        $w = array();
        $w['emp_id'] = $_SESSION['employeeId']; 
        $w['seen'] = 1; 
        $this->db->where('id', $id);
        $this->db->update('notification', $w);
    }

    // get totalNotiCount 
    public function totalNotiCount(){
        $w = array();
        $w['table'] = "notification"; 
        $w['field'] = "id"; 
        $w['seen'] = 0; 
        $w['emp_id'] = $_SESSION['employeeId']; 
        return $this->findDynamic($w);
    }

}