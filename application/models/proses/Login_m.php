<?php

class Login_m extends CI_Model {

    private $list_api;

    public function __construct() {
        parent::__construct();
        $this->load->helper('basic_helper');
    }

    public function api_process($email, $password) {
        $url = config_load('api_url', 'site') . 'users/login'; //cari di folder config/site.php 
        //$this->list_api['url'];
        $param = array('email' => $email, 'password' => $password);
        return _runApi_old($url, $param, FALSE);
    }

}
