<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

require APPPATH . '/libraries/BaseController.php';

class Sub_admin extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

         $this->load->model('admin/sub_admin_model', 'sub_admin');
         $this->load->model('admin/category_model', 'category');
        
         $this->isLoggedIn();
    }

    function index()
    {
        $data['sub_admin'] = $this->sub_admin->getList('sub_admin');
        $data['title'] = "sub_admin";
        $this->load->view('admin/sub_admin/manage', $data); 
    }

    // code for get list   // like  country , state , city 
    public function getList(){

        if(!empty($_POST['id']))
        {
            // $talbeName  = $_POST['tableName'];
            // $sql  = "SELECT * FROM ";
            $tablename = $_POST['tableName'];
            $columnNam = $_POST['columnNam'];
            $id = $_POST['id'];
            $sql="Select * from  $tablename where  $columnNam=$id";    
            $result  = $this->states->rawQuery($sql);
            if(!empty($result)){
                
                $p= '';
                foreach ($result as $key => $value) {

                    $p.='<option value="'.$value->id.'">'.$value->name.'</option>';
                }
            }else{
                $p.='<option value=""> -- No State Found -- </option>';
            }
            echo $p;
        }
    }


    // end code for get list // like country , state , city 

       //  code for publish user 
       public function published($id)
       {
           $updateData  = array();
           $updateData['id']  = $id;
           $updateData['status'] = 1;
           $result = $this->sub_admin->save($updateData);
           if ($result) {
               $this->session->set_flashdata('success', 'sub_admin  Published  Sucessfully');
               redirect('admin/sub_admin/');
           } else {
               $this->session->set_flashdata('error', ' sub_admin Published  Failed');
               redirect('admin/sub_admin/');
           }
       }
       //  end code for publish user
       //  code for Unpublish user 
       public function Unpublished($id)
       {
           $updateData  = array();
           $updateData['id']  = $id;
           $updateData['status'] = 0;
           $result = $this->sub_admin->save($updateData);
           if ($result) {
               $this->session->set_flashdata('success', 'sub_admin UnPublished  Sucessfully');
               redirect('admin/sub_admin/');
           } else {
               $this->session->set_flashdata('error', 'sub_admin UnPublished   Failed');
               redirect('admin/sub_admin/');
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
            $data['title'] = "add_sub_admin";
            $this->load->view('admin/sub_admin/add', $data);
           } else {
               //  code for insert data 
             
           

             
            $insertData  = array();
            $insertData['name']               = $_POST['name'];
            $insertData['email']              = $_POST['email'];
            $insertData['phone']              = $_POST['phone'];
            $insertData['password']           = md5($_POST['password']);
            $insertData['role']               = $_POST['role'];
            $insertData['status']             = 1;
            $insertData['created_at']         = date("Y-m-d H:i:s");
                
            $result  = $this->sub_admin->save($insertData);
         


             $heading="This mail is for your Inquery panel login crediantional";
                        
             $content="
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Client Name : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>".$insertData['name']."</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>E-mail : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>".$insertData['email']."</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Mobile : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>".$insertData['phone']."</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Password : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>".$this->input->post('password')."</span></td>
                 </tr>
             </div>
             <div style='margin-top:1px;'>
                 <tr>
                 <td align='left' style='font-family:Montserrat,sans-serif;font-size:12px;line-height:24px;color: #4b4b4b;' width='35%'>Role : </td>
                 <td align='left' style='font-family: Montserrat, sans-serif;color:#2e2323; font-size:12px;line-height:24px' valign='middle' width='52.5%'><span>".$this->config->item('subAdmin')[$insertData['role']]."</span></td>
                 </tr>
             </div>
          
           ";
            
            $message=get_email_temp($heading,$content);

           
            $subject = "Inquiry User Registration";
            $this->send_email($insertData['email'], $subject, $message);
            // pre($r);
            // exit;
            if($result > 0){
                $this->session->set_flashdata('success', 'Sub Admin  Added Successfully!');
            }else{
                $this->session->set_flashdata('failed', 'Failed to  Add Sub Admin !');
            }
            redirect('admin/sub_admin');
        }
    }


    // Edit
    function edit($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('name', 'Name ', 'required');
            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $this->load->model('admin/category_model','category');
                $this->load->model('admin/sub_admin_model','sub_admin');
                
                $editData = $this->sub_admin->find($id);
                $data['edit_data'] = $editData;

               
                $data['title'] = "edit_sub_admin";
                $this->load->view('admin/sub_admin/edit', $data);

            } else {
                //  code for insert data 
              
                    $id  = $_POST['id'];
               
                    $updateData  = array();
                    $updateData['id']                 = $id;
                    $updateData['name']               = $_POST['name'];
                    $updateData['email']              = $_POST['email'];
                    $updateData['phone']              = $_POST['phone'];
                    $updateData['password']           = (isset($_POST['password']) && !empty($_POST['password']) && strlen($_POST['password'])>5)?md5($_POST['password']):$_POST['old_password'];
                    $updateData['role']               = $_POST['role'];
                    $updateData['updated_at']         = date("Y-m-d H:i:s");
                    // pre($_POST);
                    // pre($updateData);
                    // exit;
                    $result  = $this->sub_admin->save($updateData);

                        if($result >0){
                            $this->session->set_flashdata('success', 'Contact Us  Updated Successfully!');
                            redirect('admin/sub_admin');

                        }else{
                            $this->session->set_flashdata('failed', ' Invalid Id !');
                            redirect('admin/sub_admin/edit/'.$id);
                        }
            }
        }

    }

    //  code for ajax list 
    // Sub category  list

    public function ajax_list()
    {
        $list = $this->sub_admin->get_datatables();

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
          
           
            if($currentObj->status==1){

                $status = '<span class="btn-success badge">Active</span>
                <p>
                    <a style="margin-top:10px;" class=" btn-danger badge" href="'.base_url().'admin/sub_admin/Unpublished/'.$currentObj->id.'">Click  InActive</a>
                </p>';
                
            }else{
                   $status = '<span class="btn-danger badge">InActive</span>
                   <p>
                    <a style="margin-top:10px;" class=" btn-success badge" href="'.base_url().'admin/sub_admin/published/'.$currentObj->id.'">Click  Active</a>
                </p>
                   ';

            }
           
            if($currentObj->role==1){

                $role = '<span class="btn-success badge">'.$this->config->item('subAdmin')[$currentObj->role].'</span>';
            }else if($currentObj->role==2){
                $role = '<span class="btn-info badge">'.$this->config->item('subAdmin')[$currentObj->role].'</span>';
            }else{
                $role = "Other";
            }
           

            $currentDate = date("y-m-d H:i:s");
            $sevenMinutLost = strtotime("-7 minutes", strtotime($currentDate));
             $last_activity = $currentObj->last_activity;
            if($sevenMinutLost < strtotime($last_activity)){
                $online = '<span class="circle pulse green"></span>';
            }else{
                $online = '<span class="circle pulse red"></span>';
            }

            $no++;
            $row = [];
            $row[] = $no;
            $row[]= (isset($currentObj->name) && !empty($currentObj->name))?$online.$currentObj->name:'<span class="badge bg-inverse-danger">N/A</span>';
            $row[]=$currentObj->system_ip;
            $row[]=$currentObj->email;
            $row[]=$role;
            $row[] = $status;
            $row[]=$currentObj->last_login;
            $row[] = $date_at;
            // $row[] = $updated_at;
            $row[] =
            '<div class="dropdown">
                <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></div>
                  <div class="dropdown-menu leads showMe" aria-labelledby="dropdownMenuButton">
                    <ul>
                      <li class=""><a class="" href="' .base_url() .'admin/sub_admin/edit/' .$currentObj->id .'" title="Edit User" >Edit User</i></a></li>
                      <li class=""><a  title="Delete" class="deletebtn" href="javascript:void(0)" data_id="' . $currentObj->id .'" >Delete</a></li>
                      </ul>
                      </div>
                      </div>
                      </div>';
                    //   <li class=""><a class="" href="' .base_url() .'admin/sub_admin/view_history/' .$currentObj->id .'" title="View History" >View History</i></a></li>

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->sub_admin->count_all(),
            "recordsFiltered" => $this->sub_admin->count_filtered(),
            "data" => $data,
        ];
        //output to json format
        echo json_encode($output);
    }

    // end code for get total list of places

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

                $this->load->model('admin/category_model','category');
                $this->load->model('admin/sub_admin_model','sub_admin');

                $editData = $this->sub_admin->getRow('sub_admin', $id);



                // end code for get state list 

                 // code for get cayegory list 
                $categoryId      =  $editData->category_id;

                 $categoryList   = $this->category->all();
                if (!empty($categoryList)) {
                    $data['categoriesList']  = $categoryList;
                }

                $subcategoryId      =  $editData->sub_admin_id;

                 $subcategoryList   = $this->sub_admin->all();
                 if (!empty($subcategoryList)) {
                    $data['subcategoriesList']  = $subcategoryList;
                }
               


                $data['edit_data'] = $editData;

                $this->load->view('admin/sub_admin/view', $data);
            } else {
                redirect('admin/sub_admin/view');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/sub_admin/view');
        }
    }


    // end code for ajax list 

    function view_history($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

                $this->load->model('admin/category_model','category');
                $this->load->model('admin/sub_admin_model','sub_admin');

                $editData = $this->sub_admin->getRow('sub_admin', $id);

                $w = array();
                $w['table'] = 'user_history'; 
                $w['orderby'] = '-id'; 
                $w['owner_id'] = $id; 
                $data['user_history'] = $this->sub_admin->findDynamic($w);
// pre($data['user_history']);
// exit;
                // end code for get state list 

           
                $data['edit_data'] = $editData;

                $this->load->view('admin/sub_admin/user_history', $data);
            
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
            $count = $this->sub_admin->getCount('sub_admin', 'sub_admin.id', $id);

            if (isset($count) and !empty($count)) {
                $this->sub_admin->delete('sub_admin', 'id', $id);

                $this->session->set_flashdata('message', ' sub_admin Deleted Successfully !');

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
                    $this->sub_admin->delete('sub_admin', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' sub_admin(s) Deleted Successfully !');
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
                if (!is_null($sub_admin = $this->sub_admin->getRow('sub_admin', $id))) {
                    $status = $sub_admin->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->sub_admin->updateData('sub_admin', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
                        redirect($_GET['redirect']);
                    } else {
                        redirect('admin/sub_admin');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/sub_admin');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/sub_admin');
            }
        }
    }
}


