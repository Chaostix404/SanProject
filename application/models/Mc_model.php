<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mc_model extends CI_Model{
  function login($user, $pass){
    $data = array(
      'name' => $user,
      'hash' => $pass
    );
    $cek = $this->db->get_where('simpleauth_players', $data)->num_rows();
    if($cek > 0){
      return 1;
    }else{
      return 0;
    }
  }
  function user($user){
    return $this->db->get_where('simpleauth_players', array('name' => $user));
  }
  function regplayer($user, $pass, $mail){
    $data = array(
      'name' => $user,
    );
    $cek = $this->db->get_where('simpleauth_players', $data)->num_rows();
    if($cek > 0){
      $cek = "1";
    }else{
      $cek = "0";
    }
    if($cek=="0")
    {
      $datae = array(
        'name' => $user,
        'hash' => $pass,
        'email' => $mail,
        'status' => 'beta'
       );
       $dataq = array(
         'userName' => $user,
         'userGroup' => 'BetaTester'
       );
       $datao = array(
         'username' => $user,
         'money' => '45000'
        );
      $this->db->insert('user_money', $datao);
      $this->db->insert('simpleauth_players', $datae);
      $this->db->insert('players', $dataq);
      return 1;
    } else {
      return 2;
    }
  }
  function userg($user){
    return $this->db->get_where('players', array('userName' => $user));
  }
  function cpw($user, $pass){
    return $this->db->where(array('name' => $user))->update('simpleauth_players', array('name' => $user, 'hash' => $pass));
  }
}
