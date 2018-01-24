<?php

class Report extends CI_Controller {
    
    private $session_page;
    
    public function __construct() {
        parent::__construct();
        $this->session_page = $this->session->userdata("u_email");
    }
    
    public function index() {
        $this->tips_trick();
    }
    
    /* ===== SOLUTION ===== */
    
    public function solution($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;
        
        // Title
        $data["sub_title"] = "Solution";
        $data["title_tab1"] = "N/A";
        $data["title_tab2"] = "Form Input";
        $data["title"] = "SalmaMarket | Solution";
        $data["breadcrumb_title_input"] = "N/A";
        
        // Menampilkan data
        
        // Menampilkan konten
        if (!isset($data["content"])) {
            $data["content"] = "solution";
        }
        
        // Menampilkan halaman web
        $this->load->view("super_admin/main_v", $data);
    }
    
    /* ===== WARNING ===== */
    
    public function warning($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;
        
        // Title
        $data["sub_title"] = "Warning";
        $data["title_tab1"] = "N/A";
        $data["title_tab2"] = "Form Input";
        $data["title"] = "SalmaMarket | Warning";
        $data["breadcrumb_title_input"] = "N/A";
        
        // Menampilkan data
        
        // Menampilkan konten
        if (!isset($data["content"])) {
            $data["content"] = "warning";
        }
        
        // Menampilkan halaman web
        $this->load->view("super_admin/main_v", $data);
    }
    
}
