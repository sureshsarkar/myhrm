<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Policy extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/policy_model', 'policy');
        $this->load->model('admin/category_model', 'category');

        $this->isLoggedIn();
    }

    function index()
    {
        $w = array();
        $data['edit_data'] = $this->policy->all();

        $data['title'] = "Policy";
        $this->load->view('admin/policy/manage', $data);
    }
    // end code for get list // like country , state , city 

    // Add 
    public function add()
    {


        $data = null;

        $this->form_validation->set_rules('policy_name', 'Policy Name', 'required');
        $data['errors'] = [];

        if ($this->form_validation->run() == false) {

            // end code for get category list 
            $data['title'] = "Add Policy";
            $this->load->view('admin/policy/add', $data);
        } else {

            $policy_name = "";

            $policy_name = $this->uploadSingleImg($_FILES['policy_file'], 'policy', NULL);
            $insertData = array();
         
            $insertData['policy_name']       = $_POST['policy_name'];
            $insertData['policy_file']       = $policy_name;
            $insertData['status']            = 1;
            $insertData['created_at']        = date("Y-m-d H:i:s");
            // pre($_POST);
       
            $result = $this->policy->save($insertData);
            // pre($result);
            // exit;
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Policy submited Successfully!');
            } else {
                $this->session->set_flashdata('failed', 'Failed To Submite Policy Form !');
            }
            redirect('admin/policy');
        }
    }

   // Edit
   function edit($id)
   {
       if (isset($id) and !empty($id)) {
           $data = null;

           $this->form_validation->set_rules('policy_name', 'policy Name', 'required');
           $this->form_validation->set_rules('id', 'Id', 'required');
           $data['errors'] = [];
       
           if ($this->form_validation->run() == false) {

               $this->load->model('admin/category_model', 'category');

               $editData = $this->policy->find($id);
               $data['edit_data'] = $editData;


               $data['title'] = "Edit Policy";
               $this->load->view('admin/policy/edit', $data);

           } else {
               //  code for insert data 
               $id = $_POST['id'];

               $policy_name = "";

               if(isset($_FILES['policy_file']) && $_FILES['policy_file']['name'] != ""){
                   $policy_name = $this->uploadSingleImg($_FILES['policy_file'], 'policy', $_POST['old_policy_file']);
               }else{
                   $policy_name = $_POST['old_policy_file'];
               }

               $updateData = array();
               $updateData['id']                = $_POST['id'];
               $updateData['policy_name']       = $_POST['policy_name'];
               $updateData['policy_file']       = $policy_name;
               $updateData['status']            = 1;
               $updateData['updated_at']        = date("Y-m-d H:i:s");
             
               $result = $this->policy->save($updateData);

               if ($result > 0) {
                   $this->session->set_flashdata('success', 'policy Form Updated Successfully!');
                   redirect('admin/policy');

               } else {
                   $this->session->set_flashdata('failed', ' Invalid Id !');
                   redirect('admin/policy/edit/' . $id);
               }
           }
       }
   }

   // Edit
   function view($id)
   {
       if (isset($id) and !empty($id)) {
               $viewData = $this->policy->find($id);
               $data['view_data'] = $viewData;
               $data['title'] = "View Policy";
               $this->load->view('admin/policy/view', $data);
       }
    }

     //  code for ajax list 
   public function ajax_list()
   {
       $list = $this->policy->get_datatables();

       $data = [];
       $no = isset($_POST['start']) ? $_POST['start'] : '';
       // save data for parent catelgory list

       // save data for parent catelgory list

       foreach ($list as $currentObj) {
           error_reporting(0);
        //    pre($currentObj);
           // end code for iamge 
           $temp_date = $currentObj->created_at;
           $date_at = date("d-m-Y", strtotime($temp_date));
           $temp_updated_at = $currentObj->updated_at;
           $updated_at = date("d-m-Y", strtotime($temp_updated_at));


           if ($currentObj->status == 1) {

               $status = '<a href="' . base_url() . 'admin/policy/Unpublished/' . $currentObj->id . '" title="Click to InActive"><img src="' . base_url() . 'assets/images/verify.png" alt="" style="width: 17px;"></a>';

           } else {
               $status = '<a href="' . base_url() . 'admin/policy/published/' . $currentObj->id . '" title="Click to Active"><img src="' . base_url() . 'assets/images/unverify.png" alt="" style="width: 17px;"></a>';

           }


           $deteteBtn = (isset($_SESSION['role_type']) && $_SESSION['role_type'] == 1) ? '<a  title="Delete" class="deletebtn btn p-1" href="javascript:void(0)" data_id="' . $currentObj->id . '" ><i class="bi bi-trash"></i></button></a>' : '';

           $action = '<div class="d-flex flex-row bd-highlight mb-3"> 
                           <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/policy/edit/' . $currentObj->id . '" title="Edit policy" ><i class="bi bi-pencil-square"></i></i></a></button>&nbsp;
                           <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/policy/view/' . $currentObj->id . '" title="View policy" ><i class="bi bi bi-eye-fill"></i></i></a></button>&nbsp;' . $deteteBtn . '
                      </div>';
           $no++;
           $row = [];
           $row[] = $currentObj->policy_name;
           $row[] = $status;
           $row[] = $date_at;
           $row[] = $currentObj->updated_at;
           $row[] = $action;
           $data[] = $row;
       }
       $output = [
           "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
           "recordsTotal" => $this->policy->count_all(),
           "recordsFiltered" => $this->policy->count_filtered(),
           "data" => $data,
       ];
       //output to json format
       echo json_encode($output);
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
            $count = $this->policy->getCount('policy', 'policy.id', $id);

            if (isset($count) and !empty($count)) {
                $this->policy->delete('policy', 'id', $id);

                $this->session->set_flashdata('message', ' policy Deleted Successfully !');

                echo "success";

                exit();
            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }


    
    //  code for publish user 
    public function published($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 1;
        $result = $this->policy->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'policy  Published  Sucessfully');
            redirect('admin/policy/');
        } else {
            $this->session->set_flashdata('error', ' policy Published  Failed');
            redirect('admin/policy/');
        }
    }
    //  end code for publish user
    //  code for Unpublish user 
    public function Unpublished($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 0;
        $result = $this->policy->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'policy UnPublished  Sucessfully');
            redirect('admin/policy/');
        } else {
            $this->session->set_flashdata('error', 'policy UnPublished   Failed');
            redirect('admin/policy/');
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