<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Leavemanagement extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/leavemanagement_model', 'leavemanagement');
        $this->load->model('admin/category_model', 'category');

        $this->isEmployeeLoggedIn();
    }

    function index()
    {

        $w = array();
        $w['field'] = 'id';
        $totalLeave = $this->leavemanagement->findDynamic($w);
        $data['totalLeave'] = count($totalLeave);
        
        $this->global['title'] = "Leave Management";
       
        $deviceType = getDevice();
        if(isset($deviceType) && $deviceType == "mobile"){
            $this->loadEmployeeViews("employee/leavemanagement/managemobile", $this->global, $data , NULL,'employee');
        }else{
            $this->loadEmployeeViews("employee/leavemanagement/manage", $this->global, $data , NULL,'employee');
        }

    }
    function leave()
    {
        $data['leavemanagement'] = $this->leavemanagement->getList('leave_management');
        $this->global['title'] = "leavemanagement";
        $this->load->view('admin/leavemanagement/leave_request', $data);
    }

    // Add 
    public function add()
    {
        $data = null;

        $this->form_validation->set_rules('leave_reson', 'leave reson ', 'required');
        $this->form_validation->set_rules('leave_date_from', 'Leave Time From', 'required');
        $this->form_validation->set_rules('leave_date_to', 'Leave Date To', 'required');

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {

            // end code for get category list 
            $this->global['title'] = "Add Leave Form";
            $this->loadEmployeeViews("employee/leavemanagement/add", $this->global, $data , NULL,'employee');

        } else {
            //  code for insert data 

            $insertData = array();
            $insertData['emp_id'] = $_SESSION['employeeId'];
            $insertData['department'] = $_SESSION['department'];
            $insertData['leave_reson'] = $_POST['leave_reson'];
            $insertData['leave_date_from'] = $_POST['leave_date_from'];
            $insertData['leave_date_to'] = $_POST['leave_date_to'];
            $insertData['nature_of_leave'] = $_POST['nature_of_leave'];
            $insertData['status'] = 0;
            $insertData['created_at'] = date("Y-m-d H:i:s");

            $result = $this->leavemanagement->save($insertData);

            $heading = "This mail is for your Leave request!";

            $content = "
             <div style='margin-top:1px;'>
                 <tr>
                    <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Employee Name : </td>
                    <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $_SESSION['name'] . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                <tr>
                    <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Employee Code : </td>
                    <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $_SESSION['emp_code'] . "</span></td>
                </tr>
            </div>
            <div style='margin-top:1px;'>
                <tr>
                    <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Employee Mobile : </td>
                    <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $_SESSION['phone'] . "</span></td>
                </tr>
            </div>
            <div style='margin-top:1px;'>
                <tr>
                    <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Employee Email : </td>
                    <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $_SESSION['email'] . "</span></td>
                </tr>
            </div>
            <div style='margin-top:1px;'>
            <tr>
                <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Nature Of Leave : </td>
                <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" .$this->config->item('leave_type')[$_POST['nature_of_leave']] . "</span></td>
            </tr>
        </div>
             <div style='margin-top:1px;'>
                 <tr>
                    <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Leave From : </td>
                    <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $insertData['leave_date_from'] . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                    <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Leave To : </td>
                    <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $insertData['leave_date_to'] . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                    <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Reason : </td>
                    <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $insertData['leave_reson']. "</span></td>
                 </tr>
             </div>
          
           ";

            $message = get_email_temp($heading, $content);


            $subject = "Leave Application";
            $email = $_SESSION['email'].$this->config->item('comonEmail');
            $this->send_email($email, $subject, $message);
          
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Leave form submited Successfully!');
            } else {
                $this->session->set_flashdata('failed', 'Failed To Submite Leave Form !');
            }
            redirect('employee/leavemanagement');
        }
    }


    //  code for ajax list 

    public function ajax_list()
    {
        $list = $this->leavemanagement->get_datatables();

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

            if ($currentObj->status == 1) {

                $status = '<img src="' . base_url() . 'assets/images/verify.png" alt="" style="width: 17px;">';

            } else {
                $status = '<img src="' . base_url() . 'assets/images/unverify.png" alt="" style="width: 17px;">';

            }

            $no++;
            $row = [];
            $row[] = $currentObj->emp_code;
            $row[] = $currentObj->fname . ' ' . $currentObj->lname;
            $row[] = $currentObj->phone;
            $row[] = $this->config->item('department')[$currentObj->department];
            $row[] = $currentObj->leave_date_from;
            $row[] = $currentObj->leave_date_to;
            $row[] = $this->config->item('leave_type')[$currentObj->nature_of_leave] ;
            $row[] = $status;
            $row[] = $date_at;
       
            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->leavemanagement->count_all(),
            "recordsFiltered" => $this->leavemanagement->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }

    //  code for ajax list 

    public function mobile_ajax_list()
    {
        $list = $this->leavemanagement->get_datatables();

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

            if ($currentObj->status == 1) {

                $status = '<img src="' . base_url() . 'assets/images/verify.png" alt="" style="width: 17px;">';

            } else {
                $status = '<img src="' . base_url() . 'assets/images/unverify.png" alt="" style="width: 17px;">';

            }

            $no++;
            $row = [];
            $row[] = $currentObj->leave_date_from;
            $row[] = $this->config->item('leave_type')[$currentObj->nature_of_leave] ;
            $row[] = $status;
       
            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->leavemanagement->count_all(),
            "recordsFiltered" => $this->leavemanagement->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
}