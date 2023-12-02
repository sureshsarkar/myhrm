<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Jobportal extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/applicant_module', 'applicant');
        $this->load->model('admin/job_module', 'job');
        $this->load->model('admin/category_model', 'category');

        $this->isLoggedIn();
    }

    function applicant()
    {
        $w = array();
        $w['field'] = "id";
        $w['status'] = 1;
        $awaitningReviewed = $this->applicant->findDynamic($w);
        $data['awaitningReviewed'] = count($awaitningReviewed);

        $w = array();
        $w['field'] = "id";
        $w['status'] = 2;
        $contactingReviewed = $this->applicant->findDynamic($w);
        $data['contactingReviewed'] = count($contactingReviewed);

        $w = array();
        $w['field'] = "id";
        $w['status'] = 3;
        $shortListed = $this->applicant->findDynamic($w);
        $data['shortListed'] = count($shortListed);

        $w = array();
        $w['field'] = "id";
        $w['status'] = 4;
        $hieredReviewed = $this->applicant->findDynamic($w);
        $data['hieredReviewed'] = count($hieredReviewed);

        $w = array();
        $w['field'] = "id";
        $w['status'] = 5;
        $Rejected = $this->applicant->findDynamic($w);
        $data['Rejected'] = count($Rejected);

        $data['title'] = "Applicant Module";
        $this->load->view('admin/jobportal/applicant/manage', $data);
    }


    function job()
    {
        $w = array();
        $w['orderby'] = "-id";
        $w['limit'] = "30";
        $data['job'] = $this->job->findDynamic($w);

        $data['title'] = "Job Module";
        $this->load->view('admin/jobportal/job/manage', $data);
    }

    //  code for  job_ajax_list 
    public function job_ajax_list()
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

    // Add Job 
    public function addjob()
    {
        $data = null;

        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('experience', 'Experience', 'required');

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {

            // end code for get category list 
            $data['title'] = "Add Job";
            $this->load->view('admin/jobportal/job/add', $data);
        } else {
            //  code for insert data 

            $store = "";

            if (isset($_FILES['attachment']) && $_FILES['attachment']['name'] != "") {
                $f_name = $_FILES['attachment']['name'];
                $f_tmp = $_FILES['attachment']['tmp_name'];
                $f_size = $_FILES['attachment']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = 'hrm_' . uniqid() . '.' . $f_extension;
                $store = 'uploads/job_attachment/' . $f_newfile;
                if (!move_uploaded_file($f_tmp, $store)) {
                    $this->session->set_flashdata('failed', 'Image Upload Failed .');
                }
            }


            $insertData = array();
            $insertData['designation'] = $_POST['designation'];
            $insertData['date_limit'] = $_POST['date_limit'];
            $insertData['experience'] = $_POST['experience'];
            $insertData['status'] = 0;
            $insertData['created_at'] = date("Y-m-d H:i:s");
            $insertData['attachment'] = $store;

            $result = $this->job->save($insertData);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Job form submited Successfully!');
            } else {
                $this->session->set_flashdata('failed', 'Failed To Submite job Form !');
            }
            redirect('admin/jobportal/job');
        }
    }



    // edit_job
    function edit_job($id)
    {

        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('id', 'Id', 'required');
            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $editData = $this->job->find($id);
                $data['edit_data'] = $editData;

                // end code for get category list 
                $data['title'] = "Edit Job";
                $this->load->view('admin/jobportal/job/edit', $data);

            } else {
                //  code for insert data 
                $store = "";
                $id = $_POST['id'];


                if (isset($_FILES['attachment']) && $_FILES['attachment']['name'] != "") {
                    $f_name = $_FILES['attachment']['name'];
                    $f_tmp = $_FILES['attachment']['tmp_name'];
                    $f_size = $_FILES['attachment']['size'];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $f_newfile = 'hrm_' . uniqid() . '.' . $f_extension;
                    $store = 'uploads/job_attachment/' . $f_newfile;
                    if (!move_uploaded_file($f_tmp, $store)) {
                        $this->session->set_flashdata('failed', 'Image Upload Failed .');
                    } else {
                        $file = (isset($_POST['old_attachment'])) ? $_POST['old_attachment'] : "";
                        if (file_exists($file)) {
                            unlink($file);
                        }

                    }
                }


                $updateData = array();
                $updateData['id'] = $id;
                $updateData['designation'] = $_POST['designation'];
                $updateData['date_limit'] = $_POST['date_limit'];
                $updateData['experience'] = $_POST['experience'];
                $updateData['status'] = 0;
                $updateData['created_at'] = date("Y-m-d H:i:s");
                $updateData['attachment'] = $store;

                $result = $this->job->save($updateData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Job FollowUp Added Successfully!');
                    redirect('admin/jobportal/job');

                } else {
                    $this->session->set_flashdata('failed', ' Invalid Id !');
                    redirect('admin/jobportal/edit_job/' . $id);
                }
            }
        }

    }




    // Add 
    public function addapplicant()
    {
        $data = null;

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {

            // end code for get category list 
            $data['title'] = "Add Applicant";
            $this->load->view('admin/jobportal/applicant/add', $data);
        } else {
            //  code for insert data 

            $store = "";
            $insertData = array();
            $insertData['name'] = $_POST['name'];
            $insertData['email'] = $_POST['email'];
            $insertData['experience'] = $_POST['experience'];
            $insertData['role'] = $_POST['role'];
            $insertData['status'] = 1;
            $insertData['created_at'] = date("Y-m-d H:i:s");

            if (isset($_FILES['cv']) && $_FILES['cv']['name'] != "") {
                $f_name = $_FILES['cv']['name'];
                $f_tmp = $_FILES['cv']['tmp_name'];
                $f_size = $_FILES['cv']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = 'hrm_' . uniqid() . '.' . $f_extension;
                $store = 'uploads/job_cv/' . $f_newfile;
                if (!move_uploaded_file($f_tmp, $store)) {
                    $this->session->set_flashdata('failed', 'Image Upload Failed .');
                } else {
                    // $file =(isset($OLDFILES))?$OLDFILES:"";
                    // if(file_exists ( $file))
                    // {
                    //    unlink($file);
                    // }

                    // return $store;
                }
            }

            $insertData['cv'] = $store;

            $result = $this->applicant->save($insertData);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Applicant form submited Successfully!');
            } else {
                $this->session->set_flashdata('failed', 'Failed To Submite Applicant Form !');
            }
            redirect('admin/jobportal/applicant');
        }
    }


    // edit_applicant
    function edit_applicant($id)
    {

        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('id', 'Id', 'required');
            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $editData = $this->applicant->find($id);
                $data['edit_data'] = $editData;

                // end code for get category list 
                $data['title'] = "Edit Applicant";
                $this->load->view('admin/jobportal/applicant/edit', $data);

            } else {
                //  code for insert data 
                $id = $_POST['id'];
                // pre($_POST);
// exit();
                //  code for insert data 
                $date = date("Y-m-d H:i:s");
                $followup_note = array();
                $oldfollowupdata = array();
                $arr = array();
                $id = $_POST['id'];
                $datetime = $_POST['followup_date'] . ' ' . $_POST['followup_time'];
                $datetime = date("Y-m-d H:i:s", strtotime($datetime));


                $w = array();
                $w['id'] = $id;
                $w['field'] = 'followupdata';
                $FollowupData = $this->applicant->findDynamic($w);

                if (isset($FollowupData) && count($FollowupData) > 0) {
                    $oldFollowupData = $FollowupData[0];
                    $oldFollowupData = json_decode($oldFollowupData->followupdata);
                }


                if (isset($_POST['followup_date']) && !empty($_POST['followup_date'])) {
                    $followup_note[] = array('followup_time' => $datetime, "status" => $_POST['status'], "followup_note" => $_POST['followup_note'], "created_at" => $date);
                }

                if (!empty($oldFollowupData) > 0 && count($followup_note) > 0) {
                    $arr = array_merge($oldFollowupData, $followup_note);
                } else if (!empty($oldFollowupData) && count($oldFollowupData) > 0) {
                    $arr = $oldFollowupData;
                } else if (count($followup_note) > 0) {
                    $arr = $followup_note;
                }

                // pre($_POST);
                // exit();

                if (isset($_FILES['cv']) && $_FILES['cv']['name'] != "") {
                    $f_name = $_FILES['cv']['name'];
                    $f_tmp = $_FILES['cv']['tmp_name'];
                    $f_size = $_FILES['cv']['size'];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $f_newfile = 'hrm_' . uniqid() . '.' . $f_extension;
                    $store = 'uploads/job_cv/' . $f_newfile;
                    if (!move_uploaded_file($f_tmp, $store)) {
                        $this->session->set_flashdata('failed', 'Image Upload Failed .');
                    } else {
                        $file = (isset($_POST['old_cv'])) ? $_POST['old_cv'] : "";
                        if (file_exists($file)) {
                            unlink($file);
                        }

                    }
                }


                $updateData = array();
                $updateData['id'] = $id;
                $updateData['status'] = $_POST['status'];
                $updateData['followup_date'] = $datetime;
                $updateData['followupdata'] = json_encode($arr);
                $updateData['updated_at'] = $date;
                $updateData['cv'] = $store;

                $result = $this->applicant->save($updateData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Applicant FollowUp Added Successfully!');
                    redirect('admin/jobportal/applicant');

                } else {
                    $this->session->set_flashdata('failed', ' Invalid Id !');
                    redirect('admin/jobportal/edit_applicant/' . $id);
                }
            }
        }

    }


    // Add 
    public function jobportal_profile()
    {
        $data['title'] = "Jobportal Profile";
        $this->load->view('admin/jobportal/jobportal_profile', $data);
    }


    // Edit
    function edit($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('jobportal_reason', 'Jobportal Reason', 'required');
            $this->form_validation->set_rules('date_to', 'Date To', 'required');
            $this->form_validation->set_rules('date_from', 'Date From', 'required');
            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $this->load->model('admin/category_model', 'category');
                $this->load->model('admin/jobportal_model', 'jobportal');

                $editData = $this->jobportal->find($id);
                $data['edit_data'] = $editData;


                $data['title'] = "edit_jobportal";
                $this->load->view('admin/jobportal/edit', $data);

            } else {
                //  code for insert data 
                $id = $_POST['id'];

                $startDate = strtotime($_POST['date_from']); // Replace with your start date
                $endDate = strtotime($_POST['date_to']); // Replace with your end date
                $days = date("d", $endDate - $startDate);
                if ($days == "01") {
                    $day_name = date("l", $startDate);
                } else {
                    $day_name = date("l", $startDate) . '-' . date("l", $endDate);
                    ;
                }

                $updateData = array();
                $updateData['id'] = $id;
                $updateData['emp_id'] = $_SESSION['userId'];
                $updateData['day_name'] = $day_name;
                $updateData['jobportal_reason'] = $_POST['jobportal_reason'];
                $updateData['date_from'] = $_POST['date_from'];
                $updateData['date_to'] = $_POST['date_to'];
                $updateData['days'] = $days;
                $updateData['updated_at'] = date("Y-m-d H:i:s");
                // pre($updateData);
                // exit;
                $result = $this->jobportal->save($updateData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Jobportal Form Updated Successfully!');
                    redirect('admin/jobportal');

                } else {
                    $this->session->set_flashdata('failed', ' Invalid Id !');
                    redirect('admin/jobportal/edit/' . $id);
                }
            }
        }

    }

    //  code for ajax list 
    public function ajax_list()
    {
        $list = $this->jobportal->get_datatables();

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

                $status = '<span class="btn-success badge">Approved</span>
                <p>
                    <a style="margin-top:10px;" class=" btn-danger badge" href="' . base_url() . 'admin/jobportal/Unpublished/' . $currentObj->id . '">Click  UnApprove</a>
                </p>';

            } else {
                $status = '<span class="btn-danger badge">Not Approve</span>
                   <p>
                    <a style="margin-top:10px;" class=" btn-success badge" href="' . base_url() . 'admin/jobportal/published/' . $currentObj->id . '">Click  Approved</a>
                </p>
                   ';

            }

            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $currentObj->fname . ' ' . $currentObj->lname;
            $row[] = $currentObj->phone;
            $row[] = $currentObj->email;
            $row[] = $currentObj->role;
            $row[] = $currentObj->leave_date_from;
            $row[] = $currentObj->leave_date_to;
            $row[] = $status;
            // $row[] = $currentObj->last_login;
            $row[] = $date_at;
            // $row[] = $updated_at;
            $row[] =
                '<div class="dropdown">
                <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></div>
                  <div class="dropdown-menu leads showMe" aria-labelledby="dropdownMenuButton">
                    <ul>
                      <li class=""><a class="" href="' . base_url() . 'admin/jobportal/edit/' . $currentObj->id . '" title="Edit User" >Edit User</i></a></li>
                      <li class=""><a  title="Delete" class="deletebtn" href="javascript:void(0)" data_id="' . $currentObj->id . '" >Delete</a></li>
                      </ul>
                      </div>
                      </div>
                      </div>';
            //   <li class=""><a class="" href="' .base_url() .'admin/jobportal/view_history/' .$currentObj->id .'" title="View History" >View History</i></a></li>

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->jobportal->count_all(),
            "recordsFiltered" => $this->jobportal->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    // end code for ajax list 

    //  code for  applicant_ajax_list 
    public function applicant_ajax_list()
    {
        $list = $this->applicant->get_datatables();

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

            $status = '<span class="bg-inverse-success badge">' . $this->config->item('appl_status')[$currentObj->status] . '</span>';

            $no++;
            $row = [];
            $row[] = $currentObj->name;
            $row[] = $currentObj->email;
            $row[] = $currentObj->role;
            $row[] = $currentObj->experience;
            $row[] = $status;
            $row[] = $date_at;
            $row[] =
                '
                <a href="' . base_url() . 'admin/jobportal/edit_applicant/' . $currentObj->id . '" ><i class="bi bi-pencil-square"></i></a>
                <a href="javascript:void(0)" data_id="' . $currentObj->id . '" ><i class="bi bi-trash"></i></a>
                      ';
            //   <li class=""><a class="" href="' .base_url() .'admin/jobportal/view_history/' .$currentObj->id .'" title="View History" >View History</i></a></li>

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->applicant->count_all(),
            "recordsFiltered" => $this->applicant->count_filtered(),
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

            $this->form_validation->set_rules('name', 'Name Name', 'required');
            $this->form_validation->set_rules('status', 'Status Name', 'trim|xss_clean');
            $this->form_validation->set_rules('created_at', 'Created_at Name', 'trim');
            $this->form_validation->set_rules('update_at', 'Update_at Name', 'trim');

            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $this->load->view('admin/jobportal/view', $data);
            } else {
                redirect('admin/jobportal/view');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/jobportal/view');
        }
    }


    // end code for ajax list 

    function view_history($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->load->model('admin/category_model', 'category');
            $this->load->model('admin/jobportal_model', 'jobportal');

            $editData = $this->jobportal->getRow('jobportal', $id);

            $w = array();
            $w['table'] = 'user_history';
            $w['orderby'] = '-id';
            $w['owner_id'] = $id;
            $data['user_history'] = $this->jobportal->findDynamic($w);
            // pre($data['user_history']);
// exit;
            // end code for get state list 


            $data['edit_data'] = $editData;

            $this->load->view('admin/jobportal/user_history', $data);

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
            $count = $this->jobportal->getCount('jobportal', 'jobportal.id', $id);

            if (isset($count) and !empty($count)) {
                $this->jobportal->delete('jobportal', 'id', $id);

                $this->session->set_flashdata('message', ' jobportal Deleted Successfully !');

                echo "success";

                exit();
            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }

    // delete
    function applicant_delete()
    {
        $id = "";

        if (isset($_POST)) {
            $id = $_POST["id"];
        }

        if (isset($id) and !empty($id)) {

            $count = $this->applicant->getCount('applicant_module', 'applicant_module.id', $id);

            if (isset($count) and !empty($count)) {
                $this->applicant->delete('applicant_module', 'id', $id);

                $this->session->set_flashdata('message', ' Applicant Deleted Successfully !');

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
                    $this->jobportal->delete('jobportal', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' jobportal(s) Deleted Successfully !');
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
                if (!is_null($jobportal = $this->jobportal->getRow('jobportal', $id))) {
                    $status = $jobportal->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->jobportal->updateData('jobportal', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
                        redirect($_GET['redirect']);
                    } else {
                        redirect('admin/jobportal');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/jobportal');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/jobportal');
            }
        }
    }
}