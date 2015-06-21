<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('my_controller.php');

class Main extends My_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('article_model', 'am');
        $this->load->model('product_model', 'pm');
        $this->load->model('user_model', 'um');
        $this->load->model('transaksi_model', 'tm');
        $this->load->model('image_model', 'im');
        $this->load->helper('recaptchalib');
        $this->folder_upload = "system/application/assets/img/upload/";
        //localhost
//        $this->publickey = "6LeQRM4SAAAAALWy0HwYN4NyZI84iqTGz8LvSvp5";
//        $this->privatekey = "6LeQRM4SAAAAAEKKmbqVigR7DM4A6v05StFAuewn";
        //subursentosa.com
        $this->publickey = "6LeeQs4SAAAAAG0q7eUHjoMOPDZ4fx7D9lyXvLuh";
        $this->privatekey = "6LeeQs4SAAAAAA_RaDg5wd1wILYHZM4DjaGPQSvs";
        $this->list_site_type = array('about', 'pemesanan', 'service', 'home', 'contact');
    }

    function _get_session() {
        if ($this->session->userdata('username')) {
            $this->data['username'] = $this->session->userdata('username');
            $this->data['level'] = $this->session->userdata('level');
            $this->data['user_email'] = $this->session->userdata('email');
            $this->data['user_alamat'] = $this->session->userdata('alamat');
            $this->data['user_nama'] = $this->session->userdata('nama');
            $this->data['user_no_telp'] = $this->session->userdata('no_telp');
            //$this->load->view('page', $this->data);
        }
    }

    function _check_session_admin($page) {
        if ($this->session->userdata('level') != "admin") {
            header('location:' . $this->data['base_url'] . "index.php/main/" . $page);
        }
    }

    function _get_menus($client = FALSE) {
        $this->_get_session();
        $this->data['articles'] = $this->_get_menu('article', 'tgl');
        if ($client) {
            $this->data['clients'] = $this->_get_menu('portfolio', 'tgl', NULL);
            $this->data['clients'] = array();
            if ($clients = $this->am->get_portfolio()) {
                $values = array();
                foreach ($clients as $c) {
                    $index = $c->kategori;
                    if (!isset($values[$index]))
                        $values[$index] = array();
                    array_push($values[$index], $c);
                }
                $this->data['clients'] = $values;
            }
            //print_r($this->data['clients']);exit;
        }
        else {
            $this->data['products_menu'] = $this->_get_product_list();
        }
    }

    function index() {
        //echo "TEST";
//        $this->data['page'] = "home";
//        $this->_get_menus();
//        $this->load->view('page', $this->data);
        $this->site("home");
    }

    function _get_menu($type = 'article', $order = 'id', $limit = 5) {
        $data = FALSE;
        $data = $this->am->get(array('type' => $type), FALSE, FALSE, $limit, NULL, $order, TRUE);
        return $data;
    }

    function contact() {
        //$publickey = "6LeQRM4SAAAAALWy0HwYN4NyZI84iqTGz8LvSvp5";
        $error = NULL;
        $this->data['captcha'] = recaptcha_get_html($this->publickey, $error);
        $this->data['page'] = "contact";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function _get_product_list() {
        $values = array();
        if ($products = $this->pm->get(NULL, FALSE, FALSE, NULL, NULL, "kapasitas")) {
            foreach ($products as $p) {
                $index = $p->kapasitas >= 1000 ? "kapasitas_besar" : $p->kapasitas;
                if (!isset($values[$index]))
                    $values[$index] = array();
                array_push($values[$index], $p);
            }
        }
        return $values;
    }

    function product() {
        $values = $this->_get_product_list();
        //print_r($values);exit;
        $this->data['products'] = $values;
        $this->data['page'] = "product";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function product_edit() {
        $this->_check_session_admin("product");
        $products = $this->pm->get();
        $this->data['products'] = $products;
        $this->data['page'] = "product_edit";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function product_edit_detail($id = NULL) {
        $this->_check_session_admin("product");
        if ($id) {
            $data = $this->pm->get(array('id' => $id), TRUE);
            if ($data)
                $data->content = $this->security_decode($data->content);
            $this->data['product'] = $data;
            $this->data['product_images'] = array();
            if ($images = $this->im->get_product_images($id)) {
                foreach ($images as $i) {
                    $tmp = pathinfo($i->nama);
                    $ext = $tmp['extension'];
                    $im = array(
                        'id' => $i->image_id,
                        'extension' => $ext
                    );
                    array_push($this->data['product_images'], $im);
                }
            }
        }

        $this->data['page'] = "product_edit_detail";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function product_delete($id) {
        $this->_check_session_admin("product");
        if (intval($id) > 0) {
            $this->pm->del($id);
        }

        header('location:' . $this->data['base_url'] . "index.php/main/product_edit/");
    }

    function product_detail($id = NULL) {
        if ($id == NULL) {
            $this->product();
        } else {
            $data = $this->pm->get(array('id' => $id), TRUE);
            if ($data)
                $this->data['product_content'] = $this->security_decode($data->content);
            $this->data['product_images'] = array();
            if ($images = $this->im->get_product_images($id)) {
                foreach ($images as $i) {
                    $tmp = pathinfo($i->nama);
                    $ext = $tmp['extension'];
                    $im = array(
                        'id' => $i->image_id,
                        'extension' => $ext
                    );
                    array_push($this->data['product_images'], $im);
                }
            }
            $this->data['product_detail'] = $data;
        }
        $this->data['page'] = 'product_detail';
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function product_submit() {
        $id = $this->security($this->input->post('id', TRUE));
        $kode = $this->security($this->input->post('kode', TRUE));
        $type = $this->security($this->input->post('type', TRUE));
        $kapasitas = $this->security($this->input->post('kapasitas', TRUE));
        $posisi = $this->security($this->input->post('posisi', TRUE));
        $komponen_pemanas = $this->security($this->input->post('komponen_pemanas', TRUE));
        $content = $this->security($this->input->post('content', TRUE));
        $cover_luar = $this->security($this->input->post('cover_luar', TRUE));
        $insulasi = $this->security($this->input->post('insulasi', TRUE));
        $tangki_dalam = $this->security($this->input->post('tangki_dalam', TRUE));
        $working_pressure = $this->security($this->input->post('working_pressure', TRUE));
        $berat_tangki_kosong = $this->security($this->input->post('berat_tangki_kosong', TRUE));
        $berat_tangki_isi = $this->security($this->input->post('berat_tangki_isi', TRUE));
        $dimensi = $this->security($this->input->post('dimensi', TRUE));
        $harga = $this->security($this->input->post('harga', TRUE));
        $insert = array(
            'kode' => $kode,
            'type' => $type,
            'kapasitas' => $kapasitas,
            'posisi' => $posisi,
            'komponen_pemanas' => $komponen_pemanas,
            'content' => $content,
            'cover_luar' => $cover_luar,
            'insulasi' => $insulasi,
            'tangki_dalam' => $tangki_dalam,
            'working_pressure' => $working_pressure,
            'berat_tangki_kosong' => $berat_tangki_kosong,
            'berat_tangki_isi' => $berat_tangki_isi,
            'dimensi' => $dimensi,
            'harga' => $harga
        );
        if ($id == 0) {//insert
            $this->pm->insert($insert);
        } else { //update
            $this->pm->update($id, $insert);
        }
        header('location:' . $this->data['base_url'] . "index.php/main/product_edit/");
    }

    function portfolio_detail($id = NULL) {
        if ($id == NULL) {
            $this->portfolio();
        } else {
            $this->data['portfolio_content'] = "404 - Page Not Found";
            $this->data['portfolio_id'] = 0;
            if ($data = $this->am->get(array('type' => 'portfolio', 'id' => $id), TRUE)) {
                $this->data['portfolio_content'] = $this->security_decode($data->content);
                $this->data['portfolio_id'] = $data->id;
            }
        }
        $this->data['page'] = "portfolio";
        $this->_get_menus(TRUE);
        $this->load->view('page', $this->data);
    }

    function portfolio($page_num = 0, $last = 0) {
        $page_num = $page_num + 1;
        if ($data = $this->am->get(array('type' => 'portfolio'), FALSE)) {
            $this->data['page_num'] = ($page_num - 1);
            $this->data['pages'] = count($data);
            $cnt = 1;
            $this->data['portfolio_title'] = "";
            $this->data['portfolio_content'] = "404 - Page Not Found";
            $this->data['portfolio_id'] = 0;
            $this->data['portfolio_images'] = array();
            foreach ($data as $val) {
                //if($cnt == $page_num)
                $cond = $last ? ($cnt == $this->data['pages']) : ($cnt == $page_num);
                if ($cond) {

                    $this->data['portfolio_content'] = $this->security_decode($val->content);
                    $this->data['portfolio_id'] = $val->id;
                    $this->data['portfolio_title'] = $val->title;
                    if ($images = $this->im->get_article_images($val->id)) {
                        foreach ($images as $i) {
                            $tmp = pathinfo($i->nama);
                            $ext = $tmp['extension'];
                            $im = array(
                                'id' => $i->image_id,
                                'extension' => $ext
                            );
                            array_push($this->data['portfolio_images'], $im);
                        }
                    }
                    break;
                }
                $cnt++;
            }
            $this->load->library('pagination');
            $config['base_url'] = $this->data['base_url'] . 'index.php/main/portfolio/';
            $config['total_rows'] = $this->data['pages'];
            $config['per_page'] = 1;

            $this->pagination->initialize($config);

            $this->data['pagination'] = $this->pagination->create_links();
        } else {
            $this->data['portfolio_content'] = "Under Construction";
            $this->data['portfolio_id'] = 0;
            $this->data['pagination'] = "";
        }
        $this->data['page'] = "portfolio";
        $this->_get_menus(TRUE);
        $this->load->view('page', $this->data);
    }

    function article_detail($id = NULL, $type = 'article') {
        $list_type = array('article', 'portfolio');
        if (!in_array($type, $list_type))
            $type = 'article';
        if ($id == NULL) {
            $this->article();
        } else {
            $this->data[$type . '_content'] = "404 - Page Not Found";
            $this->data[$type . '_id'] = 0;
            if ($data = $this->am->get(array('type' => $type, 'id' => $id), TRUE)) {
                $this->data[$type . '_content'] = $this->security_decode($data->content);
                $this->data[$type . '_id'] = $data->id;
                $this->data[$type . '_title'] = $data->title;
                $this->data[$type . '_images'] = array();
                if ($images = $this->im->get_article_images($data->id)) {
                    foreach ($images as $i) {
                        $tmp = pathinfo($i->nama);
                        $ext = $tmp['extension'];
                        $im = array(
                            'id' => $i->image_id,
                            'extension' => $ext
                        );
                        array_push($this->data[$type . '_images'], $im);
                    }
                }
            }
        }
        $this->data['page'] = $type;
        $this->_get_menus($type == 'portfolio');
        $this->load->view('page', $this->data);
    }

    function article($page_num = 0, $last = 0) {
        $page_num = $page_num + 1;
        if ($data = $this->am->get(array('type' => 'article'), FALSE)) {
            $this->data['page_num'] = ($page_num - 1);
            $this->data['pages'] = count($data);
            $cnt = 1;
            $this->data['article_content'] = "404 - Page Not Found";
            $this->data['article_id'] = 0;

            foreach ($data as $val) {
                //if($cnt == $page_num)
                $cond = $last ? ($cnt == $this->data['pages']) : ($cnt == $page_num);
                if ($cond) {
                    $this->data['article_content'] = $this->security_decode($val->content);
                    $this->data['article_id'] = $val->id;
                    break;
                }
                $cnt++;
            }
            $this->load->library('pagination');
            $config['base_url'] = $this->data['base_url'] . 'index.php/main/article/';
            $config['total_rows'] = $this->data['pages'];
            $config['per_page'] = 1;

            $this->pagination->initialize($config);

            $this->data['pagination'] = $this->pagination->create_links();
        } else {
            $this->data['article_content'] = "Under Construction";
            $this->data['article_id'] = 0;
            $this->data['pagination'] = "";
        }
        $this->data['page'] = "article";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function portfolio_add() {
        $this->_check_session_admin("portfolio");
        $this->data['portfolio_id'] = 0;
        $this->data['portfolio_content'] = "";
        $this->data['portfolio_title'] = "";
        $this->data['page'] = "portfolio_edit";
        $this->data['kategori_list'] = $this->am->get_pk();
        $this->_get_menus(TRUE);
        $this->load->view('page', $this->data);
    }

    function article_add() {
        $this->_check_session_admin("article");
        $this->data['article_id'] = 0;
        $this->data['article_content'] = "";
        $this->data['article_title'] = "";
        $this->data['page'] = "article_edit";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function portfolio_edit($id, $page_num = 0) {
        $this->_check_session_admin("portfolio");
        $page_num = $page_num + 1;
        $this->data['portfolio_content'] = "";
        $this->data['portfolio_id'] = 0;
        $this->data['portfolio_title'] = "";
        $this->data['portfolio_kategori'] = 0;
        $this->data['portfolio_images'] = array();
        $this->data['kategori_list'] = $this->am->get_pk();
        if ($data = $this->am->get(array('type' => 'portfolio', 'id' => $id), TRUE)) {
            $this->data['page_num'] = ($page_num - 1);
            $this->data['pages'] = count($data);
            $this->data['portfolio_content'] = $this->security_decode($data->content);
            $this->data['portfolio_id'] = $data->id;
            $this->data['portfolio_title'] = $data->title;
            $this->data['portfolio_kategori'] = $data->kategori;
            if ($images = $this->im->get_article_images($data->id)) {
                foreach ($images as $i) {
                    $tmp = pathinfo($i->nama);
                    $ext = $tmp['extension'];
                    $im = array(
                        'id' => $i->image_id,
                        'extension' => $ext
                    );
                    array_push($this->data['portfolio_images'], $im);
                }
            }
        }

        $this->data['page'] = "portfolio_edit";
        $this->_get_menus(TRUE);
        $this->load->view('page', $this->data);
    }

    function article_edit($id, $page_num = 0) {
        $this->_check_session_admin("article");
        $page_num = $page_num + 1;
        $this->data['article_content'] = "";
        $this->data['article_id'] = 0;
        $this->data['article_title'] = "";
        if ($data = $this->am->get(array('type' => 'article', 'id' => $id), TRUE)) {
            $this->data['page_num'] = ($page_num - 1);
            $this->data['pages'] = count($data);
            $this->data['article_content'] = $this->security_decode($data->content);
            $this->data['article_id'] = $data->id;
            $this->data['article_title'] = $data->title;
        }

        $this->data['page'] = "article_edit";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function portfolio_update() {
        $portfolio = $this->security($this->input->post('portfolio', TRUE));
        $id = $this->security($this->input->post('id', TRUE));
        $kategori = $this->security($this->input->post('kategori', TRUE));
        $page_num = $this->security($this->input->post('page_num', TRUE));
        $title = $this->security($this->input->post('title', TRUE));
        /* $echo = $this->security_decode($service);
          echo $echo; */
        if ($data = $this->am->get(array('type' => 'portfolio', 'id' => $id), TRUE)) {
            $update = array(
                'tgl' => date('Y-m-d h:i:s'),
                'content' => $portfolio,
                'title' => $title,
                'kategori' => $kategori
            );
            $this->am->update($id, $update);
            if ($page_num)
                header('location:' . $this->data['base_url'] . "index.php/main/portfolio/" . $page_num);
            else
                header('location:' . $this->data['base_url'] . "index.php/main/article_detail/" . $id . "/portfolio");
        }
        else {
            $insert = array(
                'username' => 'admin',
                'title' => $title,
                'tgl' => date('Y-m-d h:i:s'),
                'content' => $portfolio,
                'status' => 'publish',
                'type' => "portfolio",
                'kategori' => $kategori
            );
            $article_id = $this->am->insert($insert);
            $image_ids = $this->_get_zero_article_img_id();
            if (count($image_ids) > 0) {
                foreach ($image_ids as $id) {
                    $this->im->set_zero_article_image_id($id, $article_id);
                }
            }
            $data = $this->am->get(array('type' => 'portfolio'), TRUE, TRUE);
            header('location:' . $this->data['base_url'] . "index.php/main/portfolio/" . ($data->cnt - 1) . "/1");
        }
        //$this->service();
    }

    function article_update() {
        $article = $this->security($this->input->post('article', TRUE));
        $id = $this->security($this->input->post('id', TRUE));
        $page_num = $this->security($this->input->post('page_num', TRUE));
        $title = $this->security($this->input->post('title', TRUE));
        /* $echo = $this->security_decode($service);
          echo $echo; */
        if ($data = $this->am->get(array('type' => 'article', 'id' => $id), TRUE)) {
            $update = array(
                'tgl' => date('Y-m-d h:i:s'),
                'content' => $article,
                'title' => $title
            );
            $this->am->update($id, $update);
            if ($page_num)
                header('location:' . $this->data['base_url'] . "index.php/main/article/" . $page_num);
            else
                header('location:' . $this->data['base_url'] . "index.php/main/article_detail/" . $id);
        }
        else {
            $insert = array(
                'username' => 'admin',
                'title' => $title,
                'tgl' => date('Y-m-d h:i:s'),
                'content' => $article,
                'status' => 'publish',
                'type' => "article"
            );
            $this->am->insert($insert);
            $data = $this->am->get(array('type' => 'article'), TRUE, TRUE);
            header('location:' . $this->data['base_url'] . "index.php/main/article/" . ($data->cnt - 1) . "/1");
        }
        //$this->service();
    }

    function logout() {
        $this->session->sess_destroy();
        header('location:' . $this->data['base_url']);
    }

    function do_login() {
        $data = array();
        $data['username'] = $this->security($this->input->post('username', TRUE));
        $data['password'] = md5($this->security($this->input->post('password', TRUE)));
        $data['status'] = "active";
        $data['activated'] = 1;
        if ($result = $this->um->login($data)) {
            //echo "here";exit;
            $this->session->set_userdata($result);
            header('location:' . $this->data['base_url']);
        }
        $this->index();
    }

    function users() {
        $this->_check_session_admin("site/home");
        $this->data['users'] = FALSE;
        if ($data = $this->um->get()) {
            $this->data['users'] = $data;
        }
        $this->data['page'] = "users";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function users_detail($user) {
        if ($this->session->userdata('username') != $user && $this->session->userdata('username') != "admin") {
            header('location:' . $this->data['base_url'] . "index.php/main/index");
        }
        $this->data['user_detail'] = FALSE;
        if ($data = $this->um->get(array('username' => $user), FALSE)) {
            $this->data['user_detail'] = $data;
        }
        $this->data['page'] = "users_detail";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function users_update() {
        $username = $this->security($this->input->post('username', TRUE));
        $update = array();
        $password = $this->security($this->input->post('password', TRUE));
        if ($password != "")
            $update['password'] = md5($password);
        $update['email'] = $this->security($this->input->post('email', TRUE));
        $update['alamat'] = $this->security($this->input->post('alamat', TRUE));
        $update['nama'] = $this->security($this->input->post('nama', TRUE));
        $update['no_telp'] = $this->security($this->input->post('no_telp', TRUE));
        $update['level'] = $this->security($this->input->post('level', TRUE));
        $update['status'] = $this->security($this->input->post('status', TRUE));
        //print_r($update);exit;

        if ($this->um->update($username, $update)) {
            if ($this->session->userdata('username') == $username && $this->session->userdata('level') != 'admin')
                header('location:' . $this->data['base_url'] . "index.php/main/index");
            else
                header('location:' . $this->data['base_url'] . "index.php/main/users");
        }
    }

    function users_delete($id) {
        $this->_check_session_admin("site/home");
        $this->um->del($id);
        header('location:' . $this->data['base_url'] . "index.php/main/users");
    }

    function users_register() {
        $this->data['page'] = "users_register";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function check_users() {
        $data = array();
        $data['username'] = $this->security($this->input->post('username', TRUE));
        $data['email'] = $this->security($this->input->post('email', TRUE));
        $message = array('status' => 'ok', 'detail' => 'Sukses');
        if ($datas = $this->um->get($data, TRUE, NULL, TRUE)) {
            $message['status'] = "gagal";
            $message['detail'] = "";
            foreach ($datas as $d) {
                if ($d->username == $data['username'])
                    $message['detail'] .= "Username ";
                if ($d->email == $data['email'])
                    $message['detail'] .= "Email ";
            }
            $message['detail'] .= "telah terpakai ";
        }
        else {
            $data['nama'] = $this->security($this->input->post('nama', TRUE));
            $data['alamat'] = $this->security($this->input->post('alamat', TRUE));
            $data['no_telp'] = $this->security($this->input->post('no_telp', TRUE));
            $data['level'] = "member";
            $data['status'] = "active";
            $data['password'] = md5($this->security($this->input->post('password', TRUE)));
            //print_r($data);exit;
            $this->um->save($data);
            $this->_send_user_email($data['email'], $data['username'], $data['password']);
        }
        $this->set_json($message);
    }

    function _send_user_email($email, $user, $pass) {
        $this->load->library('email');
        $config['mailtype'] = "html";
        $this->email->initialize($config);
        $this->email->from('no-reply@subursentosa.com');
        $this->email->to($email);
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

        $this->email->subject('Subursentosa User Confirmation');

        $link = $this->data['base_url'] . "index.php/main/users_activation/" . $user . "/" . $pass;

        $message = "";
        $message .= "<div><h2>Subursentosa Konfirmasi User<h2></div><br/>";
        $message .= "<div>Klik link di bawah ini untuk menaktivasi akun Anda.</div><br/><br/>";
        $message .= "<a href='" . $link . "'>";
        $message .= $link;
        $message .= "</a>";
        $message .= "<br/><br/>";
        $message .= "<div>Regards,<br/>Subursentosa Admin</div>";
        $this->email->message($message);

        $this->email->send();
    }

    function users_activation($user, $pass) {
        $data = array(
            'username' => $user,
            'password' => $pass
        );
        $update = array("activated" => 1);
        $this->um->update($user, $update, $data);
        $this->data['page'] = "users_confirmation";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function form_pemesanan($id = NULL) {
        $this->data['pemesanan_id'] = $id;
        $this->data['produk_pemesanan'] = $this->pm->get(NULL, FALSE, FALSE, NULL, NULL, "kapasitas");
        $this->data['page'] = "form_pemesanan";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function pemesanan_delete($id) {
        if ($this->session->userdata('level') == "admin") {
            $this->tm->del($id);
        }
    }

    function pemesanan_submit() {
        $username = $this->security($this->input->post('username', TRUE));
        $nama = $this->security($this->input->post('nama', TRUE));
        $alamat = $this->security($this->input->post('alamat', TRUE));
        $no_telp = $this->security($this->input->post('no_telp', TRUE));
        $produk_id = $this->security($this->input->post('produk_id', TRUE));
        $jumlah = $this->security($this->input->post('jumlah', TRUE));
        $date = date("Y-m-d H:i:s");
        $insert = array(
            'username' => $username,
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'tgl_pemesanan' => $date
        );

        $id = $this->tm->insert($insert);
        if ($id > 0) {
            $length = count($produk_id);
            $products = array();
            for ($i = 0; $i < $length; $i++) {
                if (isset($products[$produk_id[$i]]))
                    $products[$produk_id[$i]] += $jumlah[$i];
                else
                    $products[$produk_id[$i]] = $jumlah[$i];
            }
            foreach ($products as $key => $val) {
                $ins = array(
                    'transaksi_id' => $id,
                    'product_id' => $key,
                    'jumlah' => $val
                );
                $this->tm->insert_tp($ins);
            }
        }

        header('location:' . $this->data['base_url'] . "index.php/main/status_pemesanan/");
    }

    function status_pemesanan() {
        $username = $this->session->userdata('username');
        if ($username)
            $this->data['pesanan'] = $this->tm->get(array('username' => $username), FALSE, FALSE, NULL, NULL, "tgl_pemesanan", TRUE);
        else
            $this->data['pesanan'] = FALSE;
        $this->data['page'] = "status_pemesanan";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function produk_pemesanan($id) {
        $username = NULL;
        if ($this->session->userdata('level') != 'admin')
            $username = $this->session->userdata('username');
        $result = $this->tm->get_transaksi_product($id, $username);
        $this->set_json($result);
    }

    function site_edit($type = 'about') {
        $list_type = $this->list_site_type;
        if (!in_array($type, $list_type))
            $type = 'about';
        $this->_check_session_admin("site/" . $type);
        if ($data = $this->am->get(array('type' => $type), TRUE)) {
            $this->data[$type . '_content'] = $this->security_decode($data->content);
        } else {
            $this->data[$type . '_content'] = "";
        }
        $this->data['page'] = $type . "_edit";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function site_update($type = 'about') {
        $list_type = $this->list_site_type;
        if (!in_array($type, $list_type))
            $type = 'about';
        $site = $this->security($this->input->post($type, TRUE));
        /* $echo = $this->security_decode($service);
          echo $echo; */
        if ($data = $this->am->get(array('type' => $type), TRUE)) {
            $update = array(
                'tgl' => date('Y-m-d h:i:s'),
                'content' => $site
            );
            $this->am->update($data->id, $update);
        } else {
            $insert = array(
                'username' => 'admin',
                'title' => ucwords($type),
                'tgl' => date('Y-m-d h:i:s'),
                'content' => $site,
                'status' => 'publish',
                'type' => $type
            );
            $this->am->insert($insert);
        }
        //$this->service();
        header('location:' . $this->data['base_url'] . "index.php/main/site/$type");
    }

    function site($type = 'about') {
        $list_type = $this->list_site_type;
        if (!in_array($type, $list_type))
            $type = 'about';
        if ($data = $this->am->get(array('type' => $type), TRUE)) {
            $this->data[$type . '_content'] = $this->security_decode($data->content);
        } else {
            $this->data[$type . '_content'] = "Under Construction";
        }
        if ($type == "contact") {
            $error = NULL;
            $this->data['captcha'] = recaptcha_get_html($this->publickey, $error);
        }
        $this->data['page'] = $type;
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function manajemen_pemesanan() {
        $list_status = array(
            'new' => 1,
            'cancel' => 2,
            'waiting' => 3,
            'paid' => 4,
            'sent' => 5,
            'done' => 6
        );
        $this->_check_session_admin("site/pemesanan");
        $this->data['pesanan'] = $this->tm->get(NULL, FALSE, FALSE, NULL, NULL, "tgl_pemesanan", TRUE);
        $this->data['page'] = "manajemen_pemesanan";
        $this->data['list_status'] = $list_status;
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

    function get_kode($id, $tgl) {
        $t = date('Ym', strtotime($tgl));
        $kode = "SS-" . $t . "-" . $id;
        return $kode;
    }

    function pemesanan_update() {
        $list_status = array(
            'new' => 1,
            'cancel' => 2,
            'waiting' => 3,
            'paid' => 4,
            'sent' => 5,
            'done' => 6
        );
        $date = date("Y-m-d H:i:s");
        $id = $this->security($this->input->post('id', TRUE));
        $status = $this->security($this->input->post('status', TRUE));
        $update = array();
        $update['status'] = $status;
        $update['status_int'] = $list_status[$status];
        if ($status == 'paid')
            $update['tgl_pembayaran'] = $date;
        if ($status == 'sent')
            $update['tgl_pengiriman'] = $date;
        $this->tm->update($id, $update);
        $data = $this->tm->get(array('id' => $id), TRUE);
        $return = array(
            'status' => $data->status,
            'tgl_pembayaran' => $data->tgl_pembayaran,
            'tgl_pengiriman' => $data->tgl_pengiriman//,
                //'kode'=>$this->get_kode($data->id, $data->tgl_pemesanan)
        );
        $this->set_json($return);
    }

    function download_brosur($id = 1) {
        $list_id = array(1, 2, 3, 4, 5);
        $id = in_array($id, $list_id) ? $id : 1;
        $fullPath = "system/application/assets/img/brosur/brosur" . $id . ".jpg";
        $this->download_file($fullPath);
    }

    function upload_article_img() {
        $image_id = 0;
        $article_id = $this->security($this->input->post('article_id', TRUE));
        //$folder = "system/application/assets/img/upload/";
        $error = "";
        $msg = "";
        $fileElementName = 'fileToUpload';
        //print_r(pathinfo($_FILES[$fileElementName]['name']));exit;
        $tmp = pathinfo($_FILES[$fileElementName]['name']);
        $ext = $tmp['extension'];
        $pos = strpos($_FILES[$fileElementName]["type"], "image");
        if ($pos === false) {
            // not image
            $error = "File harus berupa image";
        } else {
            // image
        }

        if (!empty($_FILES[$fileElementName]['error'])) {
            switch ($_FILES[$fileElementName]['error']) {

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
        } else if (empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none') {
            $error = 'No file was uploaded..';
        } else {
            $data = array(
                'nama' => $_FILES[$fileElementName]['name'],
                'username' => $this->session->userdata('username')
            );
            $image_id = $this->im->insert($data);
            //if($article_id > 0)
            {
                //insert article_image
                $data2 = array(
                    'article_id' => $article_id,
                    'image_id' => $image_id
                );
                $this->im->insert_article_img($data2);
            }
            move_uploaded_file($_FILES[$fileElementName]["tmp_name"], $this->folder_upload . $image_id . "." . $ext);
            //@unlink($_FILES['fileToUpload']);
        }

        echo "{";
        echo "error: '" . $error . "',\n";
        echo "msg: '" . $msg . "',\n";
        echo "image_id: '" . $image_id . "',\n";
        echo "extension: '" . $ext . "'\n";
        echo "}";
    }

    function upload_product_img() {
        $image_id = 0;
        $product_id = $this->security($this->input->post('product_id', TRUE));
        //$folder = "system/application/assets/img/upload/";
        $error = "";
        $msg = "";
        $fileElementName = 'fileToUpload';
        //print_r(pathinfo($_FILES[$fileElementName]['name']));exit;
        $tmp = pathinfo($_FILES[$fileElementName]['name']);
        $ext = $tmp['extension'];
        $pos = strpos($_FILES[$fileElementName]["type"], "image");
        if ($pos === false) {
            // not image
            $error = "File harus berupa image";
        } else {
            // image
        }

        if (!empty($_FILES[$fileElementName]['error'])) {
            switch ($_FILES[$fileElementName]['error']) {

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
        } else if (empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none') {
            $error = 'No file was uploaded..';
        } else {
            $data = array(
                'nama' => $_FILES[$fileElementName]['name'],
                'username' => $this->session->userdata('username')
            );
            $image_id = $this->im->insert($data);
            //if($article_id > 0)
            {
                //insert article_image
                $data2 = array(
                    'product_id' => $product_id,
                    'image_id' => $image_id
                );
                $this->im->insert_product_img($data2);
            }
            move_uploaded_file($_FILES[$fileElementName]["tmp_name"], $this->folder_upload . $image_id . "." . $ext);
            //@unlink($_FILES['fileToUpload']);
        }

        echo "{";
        echo "error: '" . $error . "',\n";
        echo "msg: '" . $msg . "',\n";
        echo "image_id: '" . $image_id . "',\n";
        echo "extension: '" . $ext . "'\n";
        echo "}";
    }

    function delete_article_img($id, $ext = "jpg") {
        if ($this->session->userdata('level') == "admin") {
            $this->im->del_article_img(array('image_id' => $id));
            $this->im->del($id);
            $this->folder_upload;
            @unlink($this->folder_upload . $id . "." . $ext);
        }
    }

    function delete_product_img($id, $ext = "jpg") {
        if ($this->session->userdata('level') == "admin") {
            $this->im->del_product_img(array('image_id' => $id));
            $this->im->del($id);
            $this->folder_upload;
            @unlink($this->folder_upload . $id . "." . $ext);
        }
    }

    function _get_zero_article_img_id() {
        $return = array();
        if ($datas = $this->im->get_article_images(0)) {
            foreach ($datas as $d) {
                array_push($return, $d->image_id);
            }
        }
        //print_r($return);exit;
        return $return;
    }

    function send_email() {
        if ($_POST["recaptcha_response_field"]) {
            $resp = recaptcha_check_answer($this->privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

            if ($resp->is_valid) {
                //echo "You got it!";
            } else {
                # set the error code so that we can display it                
                $error = $resp->error;
                echo 1;
                exit; //kirim semua email.. ignore captcha
            }
        }

        $email = $this->security($this->input->post('email', TRUE));
        $this->load->library('email');
        $config['mailtype'] = "html";
        $this->email->initialize($config);
        $this->email->from($email);
        $this->email->to('sentosasubur@ymail.com');
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

        $this->email->subject('Contact From User');

        $message = $this->input->post('message', TRUE);
        $this->email->message($message);

        $this->email->send();
        echo 2;
    }

    function article_delete($id, $type) {
        if ($this->session->userdata('level') == "admin") {
            $this->am->del($id);
        }
    }

    function search() {
        $keyword = $this->security($this->input->post('keyword', TRUE));
        $results = array();
        if ($articles = $this->am->search($keyword)) {
            foreach ($articles as $a) {
                $arr = (object) array(
                            'id' => $a->id,
                            'title' => $a->title,
                            'type' => $a->type
                );
                array_push($results, $arr);
            }
        }
        if ($products = $this->pm->search($keyword)) {
            foreach ($products as $p) {
                $arr = (object) array(
                            'id' => $p->id,
                            'title' => $p->kode,
                            'type' => 'product'
                );
                array_push($results, $arr);
            }
        }


        $this->data['results'] = $results;
        $this->data['page'] = "search";
        $this->_get_menus();
        $this->load->view('page', $this->data);
    }

}

?>