<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_db extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function cek_login($table,$where)
  {
      return $this->db->get_where($table,$where);
  }
  function isEmpty($id)
  {
    $this->db->where('queue',$id);
    $query = $this->db->get('key_queue');
    if ($query->num_rows() > 0){
        return false;
    }
    else{
        return true;
    }
  }
}
