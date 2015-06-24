<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Main extends My_Controller {
    //put your code here
    public function index(){        
        $this->load->view('frontpage', $this->data);
    }
        
}
