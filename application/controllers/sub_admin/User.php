<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class User extends BaseController

{

    public function __construct()

    {
     
       parent::__construct();

       $this->load->model('admin/user_model');

        $this->load->model('admin/message_model');



    }


    public function index()

    {


        $this->isLoggedIn();

        $this->global['pageTitle'] = 'shulle : User';

        $this->load->view("admin/user/list", $this->global, NULL , NULL);

        

    }



    // Add New 

    // update by ajax 
    public function changestatus(){
        if(isset($_POST['id']) && $_POST['id'] !='')
        {
            $columnName  = $_POST['columnName'];
            $insertData['id'] = $_POST['id'];
            $insertData[$columnName] = $_POST['status'];
            $result = $this->user_model->save($insertData);
        }
    }


    public function addnew()

    {



        $data['permission']= $this->config->item('permission');


        /*  end code for get lastUser uniq id*/

        $this->load->library('base_library');

        // Cookie helper

        $this->load->helper('cookie');

        $data['user_type']= $this->config->item('userType');

        $data['parent_list'] = $this->user_model->getparent_id();

        $this->isLoggedIn();

        $this->global['pageTitle'] = 'shulle : Add New User';

       $this->load->view('admin/user/addnew', $data);
    } 

    // delete category 

    public function delete()

    {

        // define path for file location 

        $this->isLoggedIn();

        $id = $_POST['id'];

        // get image path 

        $rData = $this->user_model->find($id);

        $file  = 'uploads/user/'.$rData->image;

        // delete image

        unlink($file);

        $result = $this->user_model->delete($id);

        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }

        else { echo(json_encode(array('status'=>FALSE))); }

    }


    // code for download excell in php  

    public function downloadExecel(){
        ob_start();
      
        // download Plan Excel 
  	if(isset($_GET['export']) && isset($_GET['download'])  && $_GET['export'] == 'excel' && $_GET['download'] != ''){

       
        
        $WHERE_Plan =  '';
        $sql = "SELECT * FROM z_users  $WHERE_Plan ORDER BY id DESC ";
        $res = $this->user_model->rawQuery($sql);
      
        $export = '
        <style>
                th, td {
        border: 1px solid #e5e5e5;
        }
        </style>
        <table> 
        <th scope="col">S.No.</th>
        <th scope="col">Name</th>
        <th scope="col">Uniq Id </th>
        <th scope="col">Mobile</th>
        <th scope="col">Address</th>
        <th scope="col"> Designation</th>
        <th scope="col">PS Area </th>
        <th scope="col">Email</th>
        <th scope="col">Block Status</th>
        <th scope="col">Refrence Name</th>
        <th scope="col">Refrence UniqId</th>
        <th scope="col">Refrence Contact</th>
        <th scope="col">User Type</th>
        <th scope="col">Expiry Date</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        
        '; 
        $i = 1; 
        // while($plan = mysqli_fetch_assoc($res))
        foreach ($res as $key => $currentObj) {
           
            $block = ($currentObj->block == 0)?"False":'True';
            $temp_date = $currentObj->date_at;

            $date_at = date("d-m-Y", strtotime($temp_date));

            $expi_date = $currentObj->expiryDate;

            $expiryDate = date("d-m-Y", strtotime($expi_date));
            //$userList[$row['id']] = $row; 
          
            if($currentObj->user_type==2){
                $user_type = 'Editor';
            }else if($currentObj->user_type==1){
                $user_type = 'Admin';
            }else if($currentObj->user_type==3){
                $user_type = 'Member';
            }else{
                $user_type = 'New Users';
            }
            
            $status1='';

            if($currentObj->status==1){
                $status1 = '<span class="btn-success badge">Active</span>';              
            }elseif($currentObj->status==2){
                $status1 = '<span class="btn-warning  badge">Pending</span>';
            }else{
                $status1 = '<span class="btn-danger badge">InActive</span>';
            }
            $export .= '
            <tr class="">
            <th scope="row">'. $i .'</th>
            <th scope="row">'. $currentObj->first_name.$currentObj->last_name.'</th>
            <td><span class="badge rounded-pill " >'. ucfirst($currentObj->uniqe_id) .'</span></td>
            <td>'. $currentObj->phone.'</td>
            <td>'. $currentObj->address.'</td>
            <td>'. $currentObj->designation.'</td>
            <td>'. $currentObj->area.'</td>
            <td>'. $currentObj->email.'</td>
            <td>'. $block .'</td>
            <td>'. $currentObj->refrenceName.'</td>
            <td class="" >'. $currentObj->refrenceuniqId.'</td>
            <td class="" >'. $currentObj->refrencecontact.'</td>
            <td>'. $user_type.'</td>
            <td>'. $expiryDate.'</td>
            <td>'. $date_at.'</td>
            <td>'. $status1.'</td>
          
            
            </tr>
            ';
            $i++;
        } 

        echo $export .= '</table>';

        
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=trufedu-plan.xls');
        
        
        exit;
    }
    ob_end_flush();
    }

    // end code for download excell in php 
    


    // end category 

    // Insert Member *************************************************************

    public function insertnow()

    {
        $this->isLoggedIn();

        $this->load->library('form_validation');            
        $this->form_validation->set_rules('first_name','Name','trim|required');

        $this->form_validation->set_rules('uniqe_id','Uniqe Id ','trim');

        $this->form_validation->set_rules('phone','Phone','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        //form data 

        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
                $this->addnew();
        }else{

            $insertData['first_name'] = $form_data['first_name'];
            
            $insertData['email'] = $form_data['email'];

            $insertData['phone'] = $form_data['phone'];

            $insertData['password'] = md5($form_data['password']);

            $insertData['original_pass'] = $form_data['password'];

            $insertData['status'] = $form_data['status'];
          
            $insertData['user_type'] = $form_data['user_type'];

            $insertData['date_at'] = date("Y-m-d H:i:s");



            if(!empty($form_data['userimage'])){

                $imgBase64 = $_POST['userimage'];   
                $targetDir = "uploads/usersimage/";  
                $pos  = strpos($imgBase64, ';');
                $type = explode(':', substr($imgBase64, 0, $pos))[1];
                $img_extension = str_replace('image/', '', $type) ;
                $onlyFileName = uniqid("NCR-".date("m-d-y-"));
                $fileName  = $onlyFileName.".".$img_extension;
                $data = $imgBase64;
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                file_put_contents($targetDir.$fileName, $data);
                # get image extension store it in var
                $img_ex = pathinfo($fileName, PATHINFO_EXTENSION);
                
                  $img_ex_lc = strtolower($img_ex);
                /** crating array that stores allowed to upload image extensions. **/
                $allowed_exs = array("jpg", "jpeg", "png");
                /**  check if the the image extension     is present in $allowed_exs array
                **/
             
                if(in_array($img_ex_lc, $allowed_exs)) {
                   
                    
                     $insertData['image'] = $fileName;
                   
                }else{
                    $this->session->set_flashdata('error', "You can't upload files of this type");
                }

            }
    
            $result = $this->user_model->save($insertData);
            if($result > 0)
            {

                if(!empty($form_data['email'])){

                     /* code for send user registration success mail */

                      $toEmail    = $form_data['email'];  // user gmail addresss 

                    //$toEmail    ='ajitkp18@gmail.com';  // user gmail addresss 

                     $subject    = "Successfull Registration";

                     $message    =  join('', array($form_data['welcome_message']));

    
                      $this->send_email($toEmail,$subject,$message); 

                    /* code for send expiry message */


                    /* end code for send user registration success mail */   

                }

                
                $this->session->set_flashdata('success', 'user successfully Added');

            }

            else

            { 

                $this->session->set_flashdata('error', 'user Addition failed');

            }

            redirect('admin/user/addnew');

            
        }
        

    }

    //  code for delete multiple record  
    
    public function Multipledelete(){
        if(!empty($_POST['deleteArray'])){
        $deleteArray   = $_POST['deleteArray'];
        $deleteArray =   (explode(",",$deleteArray));
            foreach ($deleteArray as $key => $value) {
               $result =  $this->user_model->delete($value);
            }
            if($result>0){
                echo 1;
            }else{
                echo 0;
            }
        }
        exit();
    }


    // end code for delete multiple record 

    //  code for publish user 
    public function published($id)
    {
        $updateData  = array();
        $updateData['id']  = $id;
        $updateData['status'] = 1;
        $result = $this->user_model->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'User Active  Sucessfully');
            redirect('admin/user/');
        } else {
            $this->session->set_flashdata('error', 'User Active   Failed');
            redirect('admin/user/');
        }
    }
    //  end code for publish user
    //  code for Unpublish user 
    public function Unpublished($id)
    {
        $updateData  = array();
        $updateData['id']  = $id;
        $updateData['status'] = 0;
        $result = $this->user_model->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'User InActive  Sucessfully');
            redirect('admin/user/');
        } else {
            $this->session->set_flashdata('error', 'User  InActive   Failed');
            redirect('admin/user/');
        }
    }
     //  end code for publish user

    //  code for deletepublish user 
    public function deletepublish($id)
    {
    
        $result = $this->user_model->delete($id);
        if ($result) {
            $this->session->set_flashdata('success', 'User Reject  Sucessfully');
            redirect('admin/user/');
        } else {
            $this->session->set_flashdata('error', 'User  Reject   Failed');
            redirect('admin/user/');
        }
    }
     //  end code for publish user
    // category list

    public function ajax_list()

    {

		$list = $this->user_model->get_datatables();

		$data = array();

        $no =(isset($_POST['start']))?$_POST['start']:'';



        foreach ($list as $currentObj) {

            $temp_date = $currentObj->date_at;

            $date_at = date("d-m-Y", strtotime($temp_date));

            $no++;

            $row = array();
           
            $row[] = $currentObj->id;

            $row[] = $currentObj->first_name.$currentObj->last_name;

            $row[] = $currentObj->phone;

            $row[] = $currentObj->email;
          
            if($currentObj->user_type==2){

                $user_type = 'Editor';

            }else if($currentObj->user_type==1){

                $user_type = 'Admin';

            }else if($currentObj->user_type==3){

                $user_type = 'Member';

            }else{

                $user_type = 'New Users';

            }

            $status1='';

            if($currentObj->status==1){

               

                $status1 = '<span class="btn-success badge">Active</span>
                <p>
                    <a style="margin-top:10px;" class=" btn-danger badge" href="'.base_url().'admin/user/Unpublished/'.$currentObj->id.'">Click  InActive</a>
                </p>';
                
            }elseif($currentObj->status==2){

             

                $status1 = '<span class="btn-warning  badge">Pending</span>
                <p>
                    <a style="margin-top:10px;" class=" btn-danger badge" href="'.base_url().'admin/user/deletepublish/'.$currentObj->id.'">Click  Reject</a>
                </p>
                <p>
                    <a style="margin-top:10px;" class=" btn-success badge" href="'.base_url().'admin/user/published/'.$currentObj->id.'">Click Active</a>
                </p>';

            }else{

       

                   $status1 = '<span class="btn-danger badge">InActive</span>
                   <p>
                    <a style="margin-top:10px;" class=" btn-success badge" href="'.base_url().'admin/user/published/'.$currentObj->id.'">Click  Active</a>
                </p>
                   ';

            }

            $row[] = $user_type;

            $row[] = $status1;

            $row[] = $date_at;

            $row[] = '<a class="btn btn-sm btn-info badge" href="'.base_url().'admin/user/edit/'.$currentObj->id.'" title="Edit" ><i class="fa fa-pencil"></i></a> &nbsp; <a class="btn btn-sm btn-danger deletebtn badge" href="javascript:void(0)" title="delete"  data_id="'.$currentObj->id.'" ><i class="fa fa-trash"></i></a> <a class="btn btn-sm btn-info badge" href="'.base_url().'admin/user/profile/'.$currentObj->id.'" title="Edit" ><i class="fa fa-eye"></i></a>';



            $data[] = $row;

            

        }

        $output = array(

                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',

                        "recordsTotal" => $this->user_model->count_all(),

                        "recordsFiltered" => $this->user_model->count_filtered(),

                        "data" => $data,

                );

        //output to json format

        echo json_encode($output);

    }





    // Edit

 

    public function edit($id = NULL)

    {


        $this->isLoggedIn();

        if($id == null)

        {

            redirect('admin/user');

        }

        $data['user_type']= $this->config->item('userType');

        $data['parent_list'] = $this->user_model->getparent_id();

        $userDetails   = $this->user_model->find($id);
        $data['edit_data'] = $userDetails;


        // code for get selected   user permission list 
        $permissionArray  = $this->config->item('permission');
        if(!empty($id)){
            // code for get permission page list 
            // end code for get permission page list 
      
            if(isset($userDetails->permission)){
                $selected = array();
                $temp = json_decode($userDetails->permission);
                if(!empty($temp)){
                    foreach ($temp as $key => $value) {
                        $selected[$value] = $key;
                    }
                }
                //$selected = array();
            }
            $i = 1;
                $selectedPermission='';
            foreach($permissionArray as $k=>$v){
                $selectedProp = isset($selected[$k])?'checked':'';
                 $selectedPermission.='<div class="col-md-3 col-6"><input name="permissions[]" id="checkbox-id'.$i.'" type="checkbox" value="'.$k.'" '.$selectedProp.' ><label for="checkbox-id'.$i.'">'.$v.'</label></div>';
                $i++;
            }
            
            if(!empty($selectedPermission)){
                $data['selectedPermission']    = $selectedPermission;
            }

         
         
        }
  
// pre( $data['edit_data'] );
// exit();
        // end code for get selected user permission list 
        $data['pageTitle'] = 'shulle : Edit Members';

        $this->load->view("admin/user/edit",$data,NULL);

    } 

     public function profile($id = NULL)

    {

        

        $this->isLoggedIn();

        if($id == null)

        {

            redirect('admin/userlist');

        }

        $data['user_type']= $this->config->item('userType');

        $data['parent_list'] = $this->user_model->getparent_id();

        $data['edit_data'] = $this->user_model->find($id);

        $data['pageTitle'] = 'News : Edit Members';

        $this->load->view("admin/user/useredit",$data , NULL);

    } 

    // Update category*************************************************************

    public function update()

    {

        $this->isLoggedIn();

     
        //form data 

        $form_data  = $this->input->post();

        
            $insertData['id'] = $form_data['id'];

            $insertData['first_name'] = $form_data['first_name'];

            $insertData['email'] = $form_data['email'];

            $insertData['phone'] = $form_data['phone'];

            $insertData['password'] = md5($form_data['password']);

            $insertData['original_pass'] = $form_data['password'];

            $insertData['status'] = $form_data['status'];

            $insertData['user_type'] = $form_data['user_type'];

            $insertData['date_at'] = date("Y-m-d H:i:s");

      
            if(!empty($form_data['userimage'])){

                $imgBase64 = $_POST['userimage'];   
                $targetDir = "uploads/usersimage/";  
                $pos  = strpos($imgBase64, ';');
                $type = explode(':', substr($imgBase64, 0, $pos))[1];
                $img_extension = str_replace('image/', '', $type) ;
                $onlyFileName = uniqid("NCR-".date("m-d-y-"));
                $fileName  = $onlyFileName.".".$img_extension;
                $data = $imgBase64;
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                file_put_contents($targetDir.$fileName, $data);
                # get image extension store it in var
                $img_ex = pathinfo($fileName, PATHINFO_EXTENSION);
                
                  $img_ex_lc = strtolower($img_ex);
                /** crating array that stores allowed to upload image extensions. **/
                $allowed_exs = array("jpg", "jpeg", "png");
                /**  check if the the image extension     is present in $allowed_exs array
                **/
             
                if(in_array($img_ex_lc, $allowed_exs)) {
                   
                    
                     $insertData['image'] = $fileName;
                   
                }else{
                    $this->session->set_flashdata('error', "You can't upload files of this type");
                }
            
            }
           
            $result = $this->user_model->save($insertData);

            if($result > 0)

            {

                $where = array();

                $where['status'] = 1;

                $where['orderby'] = '-id';

                $messageList = $this->message_model->findDynamic($where);

                if(!empty($messageList)){

                  $message1 = $messageList[0]->name;

                }

               if(!empty($form_data['email'])){

                     /* code for send user registration success mail */

                     $toEmail    = $form_data['email'];  // user gmail addresss 

                    //$toEmail    ='ajitkp18@gmail.com';  // user gmail addresss 

                     $subject    = "Successfull Registration";

                     $message    =  join('', array($form_data['welcome_message']));

                 

                     $this->send_email($toEmail,$subject,$message);

    

                    /* end code for send user registration success mail */   

                }



                $this->session->set_flashdata('success', ' User successfully Updated');

            }

            else

            { 

                $this->session->set_flashdata('error', 'User Updation failed');

            }

            redirect('admin/user/edit/'.$insertData['id']);

      
    }



    

    

    

}



?>