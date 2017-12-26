<?php
class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data["title"] = "SalmaMarket | Beranda";
		$data["name"] = $this->session->userdata("u_email");
		$data["type"] = $this->session->userdata("u_type");

		if ($this->session->has_userdata('u_email')) {
			$this->load->view("admin/Main_v", $data);
		} else {
			redirect(base_url());
		}
		// print_r($this->session->userdata("email"));
	}

	public function keluar()
	{
		$this->session->unset_userdata("u_email");
		redirect(base_url());
	}
}
