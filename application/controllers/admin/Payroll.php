<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';
require 'vendor/autoload.php';

class Payroll extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/payroll_model', 'payroll');
        $this->load->model('admin/salary_model', 'salary');
        $this->load->model('admin/employee_model', 'employee');
        $this->load->model('admin/category_model', 'category');
        $this->load->model('admin/attendance_model', 'attendance');


        $this->isLoggedIn();
    }


    public function salary()
    {

        $currentDate = date("Y-m-d");
        $lastMonth = date("F", strtotime($currentDate . ' -1 month'));
        $year = date("Y");

        // get total salary
        $query = "";
        $this->db->from('salary');
        $this->db->select('id');
        $query = $this->db->get();
        $totalSalary = $query->result();
        $data['totalSalary'] = count($totalSalary);

        // get this month salary
        $query = "";
        $this->db->from('salary');
        $this->db->select('id');
        $this->db->where('month', date("F"));
        $this->db->where('year ', $year);
        $query = $this->db->get();
        $thisMonthSalary = $query->result();
        $data['thisMonthSalary'] = count($thisMonthSalary);
     
        // get last month salary
        $this->db->from('salary');
        $this->db->select('id');
        $this->db->where('month', $lastMonth);
        $this->db->where('year ', $year);
        $query = $this->db->get();
        $lastMonthSalary = $query->result();
      
        $data['lastMonthSalary'] = count($lastMonthSalary);

        // get last 12 month salary
        $this->db->from('salary');
        $this->db->select('id');
        $this->db->where('month >=', date("F", strtotime($currentDate . ' -11 month')));
        $this->db->where('month <=', date("F"));
        $query = $this->db->get();
        $last12MonthSalary = $query->result();
        $data['last12MonthSalary'] = count($last12MonthSalary);

        // pre($last12MonthSalary);
        // exit;
        $w = array();
        $w['status'] = 1;
        $w['field'] = "id,fname,lname,email,phone,profile_image,department,role";
        $data['employee'] = $this->employee->findDynamic($w);
        
        $data['title'] = "salary";
        $this->load->view('admin/payroll/allsarary', $data);
    }


    //  code for add salary start
    public function addsalary()
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $insertData['id'] = $_POST['id'];
        }

        if(isset($_POST['employee_id']) && !empty($_POST['employee_id'])){
            $w = array();
            $w['id'] = $_POST['employee_id'];
            $w['field'] = "id,department";
            $empData = $this->employee->findDynamic($w);
            $empData = $empData[0];
            $department = $empData->department;
        }

        $insertData['emp_id'] = $_POST['employee_id'];
        $insertData['department'] = $department;
        $insertData['year'] = $_POST['year'];
        $insertData['month'] = $_POST['month'];
        $insertData['days_in_month'] = $_POST['days_in_month'];
        $insertData['attendance_in_days'] = $_POST['attendance_in_days'];
        $insertData['late_mark'] = $_POST['late_mark'];
        $insertData['casual_leave'] = $_POST['casual_leave'];
        $insertData['paid_leave'] = $_POST['paid_leave'];
        $insertData['basic'] = $_POST['basic'];
        $insertData['hra'] = $_POST['hra'];
        $insertData['conveyance_allowance'] = $_POST['conveyance_allowance'];
        $insertData['special_allowance'] = $_POST['special_allowance'];
        $insertData['compensation'] = $_POST['compensation'];
        $insertData['incentive'] = $_POST['incentive'];
        $insertData['tds'] = $_POST['tds'];
        $insertData['pf_amount'] = $_POST['pf_amount'];
        $insertData['esi'] = $_POST['esi'];
        $insertData['salary_advance'] = $_POST['salary_advance'];
        $insertData['late_mark_amount'] = $_POST['late_mark_amount'];
        $insertData['casual_leave_amount'] = $_POST['casual_leave_amount'];
        $insertData['total_earning'] = $_POST['total_earning'];
        $insertData['total_deduction'] = $_POST['total_deduction'];
        $insertData['net_salary'] = $_POST['net_salary'];
        $insertData['status'] = 1;
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $insertData['updated_at'] = date("Y-m-d H:i:s");
        } else {
            $insertData['created_at'] = date("Y-m-d H:i:s");
        }
        $result = $this->salary->save($insertData);
        redirect('admin/payroll/salary');
    }
    //  code for add salary end


    // editsarary
    function editsarary($id)
    {
        if (isset($id) and !empty($id)) {
            $this->load->model('admin/employee_model', 'employee');
            $this->load->model('admin/salary_model', 'salary');

            $editData = $this->salary->find($id);
            $data['edit_data'] = $editData;

            $w = array();
            $w['field'] = "id,fname,lname,email,phone,profile_image,department,role";
            $data['employee'] = $this->employee->findDynamic($w);

            $data['title'] = "edit_payroll";
            $this->load->view('admin/payroll/editsarary', $data);

        } else {
            redirect('admin/payroll/salary');
        }
    }

    function updatesarary()
    {
        //code for insert data 
        if(isset($_POST['employee_id']) && !empty($_POST['employee_id'])){
            $w = array();
            $w['id'] = $_POST['employee_id'];
            $w['field'] = "id,department";
            $empData = $this->employee->findDynamic($w);
            $empData = $empData[0];
            $department = $empData->department;
        }
        $updateData['id'] = $_POST['id'];
        $updateData['emp_id'] = $_POST['employee_id'];
        $updateData['department'] = $department;
        $updateData['year'] = $_POST['year'];
        $updateData['month'] = $_POST['month'];
        $updateData['days_in_month'] = $_POST['days_in_month'];
        $updateData['attendance_in_days'] = $_POST['attendance_in_days'];
        $updateData['late_mark'] = $_POST['late_mark'];
        $updateData['casual_leave'] = $_POST['casual_leave'];
        $updateData['paid_leave'] = $_POST['paid_leave'];
        $updateData['basic'] = $_POST['basic'];
        $updateData['hra'] = $_POST['hra'];
        $updateData['conveyance_allowance'] = $_POST['conveyance_allowance'];
        $updateData['special_allowance'] = $_POST['special_allowance'];
        $updateData['compensation'] = $_POST['compensation'];
        $updateData['incentive'] = $_POST['incentive'];
        $updateData['tds'] = $_POST['tds'];
        $updateData['pf_amount'] = $_POST['pf_amount'];
        $updateData['esi'] = $_POST['esi'];
        $updateData['salary_advance'] = $_POST['salary_advance'];
        $updateData['late_mark_amount'] = $_POST['late_mark_amount'];
        $updateData['casual_leave_amount'] = $_POST['casual_leave_amount'];
        $updateData['total_earning'] = $_POST['total_earning'];
        $updateData['total_deduction'] = $_POST['total_deduction'];
        $updateData['net_salary'] = $_POST['net_salary'];
        $updateData['status'] = 1;
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $updateData['updated_at'] = date("Y-m-d H:i:s");
        } else {
            $updateData['created_at'] = date("Y-m-d H:i:s");
        }
        $result = $this->salary->save($updateData);
        redirect('admin/payroll/salary');
    }



    //  code for all salary list
    public function all_salary_list()
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

            // if ($currentObj->status == 1) {

            //     $status = '<span class=" badge p-2" style="background-color:#cff7cf;color:white;">Active</span>
            //     <p>
            //         <a style="margin-top:10px;" class=" badge " href="' . base_url() . 'admin/payroll/Unpublished/' . $currentObj->id . '">Click  InActive</a>
            //     </p>';

            // } else {
            //     $status = '<span class="p-2 badge">InActive</span>
            //        <p>
            //         <a style="margin-top:10px;" class=" badge " href="' . base_url() . 'admin/payroll/published/' . $currentObj->id . '">Click  Active</a>
            //     </p>
            //        ';
            // }

            if ($currentObj->status == 1) {

                $status = '<a href="' . base_url() . 'admin/employee/Unpublished/' . $currentObj->id . '" title="Click to Unverify"><img src="' . base_url() . 'assets/images/verify.png" alt="" style="width: 17px;"></a>';

            } else {
                $status = '<a href="' . base_url() . 'admin/employee/published/' . $currentObj->id . '" title="Click to Verify"><img src="' . base_url() . 'assets/images/unverify.png" alt="" style="width: 17px;"></a>';

            }

            $profile_image = '<img src="' . base_url() . $currentObj->profile_image . '" style="width:30px;height:30px;border-radius:50%;"> ';

            $deteteBtn = (isset($_SESSION['role_type']) && $_SESSION['role_type'] == 1) ? '<a  title="Delete" class="deletebtn btn p-1" href="javascript:void(0)" data_id="' . $currentObj->id . '" ><i class="bi bi-trash"></i></button></a>' : '';

            $action = '<div class="d-flex flex-row bd-highlight mb-3"> 
            <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/payroll/editsarary/' . $currentObj->id . '" title="Edit Employee" ><i class="bi bi-pencil-square"></i></i></a></button>  
        &nbsp;' . $deteteBtn . '
       </div>';

            $no++;
            $row = [];
            $row[] = (isset($currentObj->fname) && !empty($currentObj->fname)) ? $profile_image . $currentObj->fname : '<span class="badge bg-inverse-danger">N/A</span>';
            $row[] = $currentObj->month;
            $row[] = '₹' . $currentObj->total_earning;
            $row[] = '₹' . $currentObj->total_deduction;
            $row[] = '₹' . $currentObj->net_salary;
            $row[] = $status;
            $row[] = $date_at;
            $row[] = '<button type="button" class="btn btn-outline-primary downloadSlip" data_id="' . $currentObj->id . '"><i class="bi bi-cloud-arrow-down"></i></button>';

            $row[] = $action;

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

    // end code for emp_attendance list
    function deleteSalary()
    {
        $id = "";

        if (isset($_POST)) {
            $id = $_POST["id"];
        }

        if (isset($id) and !empty($id)) {

            $count = $this->salary->getCount('salary', 'salary.id', $id);

            if (isset($count) and !empty($count)) {

                $this->salary->delete('salary', 'id', $id);

                $this->session->set_flashdata('message', ' Salary Deleted Successfully !');

                echo "success";

                exit();

            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }


    public function allattendance()
    {

        $data['payroll'] = $this->payroll->getList('leave_management');

        $currentDate = date("Y-m-d");
        $lastMonth = date("M-Y", strtotime($currentDate . ' -1 month'));

        // get this month attendence
        $query = "";
        $this->db->from('emp_attandance');
        $this->db->select('id');
        $this->db->where('salary_month', date("M-Y"));
        $query = $this->db->get();
        $thisMonthAttendance = $query->result();
        $data['thisMonthAttendance'] = count($thisMonthAttendance);
        
        // get last month attendence
        $query = "";
        $this->db->from('emp_attandance');
        $this->db->select('id');
        $this->db->where('salary_month', $lastMonth);
        $query = $this->db->get();
        $lastMonthAttendance = $query->result();
        $data['lastMonthAttendance'] = count($lastMonthAttendance);

        // get total attendence
        $query = "";
        $this->db->from('emp_attandance');
        $this->db->select('id');
        $query = $this->db->get();
        $totalAttendance = $query->result();
        $data['totalAttendance'] = count($totalAttendance);

        $w = array();
        $w['field'] = "id,fname,lname,email,phone,profile_image,department,role";
        $data['employee'] = $this->employee->findDynamic($w);
        $data['title'] = "allattendance";
        $this->load->view('admin/payroll/allattendance', $data);
    }

    public function attendance_view($id)
    {


        $attendance = $this->attendance->find($id);
        $data['attendance'] = $attendance;

        if (isset($attendance) && !empty($attendance)) {
            $w = array();
            $w['id'] = $attendance->employeeId;
            $w['field'] = "id,fname,lname,email,phone,profile_image,department,role";
            $employee = $this->employee->findDynamic($w);
            if (!empty($employee)) {
                $data['employee'] = $employee[0];
            }
        }

        $data['title'] = "payroll";
        $this->load->view('admin/payroll/attendance_view', $data);
    }


    public function addattendance()
    {
        $id = (isset($_GET['emp_id']))?$_GET['emp_id']:'';
        if (isset($id) && !empty($id)) {

            $data = null;

            $this->form_validation->set_rules('employeeId', 'employeeId ', 'required');
            // $this->form_validation->set_rules('attendance_date', 'attendance_date ', 'required');

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {
                $w = array();
                $w['field'] = "id,fname,lname,email,phone,profile_image,department,role";
                $w['id'] = $id;
                $employeeData = $this->employee->findDynamic($w);
                $data['employeeData'] = $employeeData[0];

                $data['payroll'] = $this->payroll->getList('leave_management');
                $data['title'] = "addattendance";
                $this->load->view('admin/payroll/addattendance', $data);
            } else {
                $array = array();
                $attendance_date = array();
                $new_attendance_date = array();
                $attendance = array();
                $new_attendance = array();
                $countAttendance = 0;

                for ($i = 0; $i < count($_POST['attendance_date']); $i++) {
                    $array[] = explode("_", $_POST['attendance_date'][$i]);
                }

                if (count($array) > 0) {
                    foreach ($array as $k => $v) {
                        $attendance_date[] = $v[0];
                    }
                }
                // pre($_POST['attendance_date']);
                // exit;

                if (count($array) > 0) {
                    foreach ($array as $k => $v) {
                        $attendance[] = $v[1];
                        $countAttendance = $countAttendance + $v[1];
                    }
                }

                $Date = date("Y-m-00");
                $a = count($_POST['attendance_note']);
                for ($i = 1; $i <= $a; $i++) {
                    $presentDate[] = date("Y-m-d", strtotime($Date . ' + ' . $i . ' days'));
                }


                foreach ($presentDate as $date) {
                    if (in_array($date, $attendance_date)) {
                        $new_attendance_date[] = $date;
                    } else {
                        $new_attendance_date[] = "";
                    }
                }


                $a = -1;
                foreach ($new_attendance_date as $d) {
                    if ($d != "") {
                        $a++;
                        $new_attendance[] = $attendance[$a];
                    } else {
                        $new_attendance[] = "";
                    }
                }


                //    pre($new_attendance_date);
                //    pre($new_attendance);
                //    pre($_POST);
                //    exit();

                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $insertData['id'] = $_POST['id'];
                }

                $insertData['employeeId'] = $_POST['employeeId'];
                $insertData['year'] = date("Y");
                $insertData['month'] = $_POST['month'];
                $insertData['countAttendance'] = $countAttendance / 2;
                $insertData['attendance_date'] = json_encode($new_attendance_date);
                $insertData['attendance'] = json_encode($new_attendance);
                $insertData['attendance_note'] = json_encode($_POST['attendance_note']);
                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $insertData['updated_at'] = date("Y-m-d H:i:s");
                } else {
                    $insertData['created_at'] = date("Y-m-d H:i:s");
                }

                
                $re =$this->attendance->save($insertData);
                // pre($re);
                // exit;
                redirect('admin/payroll/allattendance');

            }
        } else {
            echo "Something Missing";
            exit;
        }
    }

    // end code for get list // like country , state , city 

    //  code for publish user 
    public function published($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 1;
        $result = $this->payroll->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'payroll  Published  Sucessfully');
            redirect('admin/payroll/');
        } else {
            $this->session->set_flashdata('error', ' payroll Published  Failed');
            redirect('admin/payroll/');
        }
    }
    //  end code for publish user
    //  code for Unpublish user 
    public function Unpublished($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 0;
        $result = $this->payroll->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'payroll UnPublished  Sucessfully');
            redirect('admin/payroll/');
        } else {
            $this->session->set_flashdata('error', 'payroll UnPublished   Failed');
            redirect('admin/payroll/');
        }
    }

    //  end code for publish user


    // Add 
    public function add()
    {
        $data = null;

        $this->form_validation->set_rules('name', 'Name ', 'required');

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {

            // end code for get category list 
            $data['title'] = "add_payroll";
            $this->load->view('admin/payroll/add', $data);
        } else {
            //  code for insert data 




            $insertData = array();
            $insertData['name'] = $_POST['name'];
            $insertData['email'] = $_POST['email'];
            $insertData['phone'] = $_POST['phone'];
            $insertData['password'] = md5($_POST['password']);
            $insertData['role'] = $_POST['role'];
            $insertData['status'] = 1;
            $insertData['created_at'] = date("Y-m-d H:i:s");

            $result = $this->payroll->save($insertData);



            $heading = "This mail is for your Inquery panel login crediantional";

            $content = "
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Client Name : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $insertData['name'] . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>E-mail : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $insertData['email'] . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Mobile : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $insertData['phone'] . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Password : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $this->input->post('password') . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Role : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>" . $this->config->item('subAdmin')[$insertData['role']] . "</span></td>
                 </tr>
             </div>
          
           ";

            $message = get_email_temp($heading, $content);


            $subject = "Inquiry User Registration";
            $this->send_email($insertData['email'], $subject, $message);
            // pre($r);
            // exit;
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Sub Admin  Added Successfully!');
            } else {
                $this->session->set_flashdata('failed', 'Failed to  Add Sub Admin !');
            }
            redirect('admin/payroll');
        }
    }

    // Add 
    public function payroll_profile()
    {
        $data['title'] = "Payroll Profile";
        $this->load->view('admin/payroll/payroll_profile', $data);
    }


    // Edit
    function edit($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('name', 'Name ', 'required');
            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $this->load->model('admin/category_model', 'category');
                $this->load->model('admin/payroll_model', 'payroll');

                $editData = $this->payroll->find($id);
                $data['edit_data'] = $editData;


                $data['title'] = "edit_payroll";
                $this->load->view('admin/payroll/edit', $data);

            } else {
                //  code for insert data 

                $id = $_POST['id'];

                $updateData = array();
                $updateData['id'] = $id;
                $updateData['name'] = $_POST['name'];
                $updateData['email'] = $_POST['email'];
                $updateData['phone'] = $_POST['phone'];
                $updateData['password'] = (isset($_POST['password']) && !empty($_POST['password']) && strlen($_POST['password']) > 5) ? md5($_POST['password']) : $_POST['old_password'];
                $updateData['role'] = $_POST['role'];
                $updateData['updated_at'] = date("Y-m-d H:i:s");
                // pre($_POST);
                // pre($updateData);
                // exit;
                $result = $this->payroll->save($updateData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Contact Us  Updated Successfully!');
                    redirect('admin/payroll');

                } else {
                    $this->session->set_flashdata('failed', ' Invalid Id !');
                    redirect('admin/payroll/edit/' . $id);
                }
            }
        }

    }

    //  code for ajax list 
    public function ajax_list()
    {
        $list = $this->payroll->get_datatables();

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

                $status = '<span class="btn-success badge">Active</span>
                <p>
                    <a style="margin-top:10px;" class=" btn-danger badge" href="' . base_url() . 'admin/payroll/Unpublished/' . $currentObj->id . '">Click  InActive</a>
                </p>';

            } else {
                $status = '<span class="btn-danger badge">InActive</span>
                   <p>
                    <a style="margin-top:10px;" class=" btn-success badge" href="' . base_url() . 'admin/payroll/published/' . $currentObj->id . '">Click  Active</a>
                </p>
                   ';

            }

            if ($currentObj->role == 1) {

                $role = '<span class="btn-success badge">' . $this->config->item('subAdmin')[$currentObj->role] . '</span>';
            } else if ($currentObj->role == 2) {
                $role = '<span class="btn-info badge">' . $this->config->item('subAdmin')[$currentObj->role] . '</span>';
            } else {
                $role = "Other";
            }


            $currentDate = date("y-m-d H:i:s");
            $sevenMinutLost = strtotime("-7 minutes", strtotime($currentDate));
            $last_activity = $currentObj->last_activity;
            if ($sevenMinutLost < strtotime($last_activity)) {
                $online = '<span class="circle pulse green"></span>';
            } else {
                $online = '<span class="circle pulse red"></span>';
            }


            $no++;
            $row = [];
            $row[] = $no;
            $row[] = (isset($currentObj->name) && !empty($currentObj->name)) ? $online . $currentObj->name : '<span class="badge bg-inverse-danger">N/A</span>';
            $row[] = $currentObj->system_ip;
            $row[] = $currentObj->email;
            $row[] = $role;
            $row[] = $status;
            $row[] = $currentObj->last_login;
            $row[] = $date_at;
            // $row[] = $updated_at;
            $row[] =
                '<div class="dropdown">
                <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></div>
                  <div class="dropdown-menu leads showMe" aria-labelledby="dropdownMenuButton">
                    <ul>
                      <li class=""><a class="" href="' . base_url() . 'admin/payroll/edit/' . $currentObj->id . '" title="Edit User" >Edit User</i></a></li>
                      <li class=""><a  title="Delete" class="deletebtn" href="javascript:void(0)" data_id="' . $currentObj->id . '" >Delete</a></li>
                      </ul>
                      </div>
                      </div>
                      </div>';
            //   <li class=""><a class="" href="' .base_url() .'admin/payroll/view_history/' .$currentObj->id .'" title="View History" >View History</i></a></li>

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->payroll->count_all(),
            "recordsFiltered" => $this->payroll->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }

    // end code for emp_attendance_list
    public function emp_attendance_list()
    {

        $list = $this->attendance->get_datatables();

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

                $status = '<span class="btn-success badge">Active</span>
                <p>
                    <a style="margin-top:10px;" class=" btn-danger badge" href="' . base_url() . 'admin/payroll/Unpublished/' . $currentObj->id . '">Click  InActive</a>
                </p>';

            } else {
                $status = '<span class="btn-danger badge">InActive</span>
                   <p>
                    <a style="margin-top:10px;" class=" btn-success badge" href="' . base_url() . 'admin/payroll/published/' . $currentObj->id . '">Click  Active</a>
                </p>
                   ';

            }

            if ($currentObj->role == 1) {

                $role = '<span class="btn-success badge">' . $this->config->item('subAdmin')[$currentObj->role] . '</span>';
            } else if ($currentObj->role == 2) {
                $role = '<span class="btn-info badge">' . $this->config->item('subAdmin')[$currentObj->role] . '</span>';
            } else {
                $role = "Other";
            }


            $profile_image = '<img src="' . base_url() . $currentObj->profile_image . '" style="width:30px;height:30px;border-radius:50%;"> ';
            $name = (isset($currentObj->fname) && !empty($currentObj->fname)) ? $profile_image . $currentObj->fname : '<span class="badge bg-inverse-danger">N/A</span>';
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = '<a href="' . base_url() . 'admin/payroll/attendance_view/' . $currentObj->id . '">' . $name . '</a>';
            $row[] = $currentObj->phone;
            $row[] = $currentObj->email;
            $row[] = $currentObj->department;
            $row[] = $role;
            $row[] = $currentObj->status;
            $row[] = $currentObj->year . '-' . $currentObj->month;
            $row[] = $date_at;
            // $row[] = $updated_at;
            $row[] =
                '<div class="dropdown">
                <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></div>
                  <div class="dropdown-menu leads showMe" aria-labelledby="dropdownMenuButton">
                    <ul>
                      <li class=""><a class="" href="' . base_url() . 'admin/payroll/attendance_view/' . $currentObj->id . '" title="Edit User" >Update Sheet</i></a></li>
                      <li class=""><a  title="Delete" class="deletebtn" href="javascript:void(0)" data_id="' . $currentObj->id . '" >Delete</a></li>
                      </ul>
                      </div>
                      </div>
                      </div>';
            //   <li class=""><a class="" href="' .base_url() .'admin/payroll/view_history/' .$currentObj->id .'" title="View History" >View History</i></a></li>

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
    // end code for emp_attendance_list


    // end code for emp_attendance_list


    public function all_attendance_list()
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

            $profile_image = '<img src="' . base_url() . $currentObj->profile_image . '" class="profile_image"> ';
            $name = (isset($currentObj->fname) && !empty($currentObj->fname)) ? $profile_image . $currentObj->fname : '<span class="badge bg-inverse-danger">N/A</span>';
           
            $editBtn = (isset($_SESSION['role_type']) && $_SESSION['role_type'] == 1) ? '<a href="' . base_url() . 'admin/payroll/attendance_edit/' . $currentObj->id . '" title="Edit Attendance" ><i class="bi bi-pencil-square mr-2"></i></a>' : '';
            $editBtn = "";
            $deteteBtn = (isset($_SESSION['role_type']) && $_SESSION['role_type'] == 1) ? '<a href="javascript:void(0)" class="deleteAttendanceBtn" data_id="' . $currentObj->id . '" ><i class="bi bi-trash"></i></a>' : '';
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
                <a class="text-light" href="' . base_url() . 'admin/payroll/attendance_view/' . $currentObj->id . '" title="View Attendance" ><i class="bi bi bi-eye-fill mr-2"></i></i></a>' . $deteteBtn . '
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
    // end code for emp_attendance_list


    function view($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('name', 'Name Name', 'required');
            $this->form_validation->set_rules('status', 'Status Name', 'trim|xss_clean');
            $this->form_validation->set_rules('created_at', 'Created_at Name', 'trim');
            $this->form_validation->set_rules('update_at', 'Update_at Name', 'trim');

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $this->load->view('admin/payroll/view', $data);
            } else {
                redirect('admin/payroll/view');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/payroll/view');
        }
    }


    // end code for ajax list 

    function view_history($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->load->model('admin/category_model', 'category');
            $this->load->model('admin/payroll_model', 'payroll');

            $editData = $this->payroll->getRow('payroll', $id);

            $w = array();
            $w['table'] = 'user_history';
            $w['orderby'] = '-id';
            $w['owner_id'] = $id;
            $data['user_history'] = $this->payroll->findDynamic($w);
            // pre($data['user_history']);
// exit;
            // end code for get state list 


            $data['edit_data'] = $editData;

            $this->load->view('admin/payroll/user_history', $data);

        }
    }


    // delete
    function delete()
    {
        $id = "";


        if (isset($_POST)) {
            $id = $_POST["id"];
        }

        if (isset($id) and !empty($id)) {
            $count = $this->payroll->getCount('payroll', 'payroll.id', $id);

            if (isset($count) and !empty($count)) {
                $this->payroll->delete('payroll', 'id', $id);

                $this->session->set_flashdata('message', ' payroll Deleted Successfully !');

                echo "success";

                exit();
            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }


    // deleteAttendance
    function deleteAttendance()
    {
        $id = "";


        if (isset($_POST)) {
            $id = $_POST["id"];
        }

        if (isset($id) and !empty($id)) {
            $count = $this->attendance->getCount('attendance', 'attendance.id', $id);

            if (isset($count) and !empty($count)) {
                $this->attendance->delete('attendance', 'id', $id);

                $this->session->set_flashdata('message', ' attendance Deleted Successfully !');

                echo "success";

                exit();
            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }

    function deleteAll($id = '')
    {


        $all_ids = $_POST["allIds"];

        if (isset($all_ids) and !empty($all_ids)) {
            //$count=$this->category->getCount('category','category.id',$id);

            for ($a = 0; $a < count($all_ids); $a++) {
                if ($all_ids[$a] != "") {
                    $this->payroll->delete('payroll', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' payroll(s) Deleted Successfully !');
                }
            }

            echo "success";

            exit();
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }



    function status($field, $id)
    {
        if (in_array($field, ['status'])) {
            if (isset($id) && !empty($id)) {
                if (!is_null($payroll = $this->payroll->getRow('payroll', $id))) {
                    $status = $payroll->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->payroll->updateData('payroll', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
                        redirect($_GET['redirect']);
                    } else {
                        redirect('admin/payroll');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/payroll');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/payroll');
            }
        }
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
            redirect('admin/payroll/salary');
        }
    }


//    code for upload Attandance Sheet 
    public function uploadAttandance(){
              
            $insertData = array();
            $attendance_date = array();
            $in_time = array();
            $out_time = array();
            $shift = array();
            $total_duration = array();
            $attandace_status = array();
            $late_mark = array();
            $salary_calculation = array();
            $salary_conclusion = array();

        // if(isset($_POST['type']) && $_POST['type'] == 1){
            if(isset($_FILES['attendance_sheet']) && !empty($_FILES['attendance_sheet']['name'])){
            
              $fileName = $_FILES['attendance_sheet']['name'];
            }
            $DIRECTORY_PATH = 'uploads/attendance_sheets/';
			 $upload_status =  $this->uploadDoc($DIRECTORY_PATH);
            
			if($upload_status!=false)
			{
				$inputFileName = $DIRECTORY_PATH.$upload_status;
				$inputTileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
				$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputTileType);
				$spreadsheet = $reader->load($inputFileName);
				$sheet = $spreadsheet->getSheet(0);

                $dateTime = date("Y-m-d H:i:s");
				foreach($sheet->getRowIterator() as $row)
				{
                 
                   $attendance_date[] = $spreadsheet->getActiveSheet()->getCell('A' . $row->getRowIndex())->getValue();
                   $in_time[] = $spreadsheet->getActiveSheet()->getCell('B' . $row->getRowIndex())->getValue();
                   $out_time[] = $spreadsheet->getActiveSheet()->getCell('C' . $row->getRowIndex())->getValue();
                   $shift[] = $spreadsheet->getActiveSheet()->getCell('D' . $row->getRowIndex())->getValue();
                   $total_duration[] = $spreadsheet->getActiveSheet()->getCell('E' . $row->getRowIndex())->getValue();
                   $attandace_status[] = $spreadsheet->getActiveSheet()->getCell('F' . $row->getRowIndex())->getValue();
                   $late_mark[] = $spreadsheet->getActiveSheet()->getCell('G' . $row->getRowIndex())->getValue();
                   $salary_calculation[] = $spreadsheet->getActiveSheet()->getCell('H' . $row->getRowIndex())->getValue();
                   $salary_conclusion[] = $spreadsheet->getActiveSheet()->getCell('I' . $row->getRowIndex())->getValue();
                }

                $insertData['employeeId'] = $_POST['employee_id'];
                $insertData['salary_month'] = (isset($attendance_date[1]))?date("M-Y",strtotime($attendance_date[1])):'';
                $insertData['attendance_date'] = json_encode($attendance_date);
                $insertData['in_time']         = json_encode($in_time);
                $insertData['out_time']         = json_encode($out_time);
                $insertData['shift']           = json_encode($shift);
                $insertData['total_duration']           = json_encode($total_duration);
                $insertData['attandace_status']           = json_encode($attandace_status);
                $insertData['late_mark']            = json_encode($late_mark);
                $insertData['salary_calculation']            = json_encode($salary_calculation);
                $insertData['salary_conclusion']            = json_encode($salary_conclusion);
                $insertData['status'] = 1; 
                $insertData['created_at'] = date('Y-m-d H:i:s');

                 // Check if the file exists before attempting to delete it
                 if (file_exists($inputFileName)) {
                    // Attempt to delete the file
                    if (unlink($inputFileName)) {
                        // echo 'File deleted successfully.';
                    }
                }

                // save data 
                $this->attendance->save($insertData);
        
               
          
				$this->session->set_flashdata('success','Successfulyy Data Imported');
				redirect(base_url('admin/payroll/allattendance'));
			}
			else
			{
				$this->session->set_flashdata('error','File is not uploaded');
				redirect(base_url('admin/payroll/allattendance'));
			}
		

        // }
    }

    function uploadDoc($DIRECTORY_PATH)
	{
		if(!is_dir($DIRECTORY_PATH))
		{
			mkdir($DIRECTORY_PATH,0777,TRUE); // FOR CREATING DIRECTORY IF ITS NOT EXIST
		}

		$config['upload_path']=$DIRECTORY_PATH;
		$config['allowed_types'] = 'csv|xlsx|xls';
		$config['max_size'] = 1000000;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('attendance_sheet'))
		{
			$fileData = $this->upload->data();
			return $fileData['file_name'];
		}
		else
		{
			return false;
		}
	}

}