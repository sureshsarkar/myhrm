<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Events extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/events_model', 'events');
        $this->load->model('admin/category_model', 'category');

        $this->isLoggedIn();
    }

    function index()
    {
        $data['title'] = "Events";
        $this->load->view('admin/events/manage', $data);
    }
    // end code for get list // like country , state , city 

    // Add 
    public function add()
    {
        $data = null;

        $this->form_validation->set_rules('event_date', 'Event Date', 'required');
        $this->form_validation->set_rules('event_heading', 'Event Heading', 'required');

        $data['errors'] = [];

        if ($this->form_validation->run() == false) {

            $w = array();
            $w['status'] = 1;
            $w['table'] = 'employee';
            $data['allEmployee'] = $this->events->findDynamic($w);
            // end code for get category list 
            $data['title'] = "Add Event";
            $this->load->view('admin/events/add', $data);
        } else {
            //  code for insert data 
           $attachment = "";
        //   if(isset($_FILES['event_attachment']['name'][0]) && !empty($_FILES['event_attachment']['name'][0])){
        //       $attachment = $this->uploadMOfMImg($_FILES['event_attachment'], 'events', NULL);
        //   }
          $insertData = array();
          $insertData['event_type']          = $_POST['event_type'];
          $insertData['emp_id']              = (isset($_POST['emp_id']))?$_POST['emp_id']:'';
          $insertData['event_date']          = $_POST['event_date'];
          $insertData['event_time']          = $_POST['event_time'];
          $insertData['event_heading']       = $_POST['event_heading'];
          $insertData['event_content']       = $_POST['event_content'];
          $insertData['event_attachment']    = $attachment;
          $insertData['status']              = 1;
          $insertData['created_at']          = date("Y-m-d H:i:s");
          $result = $this->events->save($insertData);
         
            //get employee data 
            $w = array();
            $w['status'] = 1;
            $w['table'] = 'employee';
            $allEmployee = $this->events->findDynamic($w);

            //set notification data 
            $addNoti=array();
            $addNoti['event_id']     = $result;
            $addNoti['title']        = $_POST['event_heading'];
            $addNoti['content']      = $_POST['event_content'];
            $addNoti['created_at']   =date("Y-m-d H:i:s");

            foreach ($allEmployee as $k => $v) {
                $addNoti['emp_id']   = $v->id;
                notification($addNoti);
            }
        
        // pre($insertData);
        // exit;
        
           
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Events form submited Successfully!');
            } else {
                $this->session->set_flashdata('failed', 'Failed To Submite Events Form !');
            }
            redirect('admin/events');
        }
    }


    // upload uploadMOfMImg start
    public function uploadMOfMImg($FILENAME, $FOLDERNAME, $OLDFILES)
    {
        $documentArr = array();
        // upload experience_latter start
        if (isset($FILENAME['name']) && count($FILENAME['name']) > 0) {
            for($i = 0; $i < count($FILENAME['name']); $i++) {
                    if(isset($FILENAME['name'][$i]) && $FILENAME['name'][$i] != "") {
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
                    }else{
                        if(isset($OLDFILES[$i])){
                            $documentArr[] = $OLDFILES[$i];
                        }
                    }
            }

        }

        return json_encode($documentArr);
    }
    // upload uploadMOfMImg end
    


    // Edit
    function edit($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('event_date', 'Events Date', 'required');
           $this->form_validation->set_rules('event_heading', 'Event Heading', 'required');

            $data['errors'] = [];
        
            if ($this->form_validation->run() == false) {

                $this->load->model('admin/category_model', 'category');

                $editData = $this->events->find($id);
                $data['edit_data'] = $editData;

                $w = array();
                $w['status'] = 1;
                $w['table'] = 'employee';
                $data['allEmployee'] = $this->events->findDynamic($w);


                $data['title'] = "Edit Event";
                $this->load->view('admin/events/edit', $data);

            } else {
                //  code for insert data 
                $id = $_POST['id'];
                // pre($_POST);
                // pre($_FILES);
                // exit;
                $attachment = "";
                if(isset($_FILES['event_attachment']['name'][0]) && !empty($_FILES['event_attachment']['name'][0])){
                    $attachment = $this->uploadMOfMImg($_FILES['event_attachment'], 'events', $_POST['old_event_attachment']);
                }else{
                    $attachment = (isset($_POST['old_event_attachment']))?$_POST['old_event_attachment']:'';
                }
                
                
                $updateData = array();
                $updateData['id']                  = $id;
                $updateData['event_type']          = $_POST['event_type'];
                $updateData['emp_id']              = (isset($_POST['emp_id']))?$_POST['emp_id']:'';
                $updateData['event_date']          = $_POST['event_date'];
                $updateData['event_time']          = $_POST['event_time'];
                $updateData['event_heading']       = $_POST['event_heading'];
                $updateData['event_content']       = $_POST['event_content'];
                $updateData['event_attachment']    = $attachment;
                $updateData['status']              = 1;
                $updateData['updated_at']          = date("Y-m-d H:i:s");
            
                // pre($updateData);
                // exit;
                $result = $this->events->save($updateData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Events Form Updated Successfully!');
                    redirect('admin/events');

                } else {
                    $this->session->set_flashdata('failed', ' Invalid Id !');
                    redirect('admin/events/edit/' . $id);
                }
            }
        }

    }
   //  code for ajax list 
   public function ajax_list()
   {
       $list = $this->events->get_datatables();

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

               $status = '<a href="' . base_url() . 'admin/events/Unpublished/' . $currentObj->id . '" title="Click to InActive"><img src="' . base_url() . 'assets/images/verify.png" alt="" style="width: 17px;"></a>';

           } else {
               $status = '<a href="' . base_url() . 'admin/events/published/' . $currentObj->id . '" title="Click to Active"><img src="' . base_url() . 'assets/images/unverify.png" alt="" style="width: 17px;"></a>';

           }


           $deteteBtn = (isset($_SESSION['role_type']) && $_SESSION['role_type'] == 1) ? '<a  title="Delete" class="deletebtn btn p-1" href="javascript:void(0)" data_id="' . $currentObj->id . '" ><i class="bi bi-trash"></i></button></a>' : '';

           $action = '<div class="d-flex flex-row bd-highlight mb-3"> 
                           <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/events/edit/' . $currentObj->id . '" title="Edit Events" ><i class="bi bi-pencil-square"></i></i></a></button>&nbsp;
                           <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/events/view/' . $currentObj->id . '" title="View Events" ><i class="bi bi bi-eye-fill"></i></i></a></button>&nbsp;' . $deteteBtn . '
                      </div>';
           $no++;
           $row = [];
           $row[] = ($currentObj->event_type !=0)?$this->config->item('event_type')[$currentObj->event_type]:'<span class="badge bg-inverse-success">N/A</span>';
           $row[] ='<span class="badge bg-inverse-success">'.date("l d-m-Y", strtotime($currentObj->event_date)).'</span>';
           $row[] =(!empty($currentObj->event_time))?'<span class="badge bg-inverse-success">'.date("h:i A", strtotime($currentObj->event_time)).'</span>':'N/A';
           $row[] = $currentObj->event_heading;
           $row[] = $status;
           $row[] = $action;
           $data[] = $row;
       }
       $output = [
           "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
           "recordsTotal" => $this->events->count_all(),
           "recordsFiltered" => $this->events->count_filtered(),
           "data" => $data,
       ];
       //output to json format
       echo json_encode($output);
   }
   // end code for ajax list


    //  code for publish user 
    public function published($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 1;
        $result = $this->events->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'events  Published  Sucessfully');
            redirect('admin/events/');
        } else {
            $this->session->set_flashdata('error', ' events Published  Failed');
            redirect('admin/events/');
        }
    }
    //  end code for publish user
    //  code for Unpublish user 
    public function Unpublished($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 0;
        $result = $this->events->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'events UnPublished  Sucessfully');
            redirect('admin/events/');
        } else {
            $this->session->set_flashdata('error', 'events UnPublished   Failed');
            redirect('admin/events/');
        }
    }


    function view($id)
    {
        if (isset($id) and !empty($id)) {

            $data['view_data'] = $this->events->find($id);

            $this->load->view('admin/events/view', $data);
        }
    }

    // end code for ajax list 

    // delete
    function delete()
    {
       
        $id = "";

        if (isset($_POST)) {
            $id = $_POST["id"];
        }
        
        if (isset($id) and !empty($id)) {
            $count = $this->events->getCount('event', 'event.id', $id);

            if (isset($count) and !empty($count)) {
                $this->events->delete('event', 'id', $id);

                $this->session->set_flashdata('message', ' Event Deleted Successfully !');

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
                    $this->events->delete('events', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' events(s) Deleted Successfully !');
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
                if (!is_null($events = $this->events->getRow('events', $id))) {
                    $status = $events->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->events->updateData('events', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
                        redirect($_GET['redirect']);
                    } else {
                        redirect('admin/events');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/events');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/events');
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




}