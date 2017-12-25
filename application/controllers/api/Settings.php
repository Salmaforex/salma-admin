<?php

require_once APPPATH . '/libraries/REST_Controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Settings extends REST_Controller {

    function __construct() {
        parent::__construct();
        //    $this->load->helper('api');
        //    $this->load->database();
        $this->load->model('salma/settings_model');
        //$this->load->library('session');
        header('Access-Control-Allow-Origin: *');
        //logCreate('rest user : server'.print_r($_SERVER,1));
    }

    function currency_post($params=NULL){
        $respon=array(
            'code'=>200,
            'message'=>NULL,
            'data'=>array(),
            'raw'=>array('harus di hapus'),
            'times'=>array(date('Y-m-d H:i:s'))
        );
         
        $post = $param = $params == false ? $this->post() : $params;
        
        $filter=  isset($post['filter'])  ?$post['filter']:NULL;
        $limit =  isset($post['limit']) ?$post['filter']:NULL;; 
        $start =  isset($post['start']) ?$post['filter']:NULL;
        
        //$count = $post['count']; 
        logCreate('rest currency post ' . json_encode($post));
        
        $respon['raw'][]=$post;
        $respon['times'][]=  microtime();
        
        $data = $this->settings_model->currency_get($filter, $limit, $start);
        $respon['data']['currency']=$data;
        
        $respon['times']['end']=  microtime();        
        unset($respon['raw']);
        unset($respon['times']);
        $this->response($respon, 200);
    }
    
    function currency_add_post($params=NULL){
        $respon=array(
            'code'=>200,
            'message'=>NULL,
            'data'=>array(),
            'raw'=>array('harus di hapus'),
            'times'=>array(date('Y-m-d H:i:s'))
        );
         
        $post = $param = $params == false ? $this->post() : $params;
        
        $input=  isset($post['input'])  ?$post['input']:NULL;
        $id=isset($input['id'])?$input['id']:NULL;
        $respon['raw'][]=$post;
        $respon['times'][]=  microtime();
        if($id==NULL){
            $respon['data']['action']='insert';
            $result=$this->settings_model->currency_new($input);
        }
        else{
            $respon['data']['action']='update';
            $where='id='.$id;
            unset($input['id']);
            $filter=array('id'=>$id);
            $result=$this->settings_model->currency_update($input,$where);
        }
        
        $respon['times'][]=  microtime();
        //$count = $post['count']; 
        logCreate('rest currency post ' . json_encode($post));
        
        $data = $this->settings_model->currency_get($filter );
        $respon['data']['currency']=$data;
        
        $respon['times']['end']=  microtime();        
        unset($respon['raw']);
        unset($respon['times']);
        $this->response($respon, 200);
    }
    
}