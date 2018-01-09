<?php

class Transaction extends CI_Controller {
    
    private $session_page;
    
    public function __construct() {
        parent::__construct();
        $this->session_page = $this->session->userdata("u_email");
    }
    
    public function index() {
        $this->tips_trick();
    }
    
    /* ===== ALL TRANSACTION ===== */
    
    public function all_transaction($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;
        
        // Title
        $data["sub_title"] = "All Transaction";
        $data["title_tab1"] = "N/A";
        $data["title_tab2"] = "Form Input";
        $data["title"] = "SalmaMarket | All Transaction";
        $data["breadcrumb_title_input"] = "N/A";
        
        // Menampilkan data
        
        // Menampilkan konten
        if (!isset($data["content"])) {
            $data["content"] = "all_transaction";
        }
        
        // Menampilkan halaman web
        $this->load->view("super_admin/main_v", $data);
    }
    
    /* ===== SUMMARY TRANSACTION ===== */
    
    public function summary_transaction($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;
        
        // Title
        $data["sub_title"] = "Summary Transaction";
        $data["title_tab1"] = "N/A";
        $data["title_tab2"] = "Form Input";
        $data["title"] = "SalmaMarket | Summary Transaction";
        $data["breadcrumb_title_input"] = "N/A";
        
        // Menampilkan data
        
        // Menampilkan konten
        if (!isset($data["content"])) {
            $data["content"] = "summary_transaction";
        }
        
        // Menampilkan halaman web
        $this->load->view("super_admin/main_v", $data);
    }
    
}
