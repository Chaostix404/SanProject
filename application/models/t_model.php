<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class t_model extends CI_Model{
  function ambil_user(){
    return $this->db->get('login');
  }

}
