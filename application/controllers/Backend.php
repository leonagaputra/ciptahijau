<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Backend extends My_Controller {
    //put your code here
    var $HDRWORKS_ID;
    
    public function __construct() {
        parent::__construct();
        $this->folder_upload_large = "img/portfolio/large/";
        $this->folder_upload_small = "img/portfolio/small/";
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
            foreach($this->data['datas']->DETAILS as $details){
                $details->VDESC = $this->security_decode($details->VDESC);
            }
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
    
    public function projects(){
        //cek login 
        $this->_cek_user_login();
        
        if($this->data['datas'] = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '5'), TRUE)){
            $this->data['datas']->VDESC = $this->security_decode($this->data['datas']->VDESC);            
            $this->data['page'] = 'projects.php';              
            $this->load->view('adminpage', $this->data);
        }         
    }
    
    public function project_details(){
        //cek login 
        $this->_cek_user_login();
        if($this->data['datas'] = $this->pm->get('hdrpages',array('HDRPAGES_ID'=> '5'), TRUE)){
            $this->data['datas']->VDESC = $this->security_decode($this->data['datas']->VDESC);            
            $this->data['page'] = 'proj_details.php';              
            $this->load->view('adminpage', $this->data);
        } 
    }
    
    public function update_project_detail(){        
        
        $itemid = $this->get_input('itemid');
        $title = $this->get_input('title');
        $desc = $this->get_input('desc');
        $client = $this->get_input('client');
        $market = $this->get_input('market');
        $service = $this->get_input('service');
        $wdscl = $this->get_input('wdscl');
        $location = $this->get_input('location');
        $length = $this->get_input('length');
        $status = $this->get_input('status');        
        $year = $this->get_input('year');
        $tags = $this->get_input('tags');
        $data = array(
            'VTITLE' => $title,
            'VDESC' => $desc,
            'VCLIENT' => $client,
            'VMARKET' => $market,
            'VSERVICES' => $service,
            'VWDSCL' => $wdscl,
            'VLOCATION' => $location,
            'IYEAR' => $year,
            'VLENGTH' => $length,
            'VSTATUS' => $status,
            'VTAGS' => $tags
        );
        if($itemid){
            //echo "edit";
            $data['VMODI'] = $this->session->userdata('VUSERNAME');
            $data['DMODI'] = date("Y-m-d H:i:s");
            $update_id = $this->pm->update($itemid, $data, "hdrworks",NULL, "HDRWORKS_ID", NULL);
            $msg = array(
                'msg' => "success"
            );
            $this->set_json($msg);
        } else {
            //echo "insert";
            $data['VCREA'] = $this->session->userdata('VUSERNAME');
            $data['DCREA'] = date("Y-m-d H:i:s");
            $insert_id = $this->pm->insert("hdrworks", $data);
                    
            $msg = array(
                'msg' => "success"
            );
            $this->set_json($msg);
        }       
        
        
    }
    
    public function get_project(){
        //cek login 
        $this->_cek_user_login();
        $id = $this->get_input("id");
        $this->HDRWORKS_ID = $id;
        $this->session->set_userdata('HDRWORKS_ID', $id);
        //echo $this->HDRWORKS_ID;exit;
        $datas = array(
            'HDRWORKS_ID'=>$id
        );
        //print_r($test);exit;$search_val
        $cnt = $this->pm->get('hdrworks', $datas, TRUE, TRUE);
        $results = array();
        if($cnt->cnt > 0){
            if($datas = $this->pm->get('hdrworks', $datas, TRUE)){                
                $results = $datas;                                                    
                $results->VDESC = $this->security_decode($results->VDESC);  
                //print_r($results);exit;
            } else {
                $results['total'] = 0;
                $results['rows'] = (object)array();
            }
        } else {
            $results['total'] = 0;
            $results['rows'] = (object)array();
        }
        
        $this->set_json((object)$results);
    }
    
    public function project_datas(){
        //cek login 
        $this->_cek_user_login();
        
        $order = $this->get_input('order');
        $limit = $this->get_input('limit');
        $offset = $this->get_input('offset');
        $sort = $this->get_input('sort') ? $this->get_input('sort') : NULL;
        $desc = $order == "asc" ? FALSE : TRUE;
        $search = $this->get_input('search');
        
        $search_val = array(
            'VTITLE' => $search
        );
        
        $sorts = array(
            'id' => 'HDRWORKS_ID',
            'title' => 'VTITLE',
            'client' => 'VCLIENT',
            'location' => 'VLOCATION',
            'year' => 'IYEAR'
        );                       
        
        
        //print_r($test);exit;$search_val
        $cnt = $this->pm->get('hdrworks', NULL, TRUE, TRUE, NULL, NULL, NULL, FALSE, $search_val);
        $results = array();
        if($cnt->cnt > 0){
            if($datas = $this->pm->get('hdrworks', NULL, FALSE, FALSE, $limit, $offset, ($sort? $sorts[$sort]:NULL), $desc, $search_val)){
                $results['total'] = $cnt->cnt;
                $results['rows'] = array();
                foreach($datas as $data){
                    $row = array(
                        'id'=> $data->HDRWORKS_ID,
                        'title' => $data->VTITLE,
                        'client' => $data->VCLIENT,
                        'location' => $data->VLOCATION,
                        'year' => $data->IYEAR
                    );
                    array_push($results['rows'], (object)$row);
                }
            } else {
                $results['total'] = 0;
                $results['rows'] = (object)array();
            }
        } else {
            $results['total'] = 0;
            $results['rows'] = (object)array();
        }
        
        $this->set_json((object)$results);
        
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
    
    function upload_img()
    {
        $this->HDRWORKS_ID = $this->session->userdata('HDRWORKS_ID');
        //echo $this->HDRWORKS_ID. " afafafa";exit;
        $this->_cek_user_login();
        //print_r($_FILES);exit;
        
        $image_id = 0;
        
        //$folder = "system/application/assets/img/upload/";
        $error = "";
        $msg = "";
        $fileElementName = 'file';
        
        list(,,$type) = getimagesize($_FILES[$fileElementName]['tmp_name']);
        $type = image_type_to_extension($type);
        
        //print_r($_FILES[$fileElementName]);exit;
        //print_r(pathinfo($_FILES[$fileElementName]['name']));exit;
        $tmp = pathinfo($_FILES[$fileElementName]['name']);
        $ext = $tmp['extension'];
        $pos = strpos($_FILES[$fileElementName]["type"],"image");
        if($pos === false) {
         // not image
            $error = "File harus berupa image";
        }
        else {
         // image
        }

        if(!empty($_FILES[$fileElementName]['error']))
        {
            switch($_FILES[$fileElementName]['error'])
            {

                case '1':
                    $error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                    break;
                case '2':
                    $error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form (2MB)';
                    break;
                case '3':
                    $error = 'The uploaded file was only partially uploaded';
                    break;
                case '4':
                    $error = 'No file was uploaded.';
                    break;

                case '6':
                    $error = 'Missing a temporary folder';
                    break;
                case '7':
                    $error = 'Failed to write file to disk';
                    break;
                case '8':
                    $error = 'File upload stopped by extension';
                    break;
                case '999':
                default:
                    $error = 'No error code avaiable';
            }
        }
        else if(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
        {
            $error = 'No file was uploaded..';
        }
        else
        { 
           
            $data = array(
                'HDRWORKS_ID' => $this->HDRWORKS_ID,
                'VTHUMBNAIL' => $ext,
                'VLARGE' => $ext,
                'VCREA' => $this->session->userdata('VUSERNAME'),
                'DCREA' => date("Y-m-d H:i:s")
            );
            //print_r($data);
            //insert ke detail
            $image_id = $this->pm->insert("dtlworks",$data);
            $filename = $this->HDRWORKS_ID ."_".$image_id.".".$ext;
            $update_data = array(
                'VTHUMBNAIL' => $filename,
                'VLARGE' => $filename                
            );
            $this->pm->update($this->HDRWORKS_ID,$update_data,"dtlworks", $image_id, "HDRWORKS_ID", "DTLWORKS_ID");
            
            move_uploaded_file($_FILES[$fileElementName]["tmp_name"], $this->folder_upload_large . $filename);
            
            //create thumbnail
            $t = 'imagecreatefrom'.$type;
            $t = str_replace('.','',$t);
            $img = $t($this->folder_upload_large . $filename);
            
            $k = 250;
            $v = 250;
            
            $width = imagesx( $img );
            $height = imagesy( $img );

            $new_width = $v;
            $new_height = floor( $height * ( $v / $width ) );

            $tmp_img = imagecreatetruecolor( $new_width, $new_height );
            imagealphablending( $tmp_img, false );
            imagesavealpha( $tmp_img, true );
            imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

            $c = 'image'.$type;
            $c = str_replace('.','',$c);
            $c( $tmp_img, $this->folder_upload_small . $filename );
          
        }
       
        echo "{";
        echo				"error: '" . $error . "',\n";
        echo				"msg: '" . $msg . "',\n";
        echo				"image_id: '" . $image_id . "',\n";
        echo				"extension: '" . $ext . "'\n";
        echo "}";
    }
        
}
