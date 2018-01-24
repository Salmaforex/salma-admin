<?php
class Tarif_table extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function tarif_join_currency() {
		$this->db->select('mujur_currency.`created`, mujur_currency.`code` AS currency, mujur_price.`created`, mujur_price.`types`, mujur_price.`price`, mujur_price.`currency`, mujur_price.`id`');
		$this->db->from("mujur_price");
		$this->db->join('`mujur_currency`', 'mujur_currency.`code` = mujur_price.`currency`');
        $stmtn = $this->db->get()->result_array();
        return $stmtn;
	}

	public function show_one_data($id) {
		$this->db->where("mujur_price.`id`", $id);
		$this->db->select('mujur_currency.`code` AS currency, mujur_price.`types`, mujur_price.`price`, mujur_price.`currency`, mujur_price.`id`');
		$this->db->from("mujur_price");
		$this->db->join('`mujur_currency`', 'mujur_currency.`code` = mujur_price.`currency`');
        $stmtn = $this->db->get()->row();
        return $stmtn;
	}

	public function insert_data($input_array) {
		foreach ($input_array as $key => $value) {
            if (!$this->db->field_exists($key, "mujur_price")) {
                $this->reset_query();
                return FALSE;
            } else {
                $this->db->set($key, $value);
            }
        }
        $stmtn = $this->db->insert("mujur_price", $input_array);
        return $stmtn;
	}

	public function update_data($ubah_array)
    {
        foreach ($ubah_array as $key => $value) {
            if (!$this->db->field_exists($key, "mujur_price")) {
                $this->reset_query();
                return FALSE;
            } else {
                $this->db->set($key, $value);
            }
        }
        $this->db->where('id', $ubah_array['id']);
        return $this->db->set($key, $value)->update('mujur_price');
    }
}
