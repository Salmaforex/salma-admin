<?php

class Notification extends CI_Controller {
    
    private $session_page;
    
    public function __construct() {
        parent::__construct();
        $this->session_page = $this->session->userdata("u_email");
    }
    
    public function index() {
        $this->tips_trick();
    }
    
    /* ===== TIPS & TRICK ===== */
    
    public function tips_trick($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;
        
        // Title
        $data["sub_title"] = "Tips &amp; Trick";
        $data["title_tab1"] = "N/A";
        $data["title_tab2"] = "Form Input";
        $data["title"] = "SalmaMarket | Tips &amp; Trick";
        $data["breadcrumb_title_input"] = "N/A";
        
        // Menampilkan data
        
        // menampilkan konten
        if (!isset($data["content"])) {
            $data["content"] = "tips_trick";
        }
        
        // Menampilkan halaman web
        $this->load->view("super_admin/main_v", $data);
    }
    
    /* ===== NEWS ===== */
    
    public function news($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;
        
        // Title
        $data["sub_title"] = "News";
        $data["title_tab1"] = "N/A";
        $data["title_tab2"] = "Form Input";
        $data["title"] = "SalmaMarket | News";
        $data["breadcrumb_title_input"] = "N/A";
        
        // Menampilkan data
        
        // Menampilkan konten
        if (!isset($data["content"])) {
            $data["content"] = "news";
        }
        
        // Menampilkan halaman web
        $this->load->view("super_admin/main_v", $data);
    }
    
}
