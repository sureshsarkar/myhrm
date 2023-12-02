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
        $this->load->library('form_validation');
        $this->load->model('admin/events_model', 'events');
        $this->load->model('admin/category_model', 'category');
        $this->isEmployeeLoggedIn();
    }

    function index()
    {
        $data = array();
        $w = array();
        $w['status'] = 1;
        $data["eventData"] = $this->events->findDynamic($w);
        $this->global['title'] = "Events";
      
        $deviceType = getDevice();
        if(isset($deviceType) && $deviceType == "mobile"){
            $this->loadEmployeeViews("employee/events/mobileview", $this->global, $data , NULL,'employee');
        }else{
            $this->loadEmployeeViews("employee/events/view", $this->global, $data , NULL,'employee');
        }
    }

    public function addComment(){
       
        if(isset($_POST['event_id'])){
            $w = array();
            $w['id'] = $_POST['event_id'];
            $w['field'] = "id,commentData";
            $eventData = $this->events->findDynamic($w);
            $eventData = $eventData[0];
    
            if(isset($eventData->commentData) && !empty($eventData->commentData)){
                $comment = json_decode($eventData->commentData,true);
                $comment[] = array("comment"=>$_POST['mycomment'],"employeeId"=>$_SESSION['employeeId'],"dt"=>date('Y-m-d H:i:s'),"event_id"=>$_POST['event_id']);
            }else{
            $comment[] = array("comment"=>$_POST['mycomment'],"employeeId"=>$_SESSION['employeeId'],"dt"=>date('Y-m-d H:i:s'),"event_id"=>$_POST['event_id']);
            }

            $updateData = array();
            $updateData['id'] = $_POST['event_id'];
            $updateData['commentData'] = json_encode($comment);
            $this->events->save($updateData);
            echo 1;
            exit;
        }
    }

    public function addLike(){
       $empId = $_SESSION['employeeId'];
        if(isset($_POST['id'])){
            // pre($updateData);
            // exit;
            $w = array();
            $oldLikeEmpId = array();
            $w['id'] = $_POST['id'];
            $w['field'] = "id,like_emp_id,like_count";
            $eventData = $this->events->findDynamic($w);
            $eventData = $eventData[0];
            $likeCount = $eventData->like_count;
            if(isset($eventData->like_emp_id) && !empty($eventData->like_emp_id)){
                $oldLikeEmpId = json_decode($eventData->like_emp_id,true);

                if (in_array($empId, $oldLikeEmpId)){
                // Find the index of "banana" in the array
                 $index = array_search($empId, $oldLikeEmpId);

                // Remove the element at that index
                    if ($index !== false) {
                        unset($oldLikeEmpId[$index]);
                        $likeCount = $likeCount -1;
                    }
                }else{
                 $oldLikeEmpId[] = $empId;
                 $likeCount = $likeCount + 1;
                }
             
            }else{
                $oldLikeEmpId[] = $empId;
                $likeCount = $likeCount + 1;
            }

            $updateData = array();
            $updateData['id'] = $_POST['id'];
            $updateData['like_emp_id'] = json_encode($oldLikeEmpId);
            $updateData['like_count'] =$likeCount;
            $this->events->save($updateData);
            echo 1;
            exit;
        }
    }
}