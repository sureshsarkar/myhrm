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

        $this->isLoggedIn();
    }

    function index()
    {

        $w = array();
        $w['field'] = 'id';
        $totalLeave = $this->leavemanagement->findDynamic($w);
        $data['totalLeave'] = count($totalLeave);
        
        $w = array();
        $w['department'] = 1;
        $w['field'] = 'id';
        $totalDeveloperLeave = $this->leavemanagement->findDynamic($w);
        $data['totalDeveloperLeave'] = count($totalDeveloperLeave);
            
        $w = array();
        $w['department'] = 2;
        $w['field'] = 'id';
        $totalDesignerLeave = $this->leavemanagement->findDynamic($w);
        $data['totalDesignerLeave'] = count($totalDesignerLeave);
            
        $w = array();
        $w['department'] = 3;
        $w['field'] = 'id';
        $seoLeave = $this->leavemanagement->findDynamic($w);
        $data['seoLeave'] = count($seoLeave);
    
        $w = array();
        $w['department'] = 4;
        $w['field'] = 'id';
        $totalHrLeave = $this->leavemanagement->findDynamic($w);
        $data['totalHrLeave'] = count($totalHrLeave);
            
        $w = array();
        $w['department'] = 5;
        $w['field'] = 'id';
        $totalAccountantLeave = $this->leavemanagement->findDynamic($w);
        $data['totalAccountantLeave'] = count($totalAccountantLeave);

        $data['title'] = "Leavemanagement";
        $this->load->view('admin/leavemanagement/manage', $data);
    }
    function leave()
    {
        $data['leavemanagement'] = $this->leavemanagement->getList('leave_management');
        $data['title'] = "leavemanagement";
        $this->load->view('admin/leavemanagement/leave_request', $data);
    }


    //  code for publish user 
    public function published($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 1;
        $result = $this->leavemanagement->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'leavemanagement  Published  Sucessfully');
            redirect('admin/leavemanagement/');
        } else {
            $this->session->set_flashdata('error', ' leavemanagement Published  Failed');
            redirect('admin/leavemanagement/');
        }
    }
    //  end code for publish user
    //  code for Unpublish user 
    public function Unpublished($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 0;
        $result = $this->leavemanagement->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'leavemanagement UnPublished  Sucessfully');
            redirect('admin/leavemanagement/');
        } else {
            $this->session->set_flashdata('error', 'leavemanagement UnPublished   Failed');
            redirect('admin/leavemanagement/');
        }
    }

    //  end code for publish user


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
            $data['title'] = "Add Leave";
            $this->load->view('admin/leavemanagement/add', $data);
        } else {
            //  code for insert data 

            $insertData = array();
            $insertData['emp_id'] = $_SESSION['userId'];
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
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Employee Name : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" . $_SESSION['name'] . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Leave From : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" . $insertData['leave_date_from'] . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Leave To : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" . $insertData['leave_date_to'] . "</span></td>
                 </tr>
             </div>
          
           ";

            $message = get_email_temp($heading, $content);


            $subject = "Leave Application";
            // $this->send_email($_SESSION['email'], $subject, $message);
            // pre($message);
            // exit;
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Leave form submited Successfully!');
            } else {
                $this->session->set_flashdata('failed', 'Failed To Submite Leave Form !');
            }
            redirect('admin/leavemanagement');
        }
    }

    // Add 
    public function leavemanagement_profile()
    {
        $data['title'] = "Leavemanagement Profile";
        $this->load->view('admin/leavemanagement/leavemanagement_profile', $data);
    }


    // Edit
    function edit($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('leave_date_from', 'Leave Date From ', 'required');
            $this->form_validation->set_rules('leave_date_to', 'Leave Date To ', 'required');
            $this->form_validation->set_rules('leave_reson', 'leave reson ', 'required');
            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $this->load->model('admin/category_model', 'category');
                $this->load->model('admin/leavemanagement_model', 'leavemanagement');

                $editData = $this->leavemanagement->find($id);
                $data['edit_data'] = $editData;


                $data['title'] = "Edit Leave";
                $this->load->view('admin/leavemanagement/edit', $data);

            } else {
                //  code for insert data 
                $id = $_POST['id'];

                $updateData = array();
                $updateData['id'] = $id;
                $updateData['emp_id'] = $_POST['emp_id'];
                $updateData['leave_reson'] = $_POST['leave_reson'];
                $updateData['leave_date_from'] = $_POST['leave_date_from'];
                $updateData['leave_date_to'] = $_POST['leave_date_to'];
                $updateData['nature_of_leave'] = $_POST['nature_of_leave'];
                $updateData['updated_at'] = date("Y-m-d H:i:s");
                // pre($updateData);
                // exit;
                $result = $this->leavemanagement->save($updateData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Leave Form Updated Successfully!');
                    redirect('admin/leavemanagement');

                } else {
                    $this->session->set_flashdata('failed', ' Invalid Id !');
                    redirect('admin/leavemanagement/edit/' . $id);
                }
            }
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

        $form = '<div class="modal show" id="leaveFormApprovalModal'.$currentObj->id.'" data-target="#leaveFormApprovalModal'.$currentObj->id.'" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modelWid">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="leaveFormApprovalModalTitle"> Leave Approval Form
                    </h5>
                    <button type="button" class="close text-primary " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="'.base_url().'admin/leavemanagement/formApproval" method="post">
                <input type="hidden" name="id" value="'.$currentObj->id.'">
                <input type="hidden" name="emp_id" value="'.$currentObj->emp_id.'">
                    <div class="modal-body">
                        <div class="border-calendera ">
                            <div class="attendancesheet">
                                <div class="card shadow-md border">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-12">
                                            <label for="employee" class="form-label label-text">Leave Status*</label>
                                            <select name="status" class="form-control">
                                                <option value="1">Approve</option>
                                                <option value="0">Unapprove</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-md border">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="file" class="form-label label-text">Commnts*</label>
                                            <input type="text" class="form-control" name="comments"
                                                placeholder="Commnts" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
        </div>';

        if ($currentObj->status == 1) {

            $status = '<img src="' . base_url() . 'assets/images/verify.png" id="leave_form" style="width: 17px;cursor:pointer;" title="Click To Unapprove Leave" data-toggle="modal" data-target="#leaveFormApprovalModal'.$currentObj->id.'">'.$form;

        } else {
            $status = '<img src="' . base_url() . 'assets/images/unverify.png" id="leave_form" style="width: 17px; cursor:pointer;" title="Click To Approve Leave" data-toggle="modal" data-target="#leaveFormApprovalModal'.$currentObj->id.'">'.$form;

}

            $no++;
            $row = [];
            $row[] = $currentObj->emp_code;
            $row[] = $currentObj->fname . ' ' . $currentObj->lname;
            $row[] = $currentObj->phone;
            $row[] =  $this->config->item('department')[$currentObj->department];
            $row[] = $currentObj->leave_date_from;
            $row[] = $currentObj->leave_date_to;
            $row[] = $this->config->item('leave_type')[$currentObj->nature_of_leave] ;
            $row[] = $status;
            $row[] = $date_at;
            $row[] =
                '
                <a  href="' . base_url() . 'admin/leavemanagement/edit/' . $currentObj->id . '" title="Edit Leave Form"><i class="bi bi-pencil-square"></i></a>
                <a  href="' . base_url() . 'admin/leavemanagement/view/' . $currentObj->id . '?emp_id=' . $currentObj->emp_id . '" title="View Leave Form"><i class="bi bi bi-eye-fill"></i></a>
                <a  href="javascript:void(0)" data_id="' . $currentObj->id . '" class="deletebtn"><i class="bi bi-trash"></i></a>
          
                      ';

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

    // end code for get total list of places

    // end code for ajax list 

    function view($id)
    {
        $this->load->model('admin/employee_model','employee');
        $emp_id = $_GET['emp_id'];
        if(isset($emp_id) && !empty($emp_id)){
            if (isset($id) and !empty($id)) {
                $data = array();
                $w = array();
                $w['id'] = $emp_id;
                $employeeData = $this->employee->findDynamic($w);
                $data['employeeData'] = $employeeData[0];
                
                $data['leaveData'] = $this->leavemanagement->find($id);
                $data['title'] = "View Leavemanagement";
                $this->load->view('admin/leavemanagement/view', $data);

            } else {
                redirect('admin/leavemanagement');
            }
        }else{
            redirect('admin/leavemanagement');
        }
       
    }


    // end code for ajax list 

    function view_history($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->load->model('admin/category_model', 'category');
            $this->load->model('admin/leavemanagement_model', 'leavemanagement');

            $editData = $this->leavemanagement->getRow('leavemanagement', $id);

            $w = array();
            $w['table'] = 'user_history';
            $w['orderby'] = '-id';
            $w['owner_id'] = $id;
            $data['user_history'] = $this->leavemanagement->findDynamic($w);
            // pre($data['user_history']);
// exit;
            // end code for get state list 


            $data['edit_data'] = $editData;

            $this->load->view('admin/leavemanagement/user_history', $data);

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
            $count = $this->leavemanagement->getCount('leave_management', 'leave_management.id', $id);

            if (isset($count) and !empty($count)) {
                $this->leavemanagement->delete('leave_management', 'id', $id);

                $this->session->set_flashdata('message', ' leavemanagement Deleted Successfully !');

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
                    $this->leavemanagement->delete('leavemanagement', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' leavemanagement(s) Deleted Successfully !');
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
                if (!is_null($leavemanagement = $this->leavemanagement->getRow('leavemanagement', $id))) {
                    $status = $leavemanagement->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->leavemanagement->updateData('leavemanagement', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
                        redirect($_GET['redirect']);
                    } else {
                        redirect('admin/leavemanagement');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/leavemanagement');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/leavemanagement');
            }
        }
    }



    //  code for formApproval
    public function formApproval()
    {
        $id = $_POST['id'];
        $this->load->model('admin/employee_model', 'employee');

        // get employee data 
        $w = array();
        $w['id'] = $_POST['emp_id'];
        $w['field'] = "id,fname,lname,email,phone,emp_code";
        $employee = $this->employee->findDynamic($w);
        $employee = $employee[0];

        // get leave data 
        $leaveData = $this->leavemanagement->find($id);

        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = $_POST['status'];
        $updateData['comments'] = $_POST['comments'];
        $updateData['updated_at'] = date("Y-m-d H:i:s");
        $result = $this->leavemanagement->save($updateData);

        $status = (isset($_POST['status']) && ($_POST['status']==1))?'<span style="background-color: #0fb76b1f;color: #26af48;">Approved</span>':'<span style="background-color: #f211361f;color: #e63c3c;">Not Approved</span>';
        $heading = "Leave Application Reply";

            $content = "
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;font-family: Calibri;' width='35%'>Employee Name : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;;font-family: Calibri;' valign='middle' width='52.5%'><span>" . $employee->fname.' '.$employee->lname."</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Employee Code : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" . $employee->emp_code . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Mobile : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" . $employee->phone . "</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
             <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Nature Of Leave : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" .$this->config->item('leave_type')[$leaveData->nature_of_leave] . "</span></td>
             </tr>
         </div>
              <div style='margin-top:1px;'>
                  <tr>
                     <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Leave From : </td>
                     <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" . $leaveData->leave_date_from . "</span></td>
                  </tr>
              </div>
              <div style='margin-top:1px;'>
                  <tr>
                     <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Leave To : </td>
                     <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" . $leaveData->leave_date_to . "</span></td>
                  </tr>
              </div>
              <div style='margin-top:1px;'>
              <tr>
              <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Status : </td>
              <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" .$status. "</span></td>
              </tr>
          </div>
              <div style='margin-top:1px;'>
              <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Leave Reason : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" . $leaveData->leave_reson . "</span></td>
              </tr>
          </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;font-family: Calibri;' width='35%'>Comments : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px;font-family: Calibri;' valign='middle' width='52.5%'><span>" . $_POST['comments'] . "</span></td>
                 </tr>
             </div>
           ";

            $message = get_email_temp($heading, $content);
           pre($message);
           exit;
            $email = $employee->email.$this->config->item('comonEmail');
            $subject = "Leave Application Reply";
           $this->send_email($email, $subject, $message);

        if ($result) {
            $this->session->set_flashdata('success', 'leavemanagement  Published  Sucessfully');
            redirect('admin/leavemanagement/');
        } else {
            $this->session->set_flashdata('error', ' leavemanagement Published  Failed');
            redirect('admin/leavemanagement/');
        }
    }
    //  end code for formApproval
    
}