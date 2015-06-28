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
        $this->load->model('user_model', 'um');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index(){
        // cek login
        $this->_cek_user_login();
        
        $this->about_us();
    }
    
    public function login(){
        $this->load->view('login', $this->data);
    }
    
    public function do_login()
    {
        $data = array();
        $data['VUSERNAME'] = $this->security($this->input->post('username', TRUE));
        $data['VPASSWORD'] = $this->security($this->input->post('password', TRUE));
        
        if($result = $this->um->login($data))
        {
            $this->data['username'] = strtoupper($data['VUSERNAME']);
            //echo "here";exit;
            //print_r((array)$result);exit;
            $this->session->set_userdata((array)$result);
            //header('location:'.$this->data['base_url'] .'index.php/backend/about_us');
            //redirect($this->data['base_url'] .'index.php/backend/about_us', 'refresh');
        }
        $this->index();
    }
    
    public function about_us(){
        //cek login
        $this->_cek_user_login();
        
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
        $this->_cek_user_login();
        
        if($this->data['datas'] = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '2'), TRUE)){
            $this->data['datas']->VDESC = $this->security_decode($this->data['datas']->VDESC);            
            $this->data['page'] = 'services.php';
            $this->data['datas']->DETAILS = $this->pm->get('dtlpages',array('HDRPAGES_ID'=> '2'));
                //print_r($this->data['datas']->DETAILS);exit;           
            $this->load->view('adminpage', $this->data);
        }         
    }
    
    public function testimonial(){
        //cek login 
        $this->_cek_user_login();
        
        if($this->data['datas'] = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '3'), TRUE)){
            $this->data['datas']->VDESC = $this->security_decode($this->data['datas']->VDESC);            
            $this->data['page'] = 'testimonial.php';
            $this->data['datas']->DETAILS = $this->pm->get('dtlpages',array('HDRPAGES_ID'=> '3'));
                //print_r($this->data['datas']->DETAILS);exit;     
      
            $this->load->view('adminpage', $this->data);
        }         
    }
    
    public function contact_us(){
        //cek login 
        $this->_cek_user_login();
        
        if($this->data['datas'] = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '4'), TRUE)){
            $this->data['datas']->VDESC = $this->security_decode($this->data['datas']->VDESC);            
            $this->data['page'] = 'contact_us.php';              
            $this->load->view('adminpage', $this->data);
        }         
    }
    
    public function information(){
        //cek login 
        $this->_cek_user_login();
        
        if($this->data['datas'] = $this->pm->get('dtlsettings',array('hdrsettings_id'=> '1'))){
            //print_r($this->data['datas']);exit;        
            $this->data['page'] = 'information.php';              
            $this->load->view('adminpage', $this->data);
        }         
    }
    
    private function _cek_user_login(){
        //echo "test". $this->session->userdata('username')." lalala";exit;
        if(!$this->session->userdata('VUSERNAME')){
            //echo "test";exit;            
            header('location:'.$this->data['base_url']."index.php/backend/login");
        }
        $this->data['username'] = strtoupper($this->session->userdata('VUSERNAME'));
        //echo "test22". $this->session->userdata('username')." lalala";exit;
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        header('location:'.$this->data['base_url'] . 'index.php/backend/login');
    }
        
}
