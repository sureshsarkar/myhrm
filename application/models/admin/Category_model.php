<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Category_model extends Base_model
{
  public $table = "category";

  var $column_order = array(null,'cat_name','status','created_at'); //set column field database for datatable orderable

  var $column_search = array('cat_name','status','created_at');//set column field database for datatable searchable 

  var $order = array('id' => 'desc'); // default order

  function __construct()

  {

    parent::__construct();

  }

  // function for get list 

  // Get  List

  function get_datatables($where = NULL)

  {

      if(empty($where))

      {

      $where=NULL;

      }

      $this->_get_datatables_query($where);

      if(isset($_POST['length']) && $_POST['length'] != -1)

      $this->db->limit($_POST['length'], $_POST['start']);

      $query = $this->db->get();

  // $str = $this->db->last_query();

      return $query->result();

  }

  // Get Database 

  public function _get_datatables_query($where = NULL)

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

      return $query->num_rows();

  }

  // Count all

  public function count_all()

  {

      $this->db->from($this->table);

      return $this->db->count_all_results();

  }



  // end function for get list 

  function getList($table, $pagination=array()) {

        //  PAGINATION START

        if((isset($pagination['cur_page'])) and !empty($pagination['per_page']))

        {

          $this->db->limit($pagination['per_page'],$pagination['cur_page']);

        }

          $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields)?$_GET['sortBy']:'';

          $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';

          if($order_by!=''){

            $this->db->order_by($order_by, $order);

          }
        if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" && in_array($_GET['searchBy'],$this->v_fields) ) {
            $this->db->like($_GET['searchBy'],$_GET['searchValue']);

        }

        $this->db->select("$table.* ");

        $this->db->from($table);

        $this->db->order_by("id","desc");

        $query = $this->db->get();

        return $result = $query->result();

    }

    function getListTable($table) {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();

    }

    function getRow($table, $id) {

        $this->db->select('*');

        $query = $this->db->get_where($table, array('id' => $id));

        $data = $query->result();

        return $data[0];

    }

    function getSelectedData($table, $field, $idArr) {

        $this->db->select('*');

        $this->db->from($table);

        $this->db->where_in('id', $idArr);

        $query = $this->db->get();

        $data = $query->result();

        foreach ($data as $key => $value) {

            $arr[] = $value->$field;

        }

        return $arr;

    }

    function getCount($table, $key='', $value='') {

            $this->db->select("$table.*");
            if(isset($key) && isset($value) && !empty($key) && !empty($value))

            {

                $this->db->where($key,$value);

            }

            $this->db->from($table);

            $query = $this->db->get();

            return $query->num_rows();

    }

    function insert($table, $data){

        $this->db->insert($table, $data);

        return $this->db->insert_id();

    }

    function multiSelectInsert($r_table, $field1, $value1, $field2, $value2=array())

    {
      $this->db->query("delete from $r_table where $field1='$value1'");

      if ($r_table!="" && $field1!="" && $value1!="" && $field2!="" && count($value2)>0) {

        for ($i=0; $i < count($value2); $i++) {

          $data[] = array(

            $field1 => $value1,

            $field2 => $value2[$i],

          );

        }

        $this->db->insert_batch($r_table, $data);        

      }

    }

    function getSelectedIds($table, $id, $select_field, $where_field)

    {

        $arr=array();

        $this->db->select("$select_field");

        $this->db->from($table);

        $this->db->where("$where_field",$id);

        $query = $this->db->get();

        $data = $query->result();

        foreach ($data as $key => $value) {

            $arr[] = $value->$select_field;

        }

        return $arr;

    }


    function updateData($table, $data, $id)

    {

        $this->db->where("id",$id);

        $this->db->update($table,$data);

    }


    function delete($table, $key='', $value='')

    {

        if(isset($key) && isset($value) && !empty($key) && !empty($value))

        {

            $this->db->where($key,$value);

        }

        $this->db->delete($table);

    }

public function uploadData(&$data, $file_name, $file_path, $postfix='', $allowedTypes=null)

{

   $config = NULL;

   $config['upload_path'] = $this->config->item($file_path);  

   $config['allowed_types'] = $allowedTypes;

   if (isset($_FILES[$file_name]['name']) && !empty($_FILES[$file_name]['name']))

   {

    $this->load->library('upload', $config);

    $this->upload->initialize($config);

    $exts = explode(".",$_FILES[$file_name]['name']);

    $_FILES[$file_name]['name'] = $exts[0].$postfix.".".end($exts);

    if ( ! $this->upload->do_upload($file_name))

    {

     $data[$file_name.'_err'] = array('error' => $this->upload->display_errors());

    }

    else

    {

     $uploadImg = $this->upload->data();

     if($uploadImg['file_name'] != '')

    {

     if (isset($_POST['old_'.$file_name]) && !empty($_POST['old_'.$file_name]))

     {

      @unlink($this->config->item($file_path).$_POST['old_'.$file_name]);

     }

     $data[$file_name] = $uploadImg['file_name'];

    }

   } 

  }

  elseif (isset($_POST['old_'.$file_name]) && !empty($_POST['old_'.$file_name]))

  {

   $data[$file_name] = $_POST['old_'.$file_name];

  }   

}
}







