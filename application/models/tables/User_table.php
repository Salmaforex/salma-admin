<?php
class User_table extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function user_join_currency() {
		$this->db->limit(5);
		$this->db->select("mujur_users.`u_id`, mujur_users.`u_email`, mujur_users.`u_modified`, mujur_users.`u_currency`, mujur_currency.`code`");
		$this->db->from("mujur_users");
		$this->db->join('`mujur_currency`', 'mujur_currency.`code` = mujur_users.`u_currency`');
        $stmtn = $this->db->get()->result_array();
        return $stmtn;
	}
}
