<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Holiday extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/holiday_model', 'holiday');
        $this->load->model('admin/category_model', 'category');

        $this->isLoggedIn();
    }

    function index()
    {
        $data['title'] = "holiday";
        $this->load->view('admin/holiday/manage', $data);
    }
    function leave()
    {
        $data['holiday'] = $this->holiday->getList('holiday');
        $data['title'] = "holiday";
        $this->load->view('admin/holiday/leave_request', $data);
    }




    // end code for get list // like country , state , city 

    //  code for publish user 
    public function published($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 1;
        $result = $this->holiday->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'holiday  Published  Sucessfully');
            redirect('admin/holiday/');
        } else {
            $this->session->set_flashdata('error', ' holiday Published  Failed');
            redirect('admin/holiday/');
        }
    }
    //  end code for publish user
    //  code for Unpublish user 
    public function Unpublished($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 0;
        $result = $this->holiday->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'holiday UnPublished  Sucessfully');
            redirect('admin/holiday/');
        } else {
            $this->session->set_flashdata('error', 'holiday UnPublished   Failed');
            redirect('admin/holiday/');
        }
    }

    // Add 
    public function add()
    {
        $data = null;

        $this->form_validation->set_rules('holiday_reason', 'Holiday Reason', 'required');
        $this->form_validation->set_rules('date_to', 'Date To', 'required');
        $this->form_validation->set_rules('date_from','Date From', 'required');

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {

            // end code for get category list 
            $data['title'] = "Add Holiday";
            $this->load->view('admin/holiday/add', $data);
        } else {
            //  code for insert data 
            $startDate = strtotime($_POST['date_from']); // Replace with your start date
            $endDate =strtotime($_POST['date_to']);  // Replace with your end date
            $days = date("d",$endDate - $startDate);
            if($days == "01"){
              $day_name = date("l",$startDate);
            }else{
                $day_name = date("l",$startDate).'-'.date("l",$endDate);;
            }
            
            $insertData = array();
            $insertData['emp_id']         = $_SESSION['userId'];
            $insertData['day_name']       = $day_name;
            $insertData['holiday_reason'] = $_POST['holiday_reason'];
            $insertData['date_from']      = $_POST['date_from'];
            $insertData['date_to']        = $_POST['date_to'];
            $insertData['days']           = $days;
            $insertData['status']         = 1;
            $insertData['created_at']     = date("Y-m-d H:i:s");
         
            $result = $this->holiday->save($insertData);
// exit;
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
          
           ";

            $message = get_email_temp($heading, $content);


            $subject = "Leave Application";
            // $this->send_email($_SESSION['email'], $subject, $message);
            // pre($message);
            // exit;
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Holiday form submited Successfully!');
            } else {
                $this->session->set_flashdata('failed', 'Failed To Submite Holiday Form !');
            }
            redirect('admin/holiday');
        }
    }

    // Add 
    public function holiday_profile()
    {
        $data['title'] = "Holiday Profile";
        $this->load->view('admin/holiday/holiday_profile', $data);
    }


    // Edit
    function edit($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('holiday_reason', 'Holiday Reason', 'required');
            $this->form_validation->set_rules('date_to', 'Date To', 'required');
            $this->form_validation->set_rules('date_from', 'Date From', 'required');
            $data['errors'] = [];
        
            if ($this->form_validation->run() == false) {

                $this->load->model('admin/category_model', 'category');

                $editData = $this->holiday->find($id);
                $data['edit_data'] = $editData;


                $data['title'] = "Add Holiday";
                $this->load->view('admin/holiday/edit', $data);

            } else {
                //  code for insert data 
                $id = $_POST['id'];

                $startDate = strtotime($_POST['date_from']); // Replace with your start date
                $endDate =strtotime($_POST['date_to']);  // Replace with your end date
                $days = date("d",$endDate - $startDate);
                if($days == "01"){
                  $day_name = date("l",$startDate);
                }else{
                    $day_name = date("l",$startDate).'-'.date("l",$endDate);;
                }

                $updateData = array();
                $updateData['id'] = $id;
                $updateData['emp_id']         = $_SESSION['userId'];
                $updateData['day_name']       = $day_name;
                $updateData['holiday_reason'] = $_POST['holiday_reason'];
                $updateData['date_from']      = $_POST['date_from'];
                $updateData['date_to']        = $_POST['date_to'];
                $updateData['days']           = $days;
                $updateData['updated_at'] = date("Y-m-d H:i:s");
                // pre($updateData);
                // exit;
                $result = $this->holiday->save($updateData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Holiday Form Updated Successfully!');
                    redirect('admin/holiday');

                } else {
                    $this->session->set_flashdata('failed', ' Invalid Id !');
                    redirect('admin/holiday/edit/' . $id);
                }
            }
        }

    }
   //  code for ajax list 
   public function ajax_list()
   {
       $list = $this->holiday->get_datatables();

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

               $status = '<a href="' . base_url() . 'admin/holiday/Unpublished/' . $currentObj->id . '" title="Click to InActive"><img src="' . base_url() . 'assets/images/verify.png" alt="" style="width: 17px;"></a>';

           } else {
               $status = '<a href="' . base_url() . 'admin/holiday/published/' . $currentObj->id . '" title="Click to Active"><img src="' . base_url() . 'assets/images/unverify.png" alt="" style="width: 17px;"></a>';

           }


           $deteteBtn = (isset($_SESSION['role_type']) && $_SESSION['role_type'] == 1) ? '<a  title="Delete" class="deletebtn btn p-1" href="javascript:void(0)" data_id="' . $currentObj->id . '" ><i class="bi bi-trash"></i></button></a>' : '';

           $action = '<div class="d-flex flex-row bd-highlight mb-3"> 
                           <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/holiday/edit/' . $currentObj->id . '" title="Edit Holiday" ><i class="bi bi-pencil-square"></i></i></a></button>&nbsp;
                           <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/holiday/view/' . $currentObj->id . '" title="View Holiday" ><i class="bi bi bi-eye-fill"></i></i></a></button>&nbsp;' . $deteteBtn . '
                      </div>';
           $no++;
           $row = [];
           $row[] = $currentObj->day_name;
           $row[] = $currentObj->date_from;
           $row[] = $currentObj->date_to;
           $row[] = $currentObj->holiday_reason;
           $row[] = $currentObj->days;
           $row[] = $status;
           $row[] = $action;
           $data[] = $row;
       }
       $output = [
           "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
           "recordsTotal" => $this->holiday->count_all(),
           "recordsFiltered" => $this->holiday->count_filtered(),
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

                $this->load->view('admin/holiday/view', $data);
            } else {
                redirect('admin/holiday/view');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/holiday/view');
        }
    }


    // end code for ajax list 

    function view_history($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->load->model('admin/category_model', 'category');
            $this->load->model('admin/holiday_model', 'holiday');

            $editData = $this->holiday->getRow('holiday', $id);

            $w = array();
            $w['table'] = 'user_history';
            $w['orderby'] = '-id';
            $w['owner_id'] = $id;
            $data['user_history'] = $this->holiday->findDynamic($w);
            // pre($data['user_history']);
// exit;
            // end code for get state list 


            $data['edit_data'] = $editData;

            $this->load->view('admin/holiday/user_history', $data);

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
            $count = $this->holiday->getCount('holiday', 'holiday.id', $id);

            if (isset($count) and !empty($count)) {
                $this->holiday->delete('holiday', 'id', $id);

                $this->session->set_flashdata('message', ' holiday Deleted Successfully !');

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
                    $this->holiday->delete('holiday', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' holiday(s) Deleted Successfully !');
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
                if (!is_null($holiday = $this->holiday->getRow('holiday', $id))) {
                    $status = $holiday->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->holiday->updateData('holiday', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
                        redirect($_GET['redirect']);
                    } else {
                        redirect('admin/holiday');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/holiday');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/holiday');
            }
        }
    }
}