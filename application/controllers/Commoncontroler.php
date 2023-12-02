<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Commoncontroler extends BaseController
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
        $this->load->model('admin/banner_model');
        
     }

    // Index =====================================================================
    public function index($slug)
    {
       
        $getMenu['table']  = 'category';
        $getMenu['id']     = '-id'; // Desc when - add
        $getMenu['limit']     = '20'; // Desc when - add
        $data['categoryMenu']      = $this->getCategory($getMenu); 
        // pre($slug);
        // exit;

        // Get sub category using slug
        $w = array();
        $w['status'] = 1;
        $w['slug'] =$slug;
        
        // ----------------------------------------------------------------------------------------------
        if($slug == "superheroes.html" || $slug == "about-us.html" || $slug =="strength.html" || $slug =="brand.html" || $slug =="business-growth.html"){
            $w['table'] = "company";
            $pageData = $this->category_model->findDynamic($w);
            // pre($pageData);
            // exit;
            if(count($pageData) > 0){
                $data['pageData'] = $pageData[0];
                $metaData = json_decode($pageData[0]->meta_data);
                
                // Define ===========================  
                $data['pageName'] = $slug;
                $data['page'] = 'Company';
                if($slug =="superheroes.html"){
                    $data["file"]="front/superheros";
                }else{
                    $data["file"]="front/company";
                }
                
            }
        }elseif ($slug == "Web-Solutions.html" || $slug == "Corporate-Website.html" || $slug =="Dynamic-Website.html" || $slug =="Web-Solutions.html" || $slug =="Website-Revamping.html" || $slug =="Interactive-Website.html" || $slug=="Website-Maintenance.html"){
            $w['table'] = "design_dev";
            $pageData = $this->category_model->findDynamic($w);
           
            if(count($pageData) > 0){
                $data['pageData'] = $pageData[0];
                $metaData = json_decode($pageData[0]->meta_data);

                // get this category
                    $w = array();
                    // $w['status'] = 1;
                    $w['id'] =$pageData[0]->category_id;
                    $w['field'] = "id,cat_name";
                    $categoryData = $this->category_model->findDynamic($w);
                    $data['categoryData'] = $categoryData[0];
                
                // Define ===========================  
                $data['pageName'] = $slug;
                $data['page'] = 'Design And Development';
                if($slug =="Dynamic-Website.html"){
                    $data["file"]="front/dynamic_website";
                }else{
                    $data["file"]="front/design_development";
                }
                
            }
        }elseif ($slug == "Software-Development.html" || $slug == "Portal-Development.html" || $slug =="E-Commerce.html" || $slug =="Customized-Application-Development.html"){
            $w['table'] = "our_solutions";
            $pageData = $this->category_model->findDynamic($w);
        //    pre($pageData);
        //    exit();
            if(count($pageData) > 0){
                $data['pageData'] = $pageData[0];
                $metaData = json_decode($pageData[0]->meta_data);

                // get this category
                    $w = array();
                    $w['status'] = 1;
                    $w['id'] =$pageData[0]->category_id;
                    $w['field'] = "id,cat_name";
                    $categoryData = $this->category_model->findDynamic($w);
                    $data['categoryData'] = $categoryData[0];
                
                // Define ===========================  
                $data['pageName'] = $slug;
                $data['page'] = 'Our Solutions';
                if($slug =="dynamic-website"){
                    $data["file"]="front/dynamic_website";
                }else{
                    $data["file"]="front/our_solutions";
                }
                
            }
        }elseif ($slug == "Digital-Marketing.html" || $slug == "Content-Creation.html" || $slug =="SMO.html" || $slug =="Mobile-Marketing.html" || $slug == "SEO.html" || $slug == "ORM.html"){
            $w['table'] = "digi_solution";
            $pageData = $this->category_model->findDynamic($w);
        //    pre($pageData);
        //    exit();
            if(count($pageData) > 0){
                $data['pageData'] = $pageData[0];
                $metaData = json_decode($pageData[0]->meta_data);

                // get this category
                    $w = array();
                    $w['status'] = 1;
                    $w['id'] =$pageData[0]->category_id;
                    $w['field'] = "id,cat_name";
                    $categoryData = $this->category_model->findDynamic($w);
                    $data['categoryData'] = $categoryData[0];
                
                // Define ===========================  
                $data['pageName'] = $slug;
                $data['page'] = 'Digital Solutions';
                if($slug =="dynamic-website"){
                    $data["file"]="front/dynamic_website";
                }else{
                    $data["file"]="front/digital_solutions";
                }
                
            }
        }elseif ($slug == "Digital-Marketing.html" || $slug == "Content-Creation.html" || $slug =="SMO.html" || $slug =="Mobile-Marketing.html" || $slug == "SEO.html" || $slug == "ORM.html"){
            $w['table'] = "digi_solution";
            $pageData = $this->category_model->findDynamic($w);
        //    pre($pageData);
        //    exit();
            if(count($pageData) > 0){
                $data['pageData'] = $pageData[0];
                $metaData = json_decode($pageData[0]->meta_data);

                // get this category
                    $w = array();
                    $w['status'] = 1;
                    $w['id'] =$pageData[0]->category_id;
                    $w['field'] = "id,cat_name";
                    $categoryData = $this->category_model->findDynamic($w);
                    $data['categoryData'] = $categoryData[0];
                
                // Define ===========================  
                $data['pageName'] = $slug;
                $data['page'] = 'Digital Solutions';
                if($slug =="dynamic-website"){
                    $data["file"]="front/dynamic_website";
                }else{
                    $data["file"]="front/digital_solutions";
                }
                
            }
        }elseif ($slug == "Clientele.html" || $slug == "Showcase.html"){
            $w['table'] = "experience";
            $pageData = $this->category_model->findDynamic($w);
        //    pre($pageData);
        //    exit();
            if(count($pageData) > 0){
                $data['pageData'] = $pageData[0];
                $metaData = json_decode($pageData[0]->meta_data);

                // get this category
                    $w = array();
                    $w['status'] = 1;
                    $w['id'] =$pageData[0]->category_id;
                    $w['field'] = "id,cat_name";
                    $categoryData = $this->category_model->findDynamic($w);
                    $data['categoryData'] = $categoryData[0];
                
                // Define ===========================  
                $data['pageName'] = $slug;
                $data['page'] = 'EXPERIENCE';
                if($slug =="Showcase.html"){
                    $data["file"]="front/showcase";
                }else{
                    $data["file"]="front/experience";
                }
                
            }
        }elseif ($slug == "contact-us.html" || $slug == "Join-us.html"){
            $w['table'] = "contact_us";
            $pageData = $this->category_model->findDynamic($w);
        //    pre($pageData);
        //    exit();
            if(count($pageData) > 0){
                $data['pageData'] = $pageData[0];
                $metaData = json_decode($pageData[0]->meta_data);

                // get this category
                    $w = array();
                    $w['status'] = 1;
                    $w['id'] =$pageData[0]->category_id;
                    $w['field'] = "id,cat_name";
                    $categoryData = $this->category_model->findDynamic($w);
                    $data['categoryData'] = $categoryData[0];
                
                // Define ===========================  
                $data['pageName'] = $slug;
                $data['page'] = 'Contact Us';
                if($slug =="Join-us.html"){
                    $data["file"]="front/join_us";
                }else{
                    $data["file"]="front/contact_location";
                }
                
            }
        }
        else{
            redirect("errorpage/page");
            exit();
        }
        // ----------------------------------------------------------------------------------------------
       
        // get this sub categorys
        if(count($pageData) > 0){
        $w = array();
        $w['status'] = 1;
        $w['table'] = "sub_category";
        $w['id'] =$pageData[0]->sub_category_id;
        $w['field'] = "id,sub_category_name";
        $subCategoryData = $this->category_model->findDynamic($w);
        $data['subCategoryData'] = $subCategoryData[0];
        }
        
//  pre($data['pageData']);
//         exit;

        // get all this category's sub categorys
        if(count($pageData) > 0){
            $w = array();
            $w['status'] = 1;
            $w['table'] = "sub_category";
            $w['category_id'] =$pageData[0]->category_id;
            $w['field'] = "id,category_id,sub_category_name,slug";
            $subCategoryList = $this->category_model->findDynamic($w);
            $data['subCategoryList'] = $subCategoryList;
         }
//  pre($subCategoryList);
//         exit;
         // get topfooter data
        $w = array();
        $w['table'] = 'topfooter';
        $topFooter = $this->category_model->findDynamic($w);
        $data['topFooter'] = $topFooter[0];
        
        // Get Banners data
       if(count($pageData) > 0){
           $w = array();
           $w['status'] = 1;
           $w['table'] = "banner";
           $w['sub_category_id'] =$pageData[0]->sub_category_id;
           $w['field'] = "image_alt,image,slug";
           $banners = $this->category_model->findDynamic($w);
           if(isset($banners[0])){
               $data['banners'] = $banners[0];
           }
        }       
    // pre($data['banners']->image);
    // exit;
    //SEO DATA FOR HEADER START===================================================
        $data["title"]=(isset($metaData->meta_title))?$metaData->meta_title:"";
        $data["keywords"]=(isset($metaData->meta_keyword))?$metaData->meta_keyword:"";
        $data["description"]=(isset($metaData->meta_description))?$metaData->meta_description:"";
        $data["og_url"]=(isset($metaData->og_url))?$metaData->og_url:"";
        $data["og_image"]=(isset($metaData->og_image) && !empty($metaData->og_image))?base_url().$metaData->og_image:base_url('assets/images/logo.png');
        $data["og_title"]=(isset($metaData->og_title))?$metaData->og_title:"";
        $data["og_description"]=(isset($metaData->og_description))?$metaData->og_description:"";
        $data["og_site_name"]=(isset($metaData->og_site_name))?$metaData->og_site_name:"";
        $data["canonical"]=(isset($metaData->canonical))?$metaData->canonical:"";
        // $data['pageName'] = $slug;
        // $data['page'] = 'Company';
        //SEO DATA FOR HEADER END======================================================



        $this->load->view('front/includes/template',$data);
    } 
     

}

?>