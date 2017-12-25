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

class Settings_model extends CI_Model {

    public $tables, $db_main;
    private $config_db;

    public function __construct() {
        $CI = & get_instance();
        $dbload = config_load('db_salma', 'site');
        if ($dbload == '')
            $dbload = 'default';
        
        $this->config_db = $dbload;
        $this->db_main = $CI->load->database($dbload, TRUE);
        $tables = array(
            'country' => 'country',
            'currency' => 'currency',
                //    'batch_email'=>'zemail'
                //    'erase'=>'users_erase',
                //    'detail'=>'users_detail'
        );

 
        $this->load->helper('db');
        
        foreach ($tables as $name => $filename) {
            $table_name = $filename . "_table";
            $this->load->model('tables/' . $table_name);
            $this->tables[$name] = $this->$table_name->table;
        }
    }

    function country_get($id, $field = 'country_id') {
        $table = $this->tables['country'];
        $result = $this->db_main->get_where($table, array($field => $id))
                ->row_array();
        return $result;
    }

    function country_get_all() {
        $table = $this->tables['country'];
        $this->db_main->select('country_id id, country_code code,country_name name');
        return $this->db_main->get($table)->result_array();
    }

    //=============MATA UANG
    function currency_list($approve_only = true) {
        $sql = "select * from `{$this->tables['currency']}` ";
        if ($approve_only) {
            $sql.="where approved=1";
        }

        return dbFetch($sql, $this->config_db);
    }

    function currency_get($filter, $limit=100, $start=0, $count = FALSE) {
        //on progress
        //return $this->currency_list(FALSE);
         $res = array();
        $this->db_main->reset_query();
        if(isset($filter['id'])){
            $this->db_main->where('id',$filter['id']);
        }
        
        if (!isset($filter['order_by'])) {
            $this->db_main->order_by('id', 'desc');
        }
        
        $this->db_main->limit($limit, $start);
        //  $this->db_main->table($this->table );
        $sql = $this->db_main->get_compiled_select($this->tables['currency']  , FALSE);


        //$res[]=array(  $sql,json_encode($filter),$limit,$start);
        //$res = dbFetch($sql, $this->config_db);
        $res = $this->db_main->get()->result_array();
        //$sql=$this->db_main->last_query();
        //$res[]=$sql;
        $this->db_main->reset_query();
        
        return $res;
    }

    function select_currency() {
        $dt = $this->currency_list(false);
        $res = array();
        foreach ($dt as $row) {
            $res[$row['code']] = $row['name'] . ' (' . $row['symbol'] . ')';
        }

        return $res;
    }

    function currency_by_code($code) {
        $sql = "select * from `{$this->tables['currency']}` where code like '{$code}'";
        return dbFetchOne($sql);
    }

    function currency_new($data) {
        $data['deleted'] = 0;
        $data['created'] = date("Y-m-d H:i:s");
        $data['approved'] = 0;
        return dbInsert($this->tables['currency'], $data);
    }
    
    function currency_update($input,$where){
        $sql = $this->db_main->update_string($this->tables['currency'], $input, $where);
        
        return dbQuery($sql);;
    }

    function currency_approve($code) {
        $sql = "update `{$this->tables['currency']}` set approved='1' where code='$code'";
        dbQuery($sql);
        return true;
    }

    function currency_disable($code) {
        $sql = "update `{$this->tables['currency']}` set approved='0' where code='$code'";
        dbQuery($sql);
        return true;
    }

//=================Rate	
    function rate_update($raw) {
        $data = array(
            'types' => $raw['types'],
            'price' => $raw['rate'],
            'currency' => $raw['currency']
        );
        if ($raw['types'] == '' || $raw['rate'] == '')
            return false;
        $rate0 = $this->rateNow($raw['types'], $raw['currency']);

        dbInsert($this->tablePrice, $data);

        return true;
        //$this->db->insert($this->tableAPI,$data);
        //dbInsert($this->tableAPI,$data);
    }

    function rate_now($types = '', $curr = 'IDR') {
//==========Menambah mujur_price
        $types = addslashes($types);
        $sql = 'select p.id, p.price `value`, c.* from mujur_price p left join `' . $this->tableCurrency . '` c
		on p.currency=c.code
		where p.types like "' . $types . '" and p.currency="' . $curr . '"
		order by p.id desc limit 1';
        $row = dbFetchOne($sql);

        return $row;
    }

    //===================EMAIL
    function email_get_all($filter, $limit = 100, $start = 0) {
        $res = array();
        $table = $this->tables['batch_email'];
        $this->db_main->reset_query();
        if (isset($filter['where_simple'])) {
            $this->db_main->where($filter['where_simple']);
        }


        if (isset($filter['id'])) {
            $this->db_main->where('id', $filter['id']);
        }

        $this->db_main->limit($limit, $start);
        //  $this->db_main->table($this->table );
        $sql = $this->db_main->get_compiled_select($table . "", FALSE);


        //$res[]=array(  $sql,json_encode($filter),$limit,$start);
        $res = dbFetch($sql, $this->config_db);
        $this->db_main->reset_query();
        return $res;
    }

    function email_get_active() {
        $filter['where_simple'] = array('send_status' => 0);
        return $this->email_get_all($filter);
    }

    function email_get_id($id) {
        $filter = array('id' => $id);
        $row = $this->email_get_all($filter);

        return isset($row[0]) ? $row[0] : $row;
    }

    function email_send($id) {
        $table = $this->tables['batch_email'];
        $sql = "update `{$table}` set `send_status`='1' where id='$id'";
        return dbQuery($sql);
    }

}
