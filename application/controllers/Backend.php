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
        $this->load->model('pages_model', 'pm');
        $this->load->model('user_model', 'um');
        $this->load->helper('url');
        $this->load->library('session');
        $this->data['title_maxlength'] = 100;
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
            foreach($this->data['datas']->DETAILS as $details){
                $details->VDESC = $this->security_decode($details->VDESC);
            }
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
            $this->data['datas']->DETAILS = $this->pm->get('dtlpages',array('HDRPAGES_ID'=> '3'),FALSE, FALSE, NULL, NULL, "DTLPAGES_ID", TRUE);
            foreach($this->data['datas']->DETAILS as $details){
                $details->VDESC = $this->security_decode($details->VDESC);
            }
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
    
    function reset_header(){
        $this->_cek_user_login();
        $id = $this->get_input('id');
        
        if($msg = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> $id), TRUE)){
            $msg->VDESC = $this->security_decode($msg->VDESC);                                    
        }
        
        $this->set_json($msg);
    }
    
    function update_header(){
        $this->_cek_user_login();
        
        $id = $this->get_input('id');
        $title = $this->get_input('title');
        $desc = $this->get_input('desc');
        $datetime = date('Y-m-d H:i:s');
        
        $data = array(
            'VTITLE' => $title,
            'VDESC' => $desc,
            'DMODI' => $datetime,
            'VMODI' => $this->session->userdata('VUSERNAME')
        );
        
        
        
        $id_n = $this->pm->update($id, $data);
        if($id_n == $id) {
            $msg = array(
                'msg' => "success"
            );
        } else {
            $msg = array(
                'msg' => "error"
            );
        }
        $this->set_json($msg);
    }
    
    function update_detail(){
        $this->_cek_user_login();
        
        $id = $this->get_input('hdr_id');
        $dtl_id = $this->get_input('dtl_id');
        $title = $this->get_input('title');
        $desc = $this->get_input('desc');
        $dtl_name = $this->get_input('dtl_name');
        $dtl_position = $this->get_input('dtl_position');
        $dtl_company = $this->get_input('dtl_company');  
        $datetime = date('Y-m-d H:i:s');
        //echo $desc;exit;

        if($dtl_name){
            $data = array(                
                'VDESC' => $desc,
                'VNAME' => $dtl_name,
                'VCOMPANY' => $dtl_company,
                'VPOSITION' => $dtl_position,
                'DMODI' => $datetime,
                'VMODI' => $this->session->userdata('VUSERNAME')
            );
        }
        else {
            $data = array(
                'VTITLE' => $title,
                'VDESC' => $desc,
                'DMODI' => $datetime,
                'VMODI' => $this->session->userdata('VUSERNAME')
            );
        }
        
        
        
        $id_n = $this->pm->update($id, $data, "dtlpages", $dtl_id);
        if($id_n == $id) {
            $msg = array(
                'msg' => "success"
            );
        } else {
            $msg = array(
                'msg' => "error"
            );
        }
        $this->set_json($msg);
    }
    
    function add_detail(){
        $this->_cek_user_login();
                
        $title = $this->get_input('title');
        $desc = $this->get_input('desc');
        $dtl_name = $this->get_input('dtl_name');
        $dtl_position = $this->get_input('dtl_position');
        $dtl_company = $this->get_input('dtl_company');  
        
        //echo $this->input->post('desc');exit;
        //echo $desc;exit;
        
        $data = array(
            'HDRPAGES_ID' => '3',
            'VTITLE' => 'Testimonial',
            'VDESC' => $desc,
            'VNAME' => $dtl_name,
            'VCOMPANY' => $dtl_company,
            'VPOSITION' => $dtl_position,
            'VCREA' => $this->session->userdata('VUSERNAME')
        );        
        
        
        if($id_n = $this->pm->insert("dtlpages", $data)){
            $msg = array(
                'msg' => "success"
            );
        }
        
        $this->set_json($msg);
    }
    
    function update_information(){
        $this->_cek_user_login();
        $datetime = date('Y-m-d H:i:s');
       
        
        foreach ($_POST as $key => $value) {
            $hdrsettings_id = $this->input->post('hdrsettings_id');
            $data = array(
                'DMODI' => $datetime,
                'VMODI' => $this->session->userdata('VUSERNAME')                
            );
            if($key != 'hdrsettings_id'){
                $dtlsettings_id = $key;                
                $data['VITEMVALUE'] = $this->input->post($key);
                //print_r($data);exit;
                $this->pm->update($hdrsettings_id, $data, "dtlsettings", $dtlsettings_id, "HDRSETTINGS_ID", "DTLSETTINGS_ID");
            }          
            
        }
        
        $msg = array(
            'msg' => "success"
        );
        
        $this->set_json($msg);
    }
        
}
