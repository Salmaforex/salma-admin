<?php
class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('parser');
	}

	public function index()
	{
		$data["title"] = "SalmaMarket | Beranda";
		$data["name"] = $this->session->userdata("u_email");
		if ($this->session->has_userdata('u_email')) {
			$this->load->view("admin/main_v", $data);
		} else {
			echo "B";
		}

		// print_r($this->session->userdata("email"));
	}

	public function keluar()
	{

	}
}

