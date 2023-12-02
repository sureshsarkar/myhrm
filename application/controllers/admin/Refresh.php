<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';



/**
 * Class : User (UserController)
 * User Class to control all user related operations.

 * @since : 15 November 2016
 */
class Refresh extends BaseController
{
    
    /**
     * This is default constructor of the class
     */
    
    public function __construct()
    {
       parent::__construct();

        $this->load->model('Base_model');
        $this->load->model('admin/enquery_model', 'enquery');
        $this->load->model('admin/category_model', 'category');
       $this->isLoggedIn();
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {   
       echo "Something went wrong!!";
        
    }

     public function dashboard_data()
    {   
        // new chat
        $sql = "SELECT id FROM enquery WHERE seen = '0' ";
        $newEnquery = $this->enquery->rawQuery($sql);


        // return =========================================
        $data = array(
            'newEnquery' => count($newEnquery)
        );

        echo json_encode($data);
        
    }

    //  public function todayCalling()
    // { 
    //      $curentDateTime=date("Y-m-d H:i:s");  
    //       $addOneDay= date('Y-m-d 23:59:59');
    //      $sql = "SELECT id FROM `calling_data` WHERE `folloupdate` BETWEEN '$curentDateTime' AND '$addOneDay'";
    //      $todayCalling = $this->enquery->rawQuery($sql);
    //     // return =========================================
    //     $data = array(
    //         'todayCalling' => count($todayCalling),
    //     );

    //     echo json_encode($data);
        
    // }
    
   

    
    
}

?>