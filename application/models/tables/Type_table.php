<?php

class Type_table extends CI_model {

    public function __construct() {
        parent::__construct();
    }

    public function show_all_data() {
        $this->db->select("ut_id, ut_name, modified");
        $this->db->from("mujur_userstype");
        $stmtn = $this->db->get()->result_array();
        return $stmtn;
    }

}
