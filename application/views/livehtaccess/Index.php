<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



//require APPPATH . '/libraries/BaseController.php';

class Index extends CI_Controller

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

     }







    /**

     * Index Page for this controller.

     */

    // Index =============================================================

    public function index()

    {



      

      

        // Define =========================== 

       

       $data["title"]="LUCKY VEG BASKET";

       $data["file"]="front/index";

       $this->load->view('front/template',$data);

    } 





}



?>