<?php

class Notification extends CI_Controller {
    
    private $session_page;
    
    public function __construct() {
        parent::__construct();
        $this->load->model("proses/M_notif", "notif", TRUE);
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

    public function tips_trick_input() {
        $title = $this->input->post("title");
        $detail = $this->input->post("detail");

        $sql = $this->notif->tips_trick_new($title, $detail);
        print_r($sql["code"]);
        // print_r($sql);
        // echo "<pre>";
        // print_r($sql);
        // echo "</pre>";
        // if ($sql) {
        //     $this->session->set_flashdata('success_input', "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data berhasil disimpan. Terima kasih.</div>");
        //     redirect(site_url('super_admin/notification/tips_trick'));
        // }
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