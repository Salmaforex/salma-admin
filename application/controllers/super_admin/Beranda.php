<?php

class Beranda extends CI_Controller {
    
    private $session_page;
    
    public function __construct() {
        parent::__construct();
        $this->session_page = $this->session->userdata("u_email");
    }

    public function index() {
        // Session
        $data["name"] = $this->session_page;
        
        // Title
        $data["title"] = "SalmaMarket | Beranda";
        
        // Menampilkan konten
        $data["content"] = "dashboard";

        $this->load->view('super_admin/main_v', $data);
    }

}
