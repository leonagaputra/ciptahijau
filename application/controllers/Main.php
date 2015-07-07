<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Main extends My_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('pages_model', 'pm');        
    }
    
    //put your code here
    public function index(){       
        $this->data['about_us'] = $this->_get_about_us();
        $this->data['services'] = $this->_get_services();
        $this->data['contact_us'] = $this->_get_contact_us();
        $this->data['information'] = $this->_get_information();
        $this->data['testimonial'] = $this->_get_testimonial();
        //print_r($this->data['information']);exit;
        $this->load->view('frontpage', $this->data);
    }
    
    private function _get_about_us(){
        //get about_us data
        $datas = NULL;
        if($datas = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '1'), TRUE)){
            $datas->VDESC = $this->security_decode($datas->VDESC);                      
            $datas->DETAILS = $this->pm->get('dtlpages',array('HDRPAGES_ID'=> '1'));
            
            foreach($datas->DETAILS as $details) {
//                foreach ($details as $dtl){
//                    $dtl = $this->security_decode($dtl);
//                }
                $details->VDESC = $this->security_decode($details->VDESC);
            }
                //print_r($this->data['datas']->DETAILS);exit;                       
        }   
        return $datas;
    }
    
    private function _get_services(){
        //get about_us data
        $datas = NULL;
        if($datas = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '2'), TRUE)){
            $datas->VDESC = $this->security_decode($datas->VDESC);                      
            $datas->DETAILS = $this->pm->get('dtlpages',array('HDRPAGES_ID'=> '2'));
                //print_r($this->data['datas']->DETAILS);exit;                       
        }   
        return $datas;
    }
    
    private function _get_testimonial(){
        //get about_us data
        $datas = NULL;
        if($datas = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '3'), TRUE)){
            $datas->VDESC = $this->security_decode($datas->VDESC);    
            $datas->DETAILS = $this->pm->get('dtlpages',array('HDRPAGES_ID'=> '3'));
            foreach($datas->DETAILS as $details){
                $details->VDESC = $this->security_decode($details->VDESC); 
            }
                //print_r($this->data['datas']->DETAILS);exit;                       
        }   
        return $datas;
    }
    
    private function _get_contact_us(){
        //get about_us data
        $datas = NULL;
        if($datas = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '4'), TRUE)){
            $datas->VDESC = $this->security_decode($datas->VDESC);                                  
                //print_r($this->data['datas']->DETAILS);exit;                       
        }   
        return $datas;
    }
    
    private function _get_information(){
        $datas = NULL;
        if($datas = $this->pm->get('dtlsettings',array('hdrsettings_id'=> '1'))){
                                             
                //print_r($this->data['datas']->DETAILS);exit;                       
        }   
        return $datas;
    }
    
        
}
