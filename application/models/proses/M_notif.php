<?php
class M_notif extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->helper('basic_helper');
    }

    public function tips_trick_all($start = 0, $limit = 10) {
        $url = api_url() . "messages/tips_trik";
        $param = array("action" => "list");
        $param['params'] = array(
            'start' => $start,
            'limit' => $limit
        );
            
        $result= _runApi($url, $param, FALSE);
        // print_r($result);
        return isset($result['data']['tips'])?$result['data']['tips']:array();
    }

    public function tips_trick_detail($id) {
        $url = api_url() . "messages/tips_trik?tips_id=".$id; 
        $result= _runApi($url);//,array(),TRUE); //ini GET bukan POST
        print_r($result);
        return isset($result['data']['tips'])?$result['data']['tips']:array();
    }

    public function tips_trick_new($title, $detail) {
        $url = api_url() . "messages/tips_trik";
        $param = array(
            'action' => 'new',
            'title' => $title,
            'detail' => $detail
        );
       
        $result= _runApi($url, $param, FALSE);
        return isset($result['data']['tips'])?$result['data']['tips']:FALSE;
    }

    public function tips_trick_update($id, $title, $detail) {
        $url = api_url() . "messages/tips_trik";
        $param = array(
            "show" => 1,
            "id" => $id,
            'title' => $title,
            'detail' => $detail,
            'action' => 'update'
        );
       
        $result= _runApi($url, $param, FALSE);
        return isset($result['data']['tips'])?$result['data']['tips']:FALSE;
    }
}