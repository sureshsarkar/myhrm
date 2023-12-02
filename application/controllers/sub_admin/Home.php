<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

require APPPATH . '/libraries/BaseController.php';

class Home extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

         $this->load->model('admin/home_model', 'home');
         $this->load->model('admin/category_model', 'category');
        
         $this->isLoggedIn();
    }

    function index()
    {
        $data['home'] = $this->home->getList('home');
        $data['title'] = "home";
        $this->load->view('admin/home/manage', $data);
        
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
           $result = $this->home->save($updateData);
           if ($result) {
               $this->session->set_flashdata('success', 'home  Published  Sucessfully');
               redirect('admin/home/');
           } else {
               $this->session->set_flashdata('error', ' home Published  Failed');
               redirect('admin/home/');
           }
       }
       //  end code for publish user
       //  code for Unpublish user 
       public function Unpublished($id)
       {
           $updateData  = array();
           $updateData['id']  = $id;
           $updateData['status'] = 0;
           $result = $this->home->save($updateData);
           if ($result) {
               $this->session->set_flashdata('success', 'home UnPublished  Sucessfully');
               redirect('admin/home/');
           } else {
               $this->session->set_flashdata('error', 'home UnPublished   Failed');
               redirect('admin/home/');
           }
       }
   
       //  end code for publish user
   
    // remove image on places images 

    public function removeImage()
    {

        if (isset($_POST['id']) && $_POST['id'] != '') {

            $homeData = $this->home->find($_POST['id']);

            $image_array = [];

            $image_array = json_decode($homeData->images);
            $new_image_array = [];
            
            foreach ($image_array as $key => $value) {
               

                if ($value == $_POST['imageName']) {

                    unset($image_array[$key]);

                    $file = $_POST['imageName'];

                    unlink($file);

                } else {

                    $new_image_array[] = $value;

                }
            }

            $updateArr = [];

            $updateArr['id'] = $_POST['id'];

            $updateArr['images'] = json_encode($new_image_array);

            $this->home->save($updateArr);

            echo 1;

        }
    }

    // end code remove image on product

    public function add()
    {
        
        $data = null;

        $this->form_validation->set_rules('category_id', 'category ID', 'required');
        
        $data['errors'] = [];

        if ($this->form_validation->run() == false) {

            // code for get category list 
            $w = array();
            $w['status'] = 1;
            $w['field'] = 'id,cat_name';
            $categoryList = $this->category->findDynamic($w);
            if(!empty($categoryList)){
                $data['categoryList']  = $categoryList;
            }
             
            // end code for get category list 
            $data['title'] = "add_home";
            $this->load->view('admin/home/add', $data);
           } else {
               //  code for insert data 

            //    pre($_POST);
            //    exit();
               $card_data = array();
               $images = array();
            //    pre($_POST);
            //    pre($_FILES);
            //    exit();

              // card data start
              if(isset($_POST['title']) && count($_POST['title']) >0){
                for ($i=0; $i < count($_POST['title']) ; $i++) { 
                if($_POST['title'][$i] !="" && isset($_FILES['image']['name'][$i]) && $_FILES['image']['name'][$i] !==''){
                            $f_name         =$_FILES['image']['name'][$i];
                            $f_tmp          =$_FILES['image']['tmp_name'][$i];
                            $f_size         =$_FILES['image']['size'][$i];
                            $f_extension    =explode('.',$f_name);
                            $f_extension    =strtolower(end($f_extension));
                            $f_newfile      ='techcentrica_'.uniqid().'.'.$f_extension;
                            $store          ="uploads/home/".$f_newfile;
                            if(!move_uploaded_file($f_tmp,$store))
                            {
                                $this->session->set_flashdata('failed', 'Image Upload Failed .');
                                redirect('admin/home/edit/'.$id);
                            }else{
                                $card_data[] = array("title"=>$_POST['title'][$i],"paragraph"=>$_POST['paragraph'][$i],"button_text"=>$_POST['button_text'][$i],"image"=>$store);
                            }
                        }else{
                            if(isset($_POST['title'][$i]) && $_POST['title'][$i] !=""){
                                $card_data[] = array("title"=>$_POST['title'][$i],"paragraph"=>$_POST['paragraph'][$i],"button_text"=>$_POST['button_text'][$i],"image"=>"");
                            }
                        }
                }
                
            }
            // card data end

        
           

              // upload og image start
                if(isset($_FILES['images']['name'][0]) && $_FILES['images']['name'][0] !=""){
                    for ($i=0; $i < count($_FILES['images']['name']); $i++) { 
                            $f_name         =$_FILES['images']['name'][$i];
                            $f_tmp          =$_FILES['images']['tmp_name'][$i];
                            $f_size         =$_FILES['images']['size'][$i];
                            $f_extension    =explode('.',$f_name);
                            $f_extension    =strtolower(end($f_extension));
                            $f_newfile      ='techcentrica_'.uniqid().'.'.$f_extension;
                            $store          ="uploads/home/".$f_newfile;
                            if(!move_uploaded_file($f_tmp,$store))
                            {
                                $this->session->set_flashdata('failed', 'Image Upload Failed .');
                            }
                      $images[] = $store;
                   }
                }
              // upload og image end
            
              // upload og image start
                if(isset($_FILES['og_image']['name']) && $_FILES['og_image']['name'] !=""){
                            $f_name         =$_FILES['og_image']['name'];
                            $f_tmp          =$_FILES['og_image']['tmp_name'];
                            $f_size         =$_FILES['og_image']['size'];
                            $f_extension    =explode('.',$f_name);
                            $f_extension    =strtolower(end($f_extension));
                            $f_newfile      ='techcentrica_'.uniqid().'.'.$f_extension;
                            $store          ="uploads/meta_image/".$f_newfile;
                            if(!move_uploaded_file($f_tmp,$store))
                            {
                                $this->session->set_flashdata('failed', 'Image Upload Failed .');
                            }
                    $og_image = $store;
                }
              // upload og image end

             

            $insertData  = array();
            $insertData['category_id']        = $_POST['category_id'];
            // $insertData['sub_category_id']    = $_POST['sub_category_id'];
            $insertData['marque_text']        = $_POST['marque_text'];
            $insertData['get_tough']          = $_POST['get_tough'];
            $insertData['heading1']           = $_POST['heading1'];
            $insertData['para1']              = $_POST['para1'];
            $insertData['heading2']           = $_POST['heading2'];
            $insertData['heading3']           = $_POST['heading3'];
            $insertData['para2']              = $_POST['paragraph2'];
            $insertData['image_alt']          = $_POST['image_alt'];
            $insertData['heading4']           = $_POST['heading4'];
            $insertData['para3']              = $_POST['paragraph3'];
            $insertData['card_data']          = json_encode($card_data);
            $insertData['images']             = json_encode($images);
            $insertData['meta_data']          = json_encode($_POST['meta']);
            $insertData['og_image']           = (isset($og_image))?$og_image:"" ;
            $insertData['status']             = $_POST['status'];
            $insertData['slug']               = $_POST['slug'];
            $insertData['created_at']         = date("Y-m-d H:i:s");

            $insert_id  = $this->home->save($insertData);
     
            if($insert_id > 0){
                $this->session->set_flashdata('success', 'Home Added Successfully!');
            }else{
                $this->session->set_flashdata('failed', 'Failed to  Add Home!');
            }
            redirect('admin/home');
        }
    }

    // Edit 
    function edit($id)
    {
        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('category_id', 'category ID', 'required');
            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $this->load->model('admin/category_model','category');
                $this->load->model('admin/home_model','home');
                
                $editData = $this->home->find($id);
                $data['edit_data'] = $editData;

                // code for get cayegory list 
                 $categoryList   = $this->category->all();
                if (!empty($categoryList)) {
                    $data['categoryList']  = $categoryList;
                }
                
                // code for get cayegory list
                $w['table'] = "sub_category"; 
                $w['category_id'] = $editData->category_id; 
                 $subCategoryList   = $this->category->findDynamic($w);
                if (!empty($subCategoryList)) {
                    $data['subCategoryList']  = $subCategoryList;
                }
                
                $this->load->view('admin/home/edit', $data);

            } else {
                //  code for insert data 
                $oldImagesArray = array();
                $newImagesArray = array();
                $images = array();
                $card_data = array();

                $id  = $_POST['id'];

                $w = array();
                $w['id'] = $id;
                $w['field'] = "images";
                $imagesData = $this->home->findDynamic($w);
                if (isset($imagesData[0]) && !empty($imagesData[0])) {
                    $oldImagesArray = json_decode($imagesData[0]->images);
                }

            //   pre($_POST);
            //   pre($oldImagesArray);
            //   exit();


                 // card data start
                 if(isset($_POST['title']) && count($_POST['title']) >0){
                    for ($i=0; $i < count($_POST['title']) ; $i++) { 
                    if($_POST['title'][$i] !="" && isset($_FILES['image']['name'][$i]) && $_FILES['image']['name'][$i] !==''){
                                $f_name         =$_FILES['image']['name'][$i];
                                $f_tmp          =$_FILES['image']['tmp_name'][$i];
                                $f_size         =$_FILES['image']['size'][$i];
                                $f_extension    =explode('.',$f_name);
                                $f_extension    =strtolower(end($f_extension));
                                $f_newfile      ='techcentrica_'.uniqid().'.'.$f_extension;
                                $store          ="uploads/home/".$f_newfile;
                                if(!move_uploaded_file($f_tmp,$store))
                                {
                                    $this->session->set_flashdata('failed', 'Image Upload Failed .');
                                    redirect('admin/home/edit/'.$id);
                                }else{
                                        $file =(isset($_POST['old_image'][$i]))?$_POST['old_image'][$i]:"";
                                        if(file_exists ( $file))
                                        {
                                            unlink($file);
                                        }
                                        $card_data[] = array("title"=>$_POST['title'][$i],"paragraph"=>$_POST['paragraph'][$i],"button_text"=>$_POST['button_text'][$i],"image"=>$store);
                                }
                            }else{
                                if(isset($_POST['title'][$i]) && $_POST['title'][$i] !=""){
                                    $card_data[] = array("title"=>$_POST['title'][$i],"paragraph"=>$_POST['paragraph'][$i],"button_text"=>$_POST['button_text'][$i],"image"=>$_POST['old_image'][$i]);
                                }
                            }
                    }
                    
                }
                // card data end
    
            
               
    
                  // upload og image start
                    if(isset($_FILES['images']['name'][0]) && $_FILES['images']['name'][0] !=""){
                        for ($i=0; $i < count($_FILES['images']['name']); $i++) { 
                                $f_name         =$_FILES['images']['name'][$i];
                                $f_tmp          =$_FILES['images']['tmp_name'][$i];
                                $f_size         =$_FILES['images']['size'][$i];
                                $f_extension    =explode('.',$f_name);
                                $f_extension    =strtolower(end($f_extension));
                                $f_newfile      ='techcentrica_'.uniqid().'.'.$f_extension;
                                $store          ="uploads/home/".$f_newfile;
                                if(!move_uploaded_file($f_tmp,$store))
                                {
                                    $this->session->set_flashdata('failed', 'Image Upload Failed .');
                                }
                          $newImagesArray[] = $store;
                       }
                    }
                  // upload og image end
                
                  $images = array_merge($newImagesArray,$oldImagesArray);
            //   ------------------------------------------------------------------------------------------

                // upload og image start
                if(isset($_FILES['og_image']['name']) && $_FILES['og_image']['name'] !=""){
                    $f_name         =$_FILES['og_image']['name'];
                    $f_tmp          =$_FILES['og_image']['tmp_name'];
                    $f_size         =$_FILES['og_image']['size'];
                    $f_extension    =explode('.',$f_name);
                    $f_extension    =strtolower(end($f_extension));
                    $f_newfile      ='techcentrica_'.uniqid().'.'.$f_extension;
                    $store          ="uploads/meta_image/".$f_newfile;
                    if(!move_uploaded_file($f_tmp,$store))
                    {
                        $this->session->set_flashdata('failed', 'Image Upload Failed .');
                    }else{
                        $file =(isset($_POST['old_og_image']))?$_POST['old_og_image']:"";
                        if(file_exists ( $file))
                        {
                            unlink($file);
                        }
                        $og_image = $store;
                    }
                }else{
                    $og_image = $_POST['old_og_image'];

                }
            // upload og image end
            
               // upload og image short description image start
              if(isset($_POST['contentdescription']) && count($_POST['contentdescription']) >0){
                for ($i=0; $i < count($_POST['contentdescription']) ; $i++) { 
                if($_POST['contentdescription'][$i] !="" && isset($_FILES['short_image']['name'][$i]) && $_FILES['short_image']['name'][$i] !==''){
                            $f_name         =$_FILES['short_image']['name'][$i];
                            $f_tmp          =$_FILES['short_image']['tmp_name'][$i];
                            $f_size         =$_FILES['short_image']['size'][$i];
                            $f_extension    =explode('.',$f_name);
                            $f_extension    =strtolower(end($f_extension));
                            $f_newfile      ='techcentrica_'.uniqid().'.'.$f_extension;
                            $store          ="uploads/home/".$f_newfile;
                            if(!move_uploaded_file($f_tmp,$store))
                            {
                                $this->session->set_flashdata('failed', 'Image Upload Failed .');
                                redirect('admin/home/edit/'.$id);
                            }else{
                                $file =(isset($_POST['old_image'][$i]))?$_POST['old_image'][$i]:"";
                                if(file_exists ( $file))
                                {
                                    unlink($file);
                                }
                             
                                $all_temp_data[] = array("contentdescription"=>$_POST['contentdescription'][$i],"short_image_alt"=>$_POST['short_image_alt'][$i],"short_image"=>$store);
                                
                            }
                        }else{
                            if(isset($_POST['contentdescription'][$i]) && $_POST['contentdescription'][$i] !=""){
                                $all_temp_data[] = array("contentdescription"=>$_POST['contentdescription'][$i],"short_image_alt"=>$_POST['short_image_alt'][$i],"short_image"=>$_POST['old_image'][$i]);
                            }
                        }
                }
                
            }
               // upload og image short description image end

                    $updateData  = array();
                    $updateData['id']        = $id;
                    $updateData['category_id']        = $_POST['category_id'];
                    // $updateData['sub_category_id'] = $_POST['sub_category_id'];
                    $updateData['marque_text']        = $_POST['marque_text'];
                    $updateData['get_tough']          = $_POST['get_tough'];
                    $updateData['heading1']           = $_POST['heading1'];
                    $updateData['para1']              = $_POST['para1'];
                    $updateData['heading2']           = $_POST['heading2'];
                    $updateData['heading3']           = $_POST['heading3'];
                    $updateData['para2']              = $_POST['paragraph2'];
                    $updateData['image_alt']          = $_POST['image_alt'];
                    $updateData['heading4']           = $_POST['heading4'];
                    $updateData['para3']              = $_POST['paragraph3'];
                    $updateData['card_data']          = json_encode($card_data);
                    $updateData['images']             = json_encode($images);
                    $updateData['meta_data']          = json_encode($_POST['meta']);
                    $updateData['og_image']           = (isset($og_image))?$og_image:"" ;
                    $updateData['status']             = $_POST['status'];
                    $updateData['slug']               = $_POST['slug'];
                    $updateData['updated_at']         = date("Y-m-d H:i:s");
                // pre($updateData);
                // exit();
                    $result  = $this->home->save($updateData);

                        if($result >0){
                            $this->session->set_flashdata('success', 'Home Updated Successfully!');

                        }else{
                            $this->session->set_flashdata('failed', ' Invalid Id !');
                            redirect('admin/home/edit/'.$id);
                        }
                        redirect('admin/home/edit/'.$id);
                        // redirect('admin/home');
            }
        }

    }

    //  code for ajax list 

    public function ajax_list()
    {
        $list = $this->home->get_datatables();

        $data = [];
        $no = isset($_POST['start']) ? $_POST['start'] : '';
        // save data for parent catelgory list

        // save data for parent catelgory list

        foreach ($list as $currentObj) {
            error_reporting(0);
            // pre($currentObj);
            // end code for iamge 
            $temp_date = $currentObj->created_at;
            $date_at = date("d-m-Y h:i A", strtotime($temp_date));
            $temp_updated_at = $currentObj->updated_at;
            $updated_at = date("d-m-Y h:i A", strtotime($temp_updated_at));
          
           
            if($currentObj->status==1){

                $status = '<span class="btn-success badge">Active</span>
                <p>
                    <a style="margin-top:10px;" class=" btn-danger badge" href="'.base_url().'admin/home/Unpublished/'.$currentObj->id.'">Click  InActive</a>
                </p>';
                
            }else{
                   $status = '<span class="btn-danger badge">InActive</span>
                   <p>
                    <a style="margin-top:10px;" class=" btn-success badge" href="'.base_url().'admin/home/published/'.$currentObj->id.'">Click  Active</a>
                </p>
                   ';

            }
           
            $no++;
            $row = [];
            $row[] = $no;
            $row[]=$currentObj->cat_name;
            $row[] = $status;
            $row[] = $date_at;
            $row[] = $updated_at;
            $row[] =
                '<a class="btn btn-sm btn-info" href="' .
                base_url() .
                'admin/home/edit/' .
                $currentObj->id .
                '" title="Edit" ><i class="fa fa-pen"></i></a> &nbsp;&nbsp; <a  title="Delete"   class="btn btn-sm btn-danger deletebtn" href="javascript:void(0)" title="delete"  data_id="' .
                $currentObj->id .
                '" ><i class="fa fa-trash"></i></a> ';

            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->home->count_all(),
            "recordsFiltered" => $this->home->count_filtered(),
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
                $this->load->model('admin/home_model','home');

                $editData = $this->home->getRow('home', $id);



                // end code for get state list 

                 // code for get cayegory list 
                $categoryId      =  $editData->category_id;

                 $categoryList   = $this->category->all();
                if (!empty($categoryList)) {
                    $data['categoriesList']  = $categoryList;
                }

                $subcategoryId      =  $editData->home_id;

                 $subcategoryList   = $this->home->all();
                 if (!empty($subcategoryList)) {
                    $data['subcategoriesList']  = $subcategoryList;
                }
               


                $data['edit_data'] = $editData;

                $this->load->view('admin/home/view', $data);
            } else {
                redirect('admin/home/view');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/home/view');
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
            $count = $this->home->getCount('home', 'home.id', $id);

            if (isset($count) and !empty($count)) {
                $this->home->delete('home', 'id', $id);

                $this->session->set_flashdata('message', ' home Deleted Successfully !');

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
                    $this->home->delete('home', 'id', $all_ids[$a]);

                    $this->session->set_flashdata('message', ' home(s) Deleted Successfully !');
                }
            }

            echo "success";

            exit();
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
        }
    }

    function export($filetype = 'csv')
    {


        $searchBy = '';

        $searchValue = '';

        $v_fields = ['name', 'status', 'created_at', 'update_at'];

        $data['sortBy'] = '';

        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

        $order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';

        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

        $searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

        $searchValue = addslashes($searchValue);

        $pagi = ['order' => $order, 'order_by' => $order_by];

        $result = $this->home->getList("home");

        if ($filetype == 'csv') {
            header('Content-Type: application/csv');

            header('Content-Disposition: attachment; filename=home.csv');

            header('Pragma: no-cache');

            $csv = 'Sr. No,' . implode(',', $v_fields) . "\n";

            foreach ($result as $key => $value) {
                $line = $key + 1 . ',';

                foreach ($v_fields as $field) {
                    $line .= '"' . addslashes($value->$field) . '"' . ',';
                }

                $csv .= ltrim($line, ',') . "\n";
            }

            echo $csv;
            exit();
        } elseif ($filetype == 'pdf') {
            error_reporting(0);

            ob_start();

            $this->load->library('m_pdf');

            $table = '

			<html>

			<head><title></title>

			<style>

			table{

				border:1px solid;

			}

			tr:nth-child(even)

			{

			    background-color: rgba(158, 158, 158, 0.82);

			}

			</style>

			</head>

			<body>

			<h1 align="center">category</h1>

			<table><tr>';

            $table .= '<th>Sr. No</th>';

            foreach ($v_fields as $value) {
                $table .= '<th>' . $value . '</th>';
            }

            $table .= '</tr>';

            foreach ($result as $key => $value) {
                $table .= '<tr><td>' . ($key + 1) . '</td>';

                foreach ($v_fields as $field) {
                    $table .= '<td>' . $value->$field . '</td>';
                }

                $table .= '</tr>';
            }

            $table .= '</table></body></html>';

            ob_clean();

            $pdf = $this->m_pdf->load();

            $pdf->WriteHTML($table);

            $pdf->Output('category.pdf', "D");

            exit();
        } else {
            echo 'Invalid option';
            exit();
        }
    }

    function status($field, $id)
    {


        if (in_array($field, ['status'])) {
            if (isset($id) && !empty($id)) {
                if (!is_null($home = $this->home->getRow('home', $id))) {
                    $status = $home->$field;

                    if ($status == 1) {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $statusData[$field] = $status;

                    $this->home->updateData('home', $statusData, $id);

                    $this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');

                    if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
                        redirect($_GET['redirect']);
                    } else {
                        redirect('admin/home');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid Record Id!');

                    redirect('admin/home');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Record Id!');

                redirect('admin/home');
            }
        }
    }
}


