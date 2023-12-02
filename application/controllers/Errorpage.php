<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Errorpage extends BaseController
{
    
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('base_library');
        // Cookie helper
        $this->load->helper('cookie');
        $this->load->model('admin/category_model');
     }

    // Index =====================================================================
    public function page()
    {
       
        $getMenu['table']  = 'category';
        $getMenu['id']     = '-id'; // Desc when - add
        $getMenu['limit']     = '20'; // Desc when - add
        $data['categoryMenu']      = $this->getCategory($getMenu); 

        $data["file"]="front/errorpage";
        $this->load->view('front/includes/template',$data);
    } 
     

}

?>