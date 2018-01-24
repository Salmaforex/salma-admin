<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
  public $table='mujur_users';
  public $table_erase='mujur_users_erase';
  public $tableDocument='mujur_usersdocument';
  public $tableDetail='mujur_usersdetail';
  public $tabletype='mujur_userstype';
  public $table_erase_user='';
 */
defined('BASEPATH') OR exit('No direct script access allowed');
if (function_exists('logFile')) {
    logFile('model', 'users_model.php', 'model');
};

class Users_model extends CI_Model {

    public $table = 'mujur_users';
    public $table_erase = 'mujur_users_erase';
    public $tableDocument = 'mujur_usersdocument';
    public $tableDetail = 'mujur_usersdetail';
    public $tabletype = 'mujur_userstype';
    public $table_erase_user = '';
    public $table_register = 'mujur_register';
    public $tables;
    private $db_main;
    private $config_db;

    public function __construct() {
        parent::__construct();
        $dbload = config_load('db_salma', 'site');
        if ($dbload == '')
            $dbload = 'default';
        $this->config_db = $dbload;
        $this->db_main = $this->load->database($dbload, TRUE);
        $this->load->helper('db');
        $tables = array(
            'main' => 'salma_users',
            //    'erase'=>'users_erase',
            'detail' => 'users_detail'
        );

        foreach ($tables as $name => $filename) {
            $table_name = $filename . "_table";
            $this->load->model('tables/' . $table_name);
            $this->tables[$name] = $this->$table_name->table;
        }

        $this->load->model('salma/settings_model');
    }

    function exist_email($email) {
        $table = $this->tables['main'];
        $result = $this->db_main->select("count(*) c")->get_where($table, array('u_email' => $email))
                ->row_array();
        return $result['c'] == 1 ? true : false;
    }

    function check_login($username, $password) {
        log_add('check login NEW');
        $res = $this->check_login_new($username, $password);
        if ($res == TRUE)
            return TRUE;

        //=============
        log_add('check login OLD');
        $res = $this->check_login_old($username, $password);
        if ($res == TRUE)
            return TRUE;

        return FALSE;
    }

    function check_login_old($username, $password) {
        $table = $this->tables['main'];
        $data = $this->gets($username);
        if ($data == false)
            return false;
        $tmp = explode("|", $data['password']);
        logCreate(json_encode($tmp));
        $keys = isset($tmp[1]) ? $tmp[1] : null;
        $pass = sha1("{$password}|{$keys}") . "|" . $keys;
        $sql = "select count(*) c from {$table} 
        where u_email like '{$username}'
        and u_password like '{$pass}'
        and u_status=1";

        $res = dbFetchOne($sql, $this->config_db, 1);

        return $res['c'] == 1 ? true : false;
    }

    function check_login_new($username, $password) {
        $user = $this->gets($username);
        $password_hash = $user['password'];
        $result = password_verify($password, $password_hash);
        return $result;
    }

    function update_password($email, $password) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $data = array('u_password' => $password_hash);
        $where = "u_email='" . addslashes($email) . "'";
        $str = $this->db_main->update_string($this->table, $data, $where);
        dbQuery($str);
        return true;
    }

    function gets($id, $field = 'u_email') {
        $filter = array('get_all' => array($field, $id));
        $result = $this->get_data($filter);
        return isset($result[0]) ? $result[0] : $result;

        $table = $this->tables['main'];
        $result = $this->db_main->get_where($table, array($field => $id))
                ->row_array();
        return $result;
    }

    function getDetail($id, $simple = false, $field = 'ud_email') {
        return $this->get_detail($id, $field, $simple);
    }

    function get_detail($id, $field = 'ud_email', $simple = false) {
        $table = $this->tables['detail'];
        $sql = "select ud_email, ud_detail from {$table} where `$field`='$id'";
        $res = dbFetchOne($sql);
        $respon = array();
        $respon = json_decode($res['ud_detail'], true);
        $email = $res['ud_email']; //unset($res['u_detail']);
        if ($simple)
            return $respon;
        /*
          $sql="select udoc_status status from {$this->tableDocument} where `udoc_email` like '$email'";
          if($email=='' && $field=='ud_email')
          $email=$id;
          $this->addNullDocument($email);
          $res= $this->document($email);//dbFetchOne($sql);
          $respon['document']=$res;
         */
        $respon['users'] = $user_main = $this->gets($email);
        $respon['email'] = $email;
        if ($email == '')
            return $respon;

        $respon['typeMember'] = isset($user_main['type_user']) ? $user_main['type_user'] : null;
        $respon['statusMember'] = $user_main['u_status'] == 1 ? 'ACTIVE' : 'NOT ACTIVE';
        //==========CITIZEN ?
        $citizen = isset($respon['citizen']) ? $respon['citizen'] : false;
        if ($citizen) {
            $respon['country'] = $this->settings_model->country_get($citizen);
        }

        return $respon;
    }

    function exist_data($search, $limit = 10, $field = 'u_email') {
        $sql = 'select u_id from `' . $this->table . '` where `' . $field . '` like \'' . $search . '\'
	limit ' . $limit; //preventif
        logCreate("users_model exist:" . $sql);
        $res = dbFetch($sql, $this->config_db);
        if ($res == false || count($res) == 0) {
            logCreate('kosong');
            return false;
        }

        $res = array(
            'count' => count($res),
            'data' => $res
        );
        return $res;
    }

    function exist($search, $field = 'u_email') {
        $table = $this->tables['main'];
        $this->db_main->reset_query();
        $this->db_main->select('count(*) c')->where($field, $search);
        $res = $this->db_main->get($table)->row_array();
        return $res['c'] == 0 ? FALSE : TRUE;
    }

    function get_data($filter, $limit = 10, $start = 0) {
        $res = array();
        $this->db_main->reset_query();
        $this->db_main->join($this->tabletype . " as ut", 'u.u_type=ut.ut_id', 'left');
        //$this->db->join($this->table_register." as reg",'reg.reg_email=u.u_email','left');//reg_email

        if (isset($filter['get_all'])) {
            $this->db_main->select('u_id id, u_email email,u_status status, ut.ut_name `type_user`');
            $this->db_main->select('u_type type,u_mastercode mastercode, u_currency currency, u_password password');
            $this->db_main->where($filter['get_all'][0], $filter['get_all'][1]);
        }

        if (isset($filter['show_fields'])) {
            $this->db_main->select($filter['show_fields']);
        }

        if (!isset($filter['order_by'])) {
            $this->db_main->order_by('u_id', 'desc');
        }

        if (!isset($filter['where_simple'])) {
            
        }

        $this->db_main->limit($limit, $start);
        //  $this->db_main->table($this->table );
        $sql = $this->db_main->get_compiled_select($this->table . " as u", FALSE);


        //$res[]=array(  $sql,json_encode($filter),$limit,$start);
        $res = dbFetch($sql, $this->config_db);
        $this->db_main->reset_query();
        return $res;
    }

}
