<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Performance extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        // $this->load->library('ion_auth');

        $this->load->library('form_validation');

        $this->load->model('admin/performance_model', 'performance');
        $this->load->model('admin/category_model', 'category');
        // $this->load->model('admin/banner_model');

        $this->isLoggedIn();
    }

    function index()
    {

        $currentMonth = date("Y-F");
        $lastMonth =  date('Y-F',strtotime($currentMonth . ' -1 month'));
        $last12Month =  date('Y-F',strtotime($currentMonth . ' -11 month'));

        // this month performance 
        $w = array();
        $w['month'] = $currentMonth;
        $thisMonthPerformance = $this->performance->findDynamic($w);
        $data['thisMonthPerformance'] = count($thisMonthPerformance);
        
        // last month performance 
        $w = array();
        $w['month'] = $lastMonth;
        $lastMonthPerformance = $this->performance->findDynamic($w);
        $data['lastMonthPerformance'] = count($lastMonthPerformance);
        
        // last 12 month performance 
        $this->db->from('performance');
        $this->db->select('id');
        $this->db->where('month >=', date("Y-F", strtotime($last12Month)));
        $this->db->where('month <=', date("Y-F"));
        $query = $this->db->get();
        $last12MonthPerformance = $query->result();
        $data['last12MonthPerformance'] = count($last12MonthPerformance);

        // total performance 
        $data['totalEmployeePerformance'] = $this->performance->countRow();

        $data['title'] = "Performance";
        $this->load->view('admin/performance/manage', $data);
    }

    // end code for get list // like country , state , city 

    //  code for publish user 
    public function published($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 1;
        $result = $this->performance->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'performance  Published  Sucessfully');
            redirect('admin/performance/');
        } else {
            $this->session->set_flashdata('error', ' performance Published  Failed');
            redirect('admin/performance/');
        }
    }
    //  end code for publish user
    //  code for Unpublish user 
    public function Unpublished($id)
    {
        $updateData = array();
        $updateData['id'] = $id;
        $updateData['status'] = 0;
        $result = $this->performance->save($updateData);
        if ($result) {
            $this->session->set_flashdata('success', 'performance UnPublished  Sucessfully');
            redirect('admin/performance/');
        } else {
            $this->session->set_flashdata('error', 'performance UnPublished   Failed');
            redirect('admin/performance/');
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
            $data['title'] = "add_performance";
            $this->load->view('admin/performance/add', $data);
        } else {
          

            // upload profile image start
            if (isset($_FILES['profile_image']['name']) && $_FILES['profile_image']['name'] != "") {
                $profile_image = $this->uploadSingleImg($_FILES['profile_image'], 'profile', NULL);
            }

            $insertData = array();
            $insertData['fname'] = $_POST['firstName'];
            $insertData['lname'] = $_POST['lastName'];
            $insertData['email'] = $_POST['pemail'];
            $insertData['status'] = 0;
            $insertData['created_at'] = date("Y-m-d H:i:s");

            $result = $this->performance->save($insertData);
          
            $updateData['id'] = $result;
            $updateData['emp_code'] = "HPR-" . $result;
            $result = $this->performance->save($updateData);

            // pre($result);
            // exit;

            if ($result > 0) {
                $this->session->set_flashdata('success', 'Account Created Successfully!');
            } else {
                $this->session->set_flashdata('failed', 'Failed to  Created Account !');
            }
            redirect('admin/performance');
        }
    }
    // code for Add end

    // Edit
    function edit($id)
    {

        if (isset($id) and !empty($id)) {
            $data = null;

            $this->form_validation->set_rules('rating', 'Rating ', 'required');
            // $this->form_validation->set_rules('password', 'Password ', 'required');
            $data['errors'] = [];

            if ($this->form_validation->run() == false) {

                $this->load->model('admin/category_model', 'category');
                $this->load->model('admin/performance_model', 'performance');

                $editData = $this->performance->find($id);
                $data['edit_data'] = $editData;


                $data['title'] = "edit_performance";
                $this->load->view('admin/performance/edit', $data);

            } else {
                //  code for insert data 

                $id = $_POST['id'];

                $updateData = array();
                $updateData['id'] = $id;
                $updateData['note'] = $_POST['note'];
                $updateData['rating'] = $_POST['rating'];
                $updateData['updated_at'] = date("Y-m-d H:i:s");

                $result = $this->performance->save($updateData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Performance Update Successfully!');
                } else {
                    $this->session->set_flashdata('failed', 'Failed to Add Performance !');
                }
                redirect('admin/performance');
            }
        }

    }


    //  code for ajax list 
    public function ajax_list()
    {
        $list = $this->performance->get_datatables();

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

            if (isset($currentObj->profile_image) && !empty($currentObj->profile_image)) {
                $profile_image = '<img src="' . base_url() . $currentObj->profile_image . '" alt="" style="width:30px;height:30px;border-radius:50%;">';
            } else {
                $profile_image = '<img src="' . base_url() . 'assets/images/user.png" alt="" style="width:30px;height:30px;border-radius:50%;">';
            }

            if (isset($currentObj->document) && !empty($currentObj->document)) {
                $document = '<img src="' . base_url().'assets/images/file.png" alt="" style="width:30px;height:30px;border-radius:50%;">';
            } else {
                $document = '<img src="' . base_url() . 'assets/images/file.png" alt="" style="width:30px;height:30px;border-radius:50%;">';
            }

            $deteteBtn = (isset($_SESSION['role_type']) && $_SESSION['role_type'] == 1) ? '<a  title="Delete" class="deletebtn btn p-1" href="javascript:void(0)" data_id="' . $currentObj->id . '" ><i class="bi bi-trash"></i></button></a>' : '';

            $action = '<div class="d-flex flex-row bd-highlight mb-3"> 
                            <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/performance/edit/' . $currentObj->id . '" title="Edit performance" ><i class="bi bi-pencil-square"></i></i></a></button>&nbsp;
                            <button class="btn p-1"><a class="text-light" href="' . base_url() . 'admin/performance/view/' . $currentObj->id . '" title="View performance" ><i class="bi bi bi-eye-fill"></i></i></a></button>&nbsp;' . $deteteBtn . '
                       </div>';
            $no++;
            $row = [];
            $row[] = '<a href="' . base_url() . 'employee/performance/view/' . $currentObj->id . '" title="View performance" class="d-flex" >' . $document .'</a>';
            $row[] = $currentObj->fname.' '.$currentObj->lname;
            $row[] = $currentObj->emp_code;
            $row[] = $this->config->item('department')[$currentObj->department];
            $row[] = $currentObj->month;
            $row[] = (!empty($currentObj->rating))?'<span class="badge bg-inverse-success">10/'.$currentObj->rating.'</span>':'<span class="badge bg-inverse-success">N/A</span>';
            $row[] = $date_at;
            $row[] = $action;
            $data[] = $row;
        }
        $output = [
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : '',
            "recordsTotal" => $this->performance->count_all(),
            "recordsFiltered" => $this->performance->count_filtered(),
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
            $data["view_data"] = $this->performance->find($id);

            $data['title'] = "View performance";
            $this->load->view('admin/performance/view', $data);
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
            $count = $this->performance->getCount('performance', 'performance.id', $id);

            if (isset($count) and !empty($count)) {
                $this->performance->delete('performance', 'id', $id);

                $this->session->set_flashdata('message', ' performance Deleted Successfully !');

                echo "success";

                exit();
            } else {
                $this->session->set_flashdata('message', ' Invalid Id !');
            }
        } else {
            $this->session->set_flashdata('message', ' Invalid Id !');
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