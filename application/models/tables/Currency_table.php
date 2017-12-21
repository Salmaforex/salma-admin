<?php
class Currency_table extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function show_currency_name() {
        $this->db->select("code");
        $this->db->from("mujur_currency");
        $stmtn = $this->db->get()->result_array();
        return $stmtn;
    }

    public function show_all_data() {
        $this->db->select("id, code, name, symbol, approved, created");
        $this->db->from("mujur_currency");
        $stmtn = $this->db->get()->result_array();
        return $stmtn;
    }

    public function show_one_data($id) {
        $this->db->where("id", $id);
        $this->db->select("id, code, name, symbol");
        $this->db->from("mujur_currency");
        $stmtn = $this->db->get()->row();
        return $stmtn;
    }

    public function insert_data($input_array) {
        foreach ($input_array as $key => $value) {
            if (!$this->db->field_exists($key, "mujur_currency")) {
                $this->reset_query();
                return FALSE;
            } else {
                $this->db->set($key, $value);
            }
        }
        $stmtn = $this->db->insert("mujur_currency", $input_array);
        return $stmtn;
    }

    public function update_Data($ubah_array) {
        foreach ($ubah_array as $key => $value) {
            if (!$this->db->field_exists($key, "mujur_currency")) {
                $this->reset_query();
                return FALSE;
            } else {
                $this->db->set($key, $value);
            }
        }
        $this->db->where('id', $ubah_array['id']);
        return $this->db->set($key, $value)->update('mujur_currency');
    }

    public function approve_data($id) {
        $this->db->where("id", $id);
        $this->db->set("id", $id);
        $this->db->set("approved", 1);
        return $this->db->update("mujur_currency");
    }

    public function disapprove_data($id) {
        $this->db->where("id", $id);
        $this->db->set("id", $id);
        $this->db->set("approved", 0);
        return $this->db->update("mujur_currency");
    }
}
