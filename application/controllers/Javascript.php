<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Javascript extends My_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('pages_model', 'pm');        
    }
    
    //put your code here
    public function index(){       
        //$this->data['about_us'] = $this->_get_about_us();
        echo $this->data['base_url'];exit;
        $this->portfolio_slider();
    }
    
    public function portfolio_slider(){       
        //$this->data['about_us'] = $this->_get_about_us();
        //echo $this->data['base_url'];exit;
        $datas = NULL;
        $this->data['thumbnail'] = "img/portfolio/small/";
        $this->data['large'] = "img/portfolio/large/";
        $this->data['separator'] = "--|||--";
        if($this->data['datas'] = $this->pm->get('hdrworks')){
            foreach($this->data['datas'] as $data){
                //print_r($data);exit;
                $data->DETAILS = $this->pm->get('dtlworks',array('HDRWORKS_ID'=> $data->HDRWORKS_ID));
            }                       
        }   
        //print_r($this->data);exit;  
        $this->load->view('portfolio_slider', $this->data);
    }
       
        
}
