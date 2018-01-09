<?php

class User_table extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function user_join_currency() {
        $this->db->limit(100);
        $this->db->select("mujur_users.`u_id`, mujur_users.`u_email`, mujur_users.`u_modified`, mujur_users.`u_currency`, mujur_users.`u_status`");
        $this->db->from("mujur_users");
        $stmtn = $this->db->get()->result_array();
        return $stmtn;
    }

}
