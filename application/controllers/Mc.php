<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mc extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('mc_model'));
  }
  function index()
  {
    if(empty($_SESSION['login']))
    {
      $this->load->view('loginpage');
    }else{
      $data['user'] = $this->mc_model->user($_SESSION['login'])->result();
      $data['userg'] = $this->mc_model->userg($_SESSION['login'])->result();
      $this->load->view('dash', $data);
    }
  }
  function login()
  {
    if(isset($_POST['user']) and isset($_POST['pass'])){
      $cek = $this->mc_model->login($_POST['user'], $_POST['pass']);
      if($cek=="1"){
        $au = $this->mc_model->userg($_POST['user'])->result();
        foreach($au as $u) {
          $s = $u->userGroup;
        }
        $array = array(
          'login' => $_POST['user'],
          'group' => $s
        );
        $this->session->set_userdata($array);
        redirect(base_url('mc/index?success=1'));
      }else{
        redirect(base_url('mc/index?salah'));
      }
    }else{
      redirect(base_url('mc/index'));
    }
  }
  function logout()
  {
    $this->session->unset_userdata('login');
    $this->session->unset_userdata('group');
    redirect(base_url('mc/index'));
  }
  function register()
  {
    if(isset($_SESSION['login'])){
      redirect(base_url('mc/index'));
    }
    $this->load->view('regpage');
  }
  function regist()
  {
    if(isset($_POST['user']) and isset($_POST['pass']) and isset($_POST['email']))
    {
      $do = $this->mc_model->regplayer($_POST['user'], $_POST['pass'], $_POST['email']);
      if($do=="1"){
        $array = array(
          'login' => $_POST['user']
        );
        $this->session->set_userdata($array);
        redirect(base_url('mc/index?success=1'));
      } else {
        redirect(base_url('mc/register?err=1'));
      }
    }else{
      redirect(base_url('mc/register'));
    }
  }
  function cpw(){
    if(isset($_POST['passw']) and isset($_SESSION['login'])){
      $pass = $_POST['passw'];
      $user = $_SESSION['login'];
      $this->mc_model->cpw($user, $pass);
      redirect(base_url('mc/index'));
    }else{
      redirect(base_url('mc/index'));
    }
  }
}
