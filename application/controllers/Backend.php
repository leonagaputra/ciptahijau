<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Backend extends My_Controller {
    //put your code here
    public function index(){
        //echo $this->data['base_app'];
        //$this->load->view('view', $this->data);
        //$this->load->view('getting_start', $this->data);
        $this->load->view('adminpage', $this->data);                
    }
    
    public function login() {
        //form login
    }        
}
