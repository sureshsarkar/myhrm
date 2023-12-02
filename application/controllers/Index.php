<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Index extends BaseController
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
        // $this->load->model('admin/banner_model');
     }

    // Index =====================================================================
    public function index()
    {
        $data['title'] = "Login";
        $this->load->view('admin/login', $data);
    } 
     

}

?>