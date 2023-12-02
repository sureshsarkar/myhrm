<?php if(!defined('BASEPATH')) exit('No direct script access allowed');







class User_model extends Base_model

{

    public $table = "z_users";

    var $column_order = array(null,'id', 'first_name','uniqe_id','phone','email','user_type','status','date_at'); //set column field database for datatable orderable

    var $column_search = array('id','first_name','uniqe_id','phone','email','user_type','status','date_at'); //set column field database for datatable searchable 

    var $order = array('id' => 'asc'); // default order





        



        function __construct() {



            parent::__construct();



        }







    

    public function getparent_id()
    {   
        $query  = $this->db->query("SELECT id, name FROM  category");
        if($query->num_rows() > 0)
        {
            $category_array = array();
            foreach($query->result() as $row)
            {
               $category_array[] = $row;
            }
            return $category_array;
        }
    }
    public function loginMe($email,$feildName,$password)
    {

        

        $this->db->from($this->table);

        $password1 = md5($password);

        $this->db->where($feildName,$email);

        $this->db->where('password',$password1);

        $this->db->where('status',1);

        $this->db->order_by('id','desc');

        $query = $this->db->get();

        $user = $query->result();

        //$this->db->last_query(); 

        if(!empty($user)){

            return $user;

        }   

          else {

            return array();

        }

    }

    

    public function find($id) {



            $query = $this->db->select('*')



                    ->from($this->table)



                    ->where('id', $id)



                    ->get();

            if ($query->num_rows() > 0) {

                $result = $query->result();

                return $result[0];

            } else {

                return array();

            }



        }



       // Get  List

        function get_datatables()

        {

           $this->_get_datatables_query();

            if(isset($_POST['length']) && $_POST['length'] != -1)

            $this->db->limit($_POST['length'], $_POST['start']);

            $query = $this->db->get();

            //$str = $this->db->last_query();

            return $query->result();

        }

        // Get Database 

         public function _get_datatables_query()

        {     

            $this->db->from($this->table);

            $i = 0;     

            foreach ($this->column_search as $item) // loop column 

            {

                if(isset($_POST['search']['value']) && $_POST['search']['value']) // if datatable send POST for search

                {

                    if($i===0) // first loop

                    {

                        $this->db->like($item, $_POST['search']['value']);

                    }

                    else

                    {

                        $this->db->or_like($item, $_POST['search']['value']);

                    }

                }

                $i++;

            }

            if(isset($_GET['sort'])){
                $whereUser ='';
                if(isset($_GET['sort']) && $_GET['sort'] == '1' ){
                    $this->db->where('user_type',$_GET['sort']);
                }else if(isset($_GET['sort']) && $_GET['sort'] == '2' ){
                    $this->db->where('user_type',$_GET['sort']);
                }else if(isset($_GET['sort']) && $_GET['sort'] == '3' ){
                $this->db->where('user_type',$_GET['sort']);
                }else if(isset($_GET['sort']) && $_GET['sort'] == '4' ){
                    $this->db->where('status',2);
                }else if(isset($_GET['sort']) && $_GET['sort'] == '5' ){
                    $this->db->where('status',1);
                }else if(isset($_GET['sort']) && $_GET['sort'] == '6' ){  
                    $this->db->where('status',0);
                }else{

                }



               // $sql = "SELECT * FROM user   WHERE ".$whereUser."   GROUP BY  ORDER BY id  DESC LIMIT 500 ";
               
            }

            if(isset($_POST['order'])) // here order processing

            {
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } 
            else if(isset($this->order))
            {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }


        // Count  Filtered
        function count_filtered()
        {
            $this->_get_datatables_query();
            $query = $this->db->get();
            $this->getAction();
            return $query->num_rows();
    
        }

        // Count all
        public function count_all()
        {
            $this->jointTables();// call join function
            //   $this->db->from($this->table);
            $this->getAction();
            return $this->db->count_all_results();
    
        }



}











  