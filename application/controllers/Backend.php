<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Backend extends My_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('page_model', 'pm');
    }
    
    public function index(){
        // cek login
        
        $this->about_us();
    }
    
    public function login(){
        $this->load->view('login', $this->data);
    }
    
    public function about_us(){
        //cek login
        
        //get about_us data
        if($this->data['datas'] = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '1'), TRUE)){
            $this->data['datas']->VDESC = $this->security_decode($this->data['datas']->VDESC);            
            $this->data['page'] = 'about_us.php';
            $this->data['datas']->DETAILS = $this->pm->get('dtlpages',array('HDRPAGES_ID'=> '1'));
                //print_r($this->data['datas']->DETAILS);exit;     
      
            $this->load->view('adminpage', $this->data);
        }        
    }
    
    public function services(){
        //cek login 
        
        if($this->data['datas'] = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '2'), TRUE)){
            $this->data['datas']->VDESC = $this->security_decode($this->data['datas']->VDESC);            
            $this->data['page'] = 'services.php';
            $this->data['datas']->DETAILS = $this->pm->get('dtlpages',array('HDRPAGES_ID'=> '2'));
                //print_r($this->data['datas']->DETAILS);exit;     
      
            $this->load->view('adminpage', $this->data);
        } 
        $this->data['page'] = 'services.php';
        $this->load->view('adminpage', $this->data);
    }
        
}
