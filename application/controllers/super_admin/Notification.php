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
        if ($page == "edit") {
            $data["tips_id"] = $id;
            $data["detail_title_nav"] = "Detail Data";
            $data["content"] = "detail_tipstrick";
        }
        
        // Menampilkan konten
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
        if ($sql) {
            $this->session->set_flashdata('success_input', "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data berhasil disimpan. Terima kasih.</div>");
            redirect(site_url('super_admin/notification/tips_trick'));
        } else {
            $this->session->set_flashdata('warning_input', "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data gagal disimpan. Silahkan mencoba kembali! Terima kasih</div>");
            redirect(site_url('super_admin/notification/tips_trick'));
        }
    }

    public function tips_trick_ubah($id) {
        //$id = $this->input->post("id");
        $title = $this->input->post("title");
        $detail = $this->input->post("detail");

        $result = $this->notif->tips_trick_update($id, $title, $detail);
		//var_dump($result);die;
        if ($result) {
            $this->session->set_flashdata('success_ganti', "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data berhasil disimpan. Terima kasih.</div>");
            redirect(site_url('super_admin/notification/tips_trick/edit/'.$id));
        } else {
            $this->session->set_flashdata('warning_ganti', "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data gagal disimpan. Silahkan mencoba kembali! Terima kasih</div>");
            redirect(site_url('super_admin/notification/tips_trick/edit/'.$id));
        }
    }

    public function tips_trick_detail($id) {
        $data["sub_title"] = "Tips &amp; Trick";
        $data["detail_title_nav"] = "Detail Data";
        $data["tips_trick"] = $this->notif->tips_trick_detail($id);
        $data["content"] = "detail_tipstrick";

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