<?php

class Keuangan_m extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('basic_helper');

    }

    public function api_process($email, $password) {
        $url = config_load('api_url', 'site') . 'users/login'; //cari di folder config/site.php
        $param = array('email' => $email, 'password' => $password);
        return _runApi_old($url, $param, FALSE);
    }
    
    public function currency_all(){
        $url = api_url() . 'settings/currency'; //cari di folder config/site.php
        $param = array('function'=>'get_all');
        $param['params']=array(
            'filter'=>$filter,
            'limit'=>$limit,
            'start'=>$start,
            'count'=>$count
        );
        $result= _runApi($url, $param, FALSE);
        return isset($result['data']['currency'])?$result['data']['currency']:array();
    }
    
    function currency_add($input){
        $url = api_url() . 'settings/currency_add_post'; //cari di folder config/site.php 
        //$this->list_api['url'];
        $param = array('function'=>'get_all','input'=>$input);
        // echo $url;
        $result= _runApi($url, $param, TRUE);
 
        return $result;
        return isset($result['data']['currency'])?$result['data']['currency']:$result;
    }
    
    function currency_get_id($id){
         $url = api_url() . 'settings/currency'; //cari di folder config/site.php 
        //$this->list_api['url'];
        $param = array('function'=>'get_all');
        $filter=array('id'=>$id);
        $param['params']=array(
            'filter'=>$filter,
            'limit'=>1,
            'start'=>0,
            'count'=>FALSE
        );
        $result= _runApi($url, $param, FALSE);
        //echo_r($result,TRUE);
        return isset($result['data']['currency'])?$result['data']['currency']:array();
    }

}
