<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Employee extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/employee_model', 'employee');
        $this->load->model('admin/category_model', 'category');
        // $this->load->model('admin/banner_model');

        $this->isLoggedIn();
    }

    function index()
    {


        $data['totalEmployee'] = $this->employee->countRow();

        //New Employee
        $curentDate = new DateTime(); // Get the current date and time
        $curentDate->sub(new DateInterval('P3M')); // Subtract 3 months
        $lastData = $curentDate->format('Y-m-d');

        $this->db->from('employee');
        $this->db->select('*');
        $this->db->where('employee.joining_date >', $lastData);
        $query = $this->db->get();
        $totalNewEmployee = $query->result();
        $data['totalNewEmployee'] = count($totalNewEmployee);

        $w = array();
        $w['status'] = 0;
        $totalUnVerify = $this->employee->findDynamic($w);
        $data['totalUnVerify'] = count($totalUnVerify);

        $w = array();
        $w['status'] = 1;
        $totalVerify = $this->employee->findDynamic($w);
        $data['totalVerify'] = count($totalVerify);

        // pre($data['totalVerify']);
        // exit;

        $data['title'] = "employee";
        $this->load->view('admin/employee/manage', $data);
    }
    function leave()
    {
        $data['employee'] = $this->employee->getList('employee');
        $data['title'] = "employee";
        $this->load->view('admin/employee/leave_request', $data);
    }




    // end code for get list // like country , state , city 

    //  code for publish user 
    public function published($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 1;
        $result = $this->employee->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'employee  Published  Sucessfully');
            redirect('admin/employee/');
        } else {
            $this->session->set_flashdata('error', ' employee Published  Failed');
            redirect('admin/employee/');
        }
    }
    //  end code for publish user
    //  code for Unpublish user 
    public function Unpublished($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 0;
        $result = $this->employee->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'employee UnPublished  Sucessfully');
            redirect('admin/employee/');
        } else {
            $this->session->set_flashdata('error', 'employee UnPublished   Failed');
            redirect('admin/employee/');
        }
    }

    //  end code for publish user


    // code for Add start
    public function add()
    {

        $data = null;

        $this->form_validation->set_rules('firstName', 'First Name ', 'required');
        $this->form_validation->set_rules('pemail', 'Email ', 'required');
        $this->form_validation->set_rules('personal_mobile', 'Mobile ', 'required');
        $this->form_validation->set_rules('password', 'Password ', 'required');

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {

            // end code for get category list 
            $data['title'] = "add_employee";
            $this->load->view('admin/employee/add', $data);
        } else {
            //  code for insert data 
            $profile_image = "";
            $ten_marksheet = "";
            $twelth_marksheet = "";
            $diploma = "";
            $degree = "";
            $aadhar = "";
            $pan = "";
            $relieving_letter = "";
            $experience_latter = "";
            $sarary_slip = "";
            $bank_attachment = "";


            // pre($_FILES);
            // exit;
            // pre($sarary_slip);
            // exit;

            // upload profile image start
            if (isset($_FILES['profile_image']['name']) && $_FILES['profile_image']['name'] != "") {
                $profile_image = $this->uploadSingleImg($_FILES['profile_image'], 'profile', NULL);
            }

            // upload 10_marksheet start
            if (isset($_FILES['10_marksheet']['name']) && $_FILES['10_marksheet']['name'] != "") {
                $ten_marksheet = $this->uploadSingleImg($_FILES['10_marksheet'], 'marksheet', NULL);
            }

            // upload 12_marksheet start
            if (isset($_FILES['12_marksheet']['name']) && $_FILES['12_marksheet']['name'] != "") {
                $twelth_marksheet = $this->uploadSingleImg($_FILES['12_marksheet'], 'marksheet', NULL);
            }
            // upload diploma start
            if (isset($_FILES['diploma']['name']) && $_FILES['diploma']['name'] != "") {
                $diploma = $this->uploadSingleImg($_FILES['diploma'], 'marksheet', NULL);
            }

            // upload degree start
            if (isset($_FILES['degree']['name']) && $_FILES['degree']['name'] != "") {
                $degree = $this->uploadSingleImg($_FILES['degree'], 'marksheet', NULL);
            }

            // upload aadhar start
            if (isset($_FILES['aadhar']['name']) && $_FILES['aadhar']['name'] != "") {
                $aadhar = $this->uploadSingleImg($_FILES['aadhar'], 'marksheet', NULL);
            }

            // upload pan start
            if (isset($_FILES['pan']['name']) && $_FILES['pan']['name'] != "") {
                $pan = $this->uploadSingleImg($_FILES['pan'], 'marksheet', NULL);
            }

            // upload bank_attachment start
            if (isset($_FILES['bank_attachment']['name']) && $_FILES['bank_attachment']['name'] != "") {
                $bank_attachment = $this->uploadSingleImg($_FILES['bank_attachment'], 'experiencedocx', NULL);
            }

             // upload relieving_letter start
            if (isset($_FILES['relieving_letter']['name'])) {
                $relieving_letter = $this->uploadMOfMImg($_FILES['relieving_letter'], 'experiencedocx', NULL);
            }

            // upload experience_latter start
            if (isset($_FILES['experience_latter']['name'])) {
                $experience_latter = $this->uploadMOfMImg($_FILES['experience_latter'], 'experiencedocx', NULL);
            }
            
            // upload sarary_slip start
            if (isset($_FILES['sarary_slip']['name'])) {
                $sarary_slip = $this->uploadMOfMMImg($_FILES['sarary_slip'], 'experiencedocx', NULL);
            }

            $insertData = array();
            $insertData['fname'] = $_POST['firstName'];
            $insertData['lname'] = $_POST['lastName'];
            $insertData['email'] = $_POST['pemail'];
            $insertData['company_email'] = $_POST['company_email'];
            $insertData['phone'] = $_POST['personal_mobile'];
            $insertData['alt_mobile'] = $_POST['alt_mobile'];
            $insertData['gender'] = $_POST['gender'];
            $insertData['password'] = md5($_POST['password']);
            $insertData['role'] = $_POST['role'];
            $insertData['department'] = $_POST['department'];
            $insertData['dob'] = $_POST['dob'];
            $insertData['permanent_address'] = $_POST['permanent_address'];
            $insertData['current_address'] = $_POST['current_address'];
            $insertData['ctc'] = $_POST['ctc'];
            $insertData['joining_date'] = $_POST['joining_date'];
            $insertData['aadhar_number'] = $_POST['aadhar_number'];
            $insertData['pan_number'] = $_POST['pan_number'];
            $insertData['bank_name'] = $_POST['bank_name'];
            $insertData['ifsc_code'] = $_POST['ifsc_code'];
            $insertData['bank_account_no'] = $_POST['bank_account_no'];
            $insertData['profile_image'] = $profile_image;
            $insertData['ten_marksheet'] = $ten_marksheet;
            $insertData['twelth_marksheet'] = $twelth_marksheet;
            $insertData['relieving_letter'] = $relieving_letter;
            $insertData['experience_latter'] = $experience_latter;
            $insertData['sarary_slip'] = $sarary_slip;
            $insertData['bank_attachment'] = $bank_attachment;
            $insertData['diploma'] = $diploma;
            $insertData['degree'] = $degree;
            $insertData['aadhar'] = $aadhar;
            $insertData['pan'] = $pan;
            $insertData['company_data'] = json_encode($_POST['companyData']);
            $insertData['guardian_contact'] = $_POST['guardian_contact'];
            $insertData['last_comp_hr_contact'] = $_POST['last_comp_hr_contact'];
            $insertData['status'] = 0;
            $insertData['created_at'] = date("Y-m-d H:i:s");

            $result = $this->employee->save($insertData);
          
            $updateData['id'] = $result;
            $updateData['emp_code'] = "HPR-" . $result;
            $result = $this->employee->save($updateData);

            // pre($result);
            // exit;

            if ($result > 0) {
                $this->session->set_flashdata('success', 'Account Created Successfully!');
            } else {
                $this->session->set_flashdata('failed', 'Failed to  Created Account !');
            }
            redirect('admin/employee');
        }
    }
    // code for Add end
    
    public function employee_profile()
    {
        $data['title'] = "Employee Profile";
        $this->load->view('admin/employee/employee_profile', $data);
    }
    // code for Add end


    // Edit
    function edit($id)
    {

        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('firstName', 'First Name ', 'required');
            $this->form_validation->set_rules('pemail', 'Email ', 'required');
            $this->form_validation->set_rules('personal_mobile', 'Mobile ', 'required');
            // $this->form_validation->set_rules('password', 'Password ', 'required');
            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $this->load->model('admin/category_model', 'category');
                $this->load->model('admin/employee_model', 'employee');

                $editData = $this->employee->find($id);
                $data['edit_data'] = $editData;


                $data['title'] = "edit_employee";
                $this->load->view('admin/employee/edit', $data);

            } else {
                //  code for insert data 

                $id = $_POST['id'];

                $profile_image = "";
                $ten_marksheet = "";
                $twelth_marksheet = "";
                $diploma = "";
                $degree = "";
                $aadhar = "";
                $pan = "";
                $relieving_letter = "";
                $experience_latter = "";
                $sarary_slip = "";
                $bank_attachment = "";

               

                // pre($_POST['old_relieving_letter']);    
                // pre($_POST['old_experience_latter']);    
                // pre($_POST);
                // if (isset($_FILES['relieving_letter']['name'])) {
                //     $relieving_letter = $this->uploadMOfMImg($_FILES['relieving_letter'], 'experiencedocx', (isset($_POST['old_relieving_letter']))?$_POST['old_relieving_letter']:NULL);
                // }

                // pre($_FILES['experience_latter']);
                // // pre($relieving_letter);
                // exit;
                
              


                // upload profile image start
                if (isset($_FILES['profile_image']['name']) && $_FILES['profile_image']['name'] != "") {
                    $profile_image = $this->uploadSingleImg($_FILES['profile_image'], 'profile', $_POST['old_profile_image']);
                }

                // upload 10_marksheet start
                if (isset($_FILES['10_marksheet']['name']) && $_FILES['10_marksheet']['name'] != "") {
                    $ten_marksheet = $this->uploadSingleImg($_FILES['10_marksheet'], 'marksheet', $_POST['old_10_marksheet']);
                }

                // upload 12_marksheet start
                if (isset($_FILES['12_marksheet']['name']) && $_FILES['12_marksheet']['name'] != "") {
                    $twelth_marksheet = $this->uploadSingleImg($_FILES['12_marksheet'], 'marksheet', $_POST['old_12_marksheet']);
                }
                // upload diploma start
                if (isset($_FILES['diploma']['name']) && $_FILES['diploma']['name'] != "") {
                    $diploma = $this->uploadSingleImg($_FILES['diploma'], 'marksheet', $_POST['old_diploma']);
                }

                // upload degree start
                if (isset($_FILES['degree']['name']) && $_FILES['degree']['name'] != "") {
                    $degree = $this->uploadSingleImg($_FILES['degree'], 'marksheet', $_POST['old_degree']);
                }

                // upload aadhar start
                if (isset($_FILES['aadhar']['name']) && $_FILES['aadhar']['name'] != "") {
                    $aadhar = $this->uploadSingleImg($_FILES['aadhar'], 'marksheet', $_POST['old_aadhar']);
                }

                // upload pan start
                if (isset($_FILES['pan']['name']) && $_FILES['pan']['name'] != "") {
                    $pan = $this->uploadSingleImg($_FILES['pan'], 'marksheet', $_POST['old_pan']);
                }

                // upload bank_attachment start
                if (isset($_FILES['bank_attachment']['name']) && $_FILES['bank_attachment']['name'] != "") {
                    $bank_attachment = $this->uploadSingleImg($_FILES['bank_attachment'], 'experiencedocx', $_POST['old_bank_attachment']);
                }

                // upload relieving_letter start
                if (isset($_FILES['relieving_letter']['name'])) {
                    $relieving_letter = $this->uploadMOfMImg($_FILES['relieving_letter'], 'experiencedocx', (isset($_POST['old_relieving_letter']))?$_POST['old_relieving_letter']:NULL);
                }

                // upload experience_latter start
                if (isset($_FILES['experience_latter']['name'])) {
                    $experience_latter = $this->uploadMOfMImg($_FILES['experience_latter'], 'experiencedocx', (isset($_POST['old_experience_latter']))?$_POST['old_experience_latter']:NULL);
                }
                // upload sarary_slip start
                if (isset($_FILES['sarary_slip']['name'])) {
                    $sarary_slip = $this->uploadMOfMMImg($_FILES['sarary_slip'], 'experiencedocx', (isset($_POST['old_sarary_slip']))?$_POST['old_sarary_slip']:NULL);
                }
                // pre($_POST['old_sarary_slip']);
                // pre($sarary_slip);
                // exit;

                $updateData = array();
                $updateData['id'] = $_POST['id'];
                $updateData['fname'] = $_POST['firstName'];
                $updateData['lname'] = $_POST['lastName'];
                $updateData['email'] = $_POST['pemail'];
                $updateData['company_email'] = $_POST['company_email'];
                $updateData['phone'] = $_POST['personal_mobile'];
                $updateData['alt_mobile'] = $_POST['alt_mobile'];
                $updateData['gender'] = $_POST['gender'];
                $updateData['password'] = (isset($_POST['password']) && !empty($_POST['password']) && strlen($_POST['password']) > 5) ? md5($_POST['password']) : $_POST['old_password'];
                $updateData['role'] = $_POST['role'];
                $updateData['department'] = $_POST['department'];
                $updateData['dob'] = $_POST['dob'];
                $updateData['permanent_address'] = $_POST['permanent_address'];
                $updateData['current_address'] = $_POST['current_address'];
                $updateData['ctc'] = $_POST['ctc'];
                $updateData['joining_date'] = $_POST['joining_date'];
                $updateData['aadhar_number'] = $_POST['aadhar_number'];
                $updateData['pan_number'] = $_POST['pan_number'];
                $updateData['bank_name'] = $_POST['bank_name'];
                $updateData['ifsc_code'] = $_POST['ifsc_code'];
                $updateData['bank_account_no'] = $_POST['bank_account_no'];
                $updateData['company_data'] = json_encode($_POST['companyData']);
                $updateData['profile_image'] = (isset($profile_image) && !empty($profile_image)) ? $profile_image : $_POST['old_profile_image'];
                $updateData['ten_marksheet'] = (isset($ten_marksheet) && !empty($ten_marksheet)) ? $ten_marksheet : $_POST['old_profile_image'];
                $updateData['twelth_marksheet'] = (isset($twelth_marksheet) && !empty($twelth_marksheet)) ? $twelth_marksheet : $_POST['old_profile_image'];
                $updateData['relieving_letter'] = $relieving_letter;//(isset($relieving_letter) && !empty($relieving_letter)) ? $relieving_letter : json_encode($_POST['old_relieving_letter']);
                $updateData['experience_latter'] = $experience_latter;//(isset($experience_latter) && !empty($experience_latter)) ? $experience_latter : json_encode($_POST['old_experience_latter']);
                $updateData['sarary_slip'] = $sarary_slip;//(isset($sarary_slip) && !empty($sarary_slip)) ? $sarary_slip : json_encode($_POST['old_sarary_slip']);
                $updateData['bank_attachment'] = (isset($bank_attachment) && !empty($bank_attachment)) ? $bank_attachment : $_POST['old_profile_image'];
                $updateData['diploma'] = (isset($diploma) && !empty($diploma)) ? $diploma : $_POST['old_profile_image'];
                $updateData['degree'] = (isset($degree) && !empty($degree)) ? $degree : $_POST['old_profile_image'];
                $updateData['aadhar'] = (isset($aadhar) && !empty($aadhar)) ? $aadhar : $_POST['old_profile_image'];
                $updateData['pan'] = (isset($pan) && !empty($pan)) ? $pan : $_POST['old_profile_image'];
                $updateData['guardian_contact'] = $_POST['guardian_contact'];
                $updateData['last_comp_hr_contact'] = $_POST['last_comp_hr_contact'];
                $updateData['updated_at'] = date("Y-m-d H:i:s");
                // pre($_POST);
                // pre($updateData);
                // exit;
                $result = $this->employee->save($updateData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Employee Updated Successfully!');
                    redirect('admin/employee');

                } else {
                    $this->session->set_flashdata('failed', ' Invalid Id !');
                    redirect('admin/employee/edit/' . $id);
                }
            }
        }

    }


    
    

    // upload uploadMOfMImg start
    public function uploadMOfMImg($FILENAME, $FOLDERNAME, $OLDFILES)
    {
        $documentArr = array();
        // upload experience_latter start
        
        if (isset($FILENAME['name']) && count($FILENAME['name']) > 0) {
            for ($i = 1; $i <= count($FILENAME['name']); $i++) {
                if (isset($FILENAME['name'][$i][0])) {
                    for ($j = 0; $j < count($FILENAME['name'][$i]); $j++) {
                        if (isset($FILENAME['name'][$i][$j]) && $FILENAME['name'][$i][$j] != "") {
                            $f_name = $FILENAME['name'][$i][$j];
                            $f_tmp = $FILENAME['tmp_name'][$i][$j];
                            $f_size = $FILENAME['size'][$i][$j];
                            $f_extension = explode('.', $f_name);
                            $f_extension = strtolower(end($f_extension));
                            $f_newfile = 'hrm_' . uniqid() . '.' . $f_extension;
                            $store = 'uploads/' . $FOLDERNAME . '/' . $f_newfile;
                            if (!move_uploaded_file($f_tmp, $store)) {
                                $this->session->set_flashdata('failed', 'Image Upload Failed .');
                            } else {
                                $file = (isset($OLDFILES[$i][$j])) ? $OLDFILES[$i][$j] : "";
                                if (file_exists($file)) {
                                    unlink($file);
                                }
                                $documentArr[$i][] = $store;
                            }
                        }else{
                            if(isset($OLDFILES[$i][$j])){
                                $documentArr[$i][] = $OLDFILES[$i][$j];
                            }
                        }
                    }
                }
            }

        }

        return json_encode($documentArr);
    }
    // upload uploadMOfMImg end
    

    // upload uploadMOfMImg start
    public function uploadMOfMMImg($FILENAME, $FOLDERNAME, $OLDFILES)
    {
        $documentArr = array();
        // upload experience_latter start
        
        if (isset($FILENAME['name']) && count($FILENAME['name']) > 0) {
            for ($i = 1; $i <= count($FILENAME['name']); $i++) {
                if (isset($FILENAME['name'][$i])) {
                    for ($j = 0; $j < count($FILENAME['name'][$i]); $j++) {
                        if (isset($FILENAME['name'][$i][$j]) && $FILENAME['name'][$i][$j] != "") {
                            $f_name = $FILENAME['name'][$i][$j];
                            $f_tmp = $FILENAME['tmp_name'][$i][$j];
                            $f_size = $FILENAME['size'][$i][$j];
                            $f_extension = explode('.', $f_name);
                            $f_extension = strtolower(end($f_extension));
                            $f_newfile = 'hrm_' . uniqid() . '.' . $f_extension;
                            $store = 'uploads/' . $FOLDERNAME . '/' . $f_newfile;
                            if (!move_uploaded_file($f_tmp, $store)) {
                                $this->session->set_flashdata('failed', 'Image Upload Failed .');
                            } else {
                                $file = (isset($OLDFILES[$i][$j])) ? $OLDFILES[$i][$j] : "";
                                if (file_exists($file)) {
                                    unlink($file);
                                }
                                $documentArr[$i][] = $store;
                            }
                        }else{
                            if(isset($OLDFILES[$i])){
                                for ($k=0; $k < count($OLDFILES[$i]) ; $k++) { 
                                    $documentArr[$i][] = $OLDFILES[$i][$k];
                                }
                            }
                        }
                    }
                }
            }

        }
        return json_encode($documentArr);
    }
    // upload uploadMOfMImg end



    //  code for ajax list 
    public function ajax_list()
    {
        $list = $this->employee->get_datatables();

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

                $status = '<a href="' . base_url() . 'admin/employee/Unpublished/' . $currentObj->id . '" title="Click to Unverify"><img src="' . base_url() . 'assets/images/verify.png" alt="" style="width: 17px;"></a>';

            } else {
                $status = '<a href="' . base_url() . 'admin/employee/published/' . $currentObj->id . '" title="Click to Verify"><img src="' . base_url() . 'assets/images/unverify.png" alt="" style="width: 17px;"></a>';

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

            if (isset($currentObj->profile_image) && !empty($currentObj->profile_image)) {
                $profile_image = '<img src="' . base_url() . $currentObj->profile_image . '" alt="" style="width:30px;height:30px;border-radius:50%;">';
            } else {
                $profile_image = '<img src="' . base_url() . 'assets/images/user.png" alt="" style="width:30px;height:30px;border-radius:50%;">';
            }

            $deteteBtn = (isset($_SESSION['role_type']) && $_SESSION['role_type'] == 1) ? '<a  title="Delete" class="deletebtn btn p-1" href="javascript:void(0)" data_id="' . $currentObj->id . '" ><i class="bi bi-trash"></i></button></a>' : '';

            $action = '<div class="d-flex flex-row bd-highlight mb-3"> 
                            <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/employee/edit/' . $currentObj->id . '" title="Edit Employee" ><i class="bi bi-pencil-square"></i></i></a></button>&nbsp;
                            <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/employee/view/' . $currentObj->id . '" title="View Employee" ><i class="bi bi bi-eye-fill"></i></i></a></button>&nbsp;' . $deteteBtn . '
                       </div>';
            $no++;
            $row = [];
            $row[] = (isset($currentObj->fname) && !empty($currentObj->fname)) ? '<a href="' . base_url() . 'admin/employee/view/' . $currentObj->id . '" title="View Employee" class="d-flex" >' . $profile_image .'</a>' : '<span class="badge bg-inverse-danger">N/A</span>';
            $row[] = $currentObj->fname;
            $row[] = $currentObj->emp_code;
            $row[] = $currentObj->phone;
            $row[] = $currentObj->email;
            $row[] = $this->config->item('department')[$currentObj->department];
            $row[] = $status;
            $row[] = $currentObj->joining_date;
            $row[] = $currentObj->role;
            $row[] = $action;
            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->employee->count_all(),
            "recordsFiltered" => $this->employee->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    // end code for ajax list
    function view($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;
            $data["view_data"] = $this->employee->find($id);

            $data['title'] = "View Employee";
            $this->load->view('admin/employee/view', $data);
        }
    }

    // end code for ajax list 

    function view_history($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->load->model('admin/category_model', 'category');
            $this->load->model('admin/employee_model', 'employee');

            $editData = $this->employee->getRow('employee', $id);

            $w = array();
            $w['table'] = 'user_history';
            $w['orderby'] = '-id';
            $w['owner_id'] = $id;
            $data['user_history'] = $this->employee->findDynamic($w);
            // pre($data['user_history']);
// exit;
            // end code for get state list 


            $data['edit_data'] = $editData;

            $this->load->view('admin/employee/user_history', $data);

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
            $count = $this->employee->getCount('employee', 'employee.id', $id);

            if (isset($count) and !empty($count)) {
                $this->employee->delete('employee', 'id', $id);

                $this->session->set_flashdata('message', ' employee Deleted Successfully !');

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
                    $this->employee->delete('employee', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' employee(s) Deleted Successfully !');
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
                if (!is_null($employee = $this->employee->getRow('employee', $id))) {
                    $status = $employee->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->employee->updateData('employee', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
                        redirect($_GET['redirect']);
                    } else {
                        redirect('admin/employee');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/employee');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/employee');
            }
        }
    }




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




    // upload uploadMultipleImg start
    public function uploadMultipleImg($FILENAME, $FOLDERNAME, $OLDFILES)
    {
        $documentArr = array();
        // upload experience_latter start
        if (isset($FILENAME['name']) && count($FILENAME['name']) > 0) {
            for ($i = 0; $i < count($FILENAME['name']); $i++) {
                if (isset($FILENAME['name'][$i]) && $FILENAME['name'][$i] != "") {
                    $f_name = $FILENAME['name'][$i];
                    $f_tmp = $FILENAME['tmp_name'][$i];
                    $f_size = $FILENAME['size'][$i];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $f_newfile = 'hrm_' . uniqid() . '.' . $f_extension;
                    $store = 'uploads/' . $FOLDERNAME . '/' . $f_newfile;
                    if (!move_uploaded_file($f_tmp, $store)) {
                        $this->session->set_flashdata('failed', 'Image Upload Failed .');
                    } else {
                        $file = (isset($OLDFILES[$i])) ? $OLDFILES[$i] : "";
                        if (file_exists($file)) {
                            unlink($file);
                        }
                        $documentArr[] = $store;
                    }
                }

            }

        }

        return json_encode($documentArr);
    }
    // upload uploadMultipleImg end



}