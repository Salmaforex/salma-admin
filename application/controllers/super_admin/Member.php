<?php

class Member extends CI_Controller {

    private $session_page;

    public function __construct() {
        parent::__construct();
        $this->session_page = $this->session->userdata("u_email");
        $this->load->model("tables/User_table", "user_tables", TRUE);
        $this->load->model("tables/Type_table", "type_tables", TRUE);
    }

    public function index() {
        $this->user();
    }
    
    /* ===== User ===== */

    public function user($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;

        // Title
        $data["sub_title"] = "User";
        $data["title_tab1"] = "List User";
        $data["title_tab2"] = "Form Input";
        $data["title"] = "SalmaMarket | User";
        $data["breadcrumb_title_input"] = "List User";

        // Menampilkan data
        $data["all_user"] = $this->user_tables->user_join_currency();

        if (!isset($data["content"])) {
            $data["content"] = "user";
        }

        if ($page == "edit") {
            $data["breadcrumb_title_edit"] = "Data User";
            $data["content"] = "data_user";
        }

        // Menampilkan halaman web
        $this->load->view("super_admin/main_v", $data);
    }
    
    /* ===== Type ===== */

    public function type($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;

        // Title
        $data["sub_title"] = "Type";
        $data["title_tab1"] = "List Type";
        $data["title_tab2"] = "Form Input";
        $data["title"] = "SalmaMarket | Type";
        $data["breadcrumb_title_input"] = "List Type";

        // Menampilkan data
        $data["all_type"] = $this->type_tables->show_all_data();

        if (!isset($data["content"])) {
            $data["content"] = "type";
        }

        if ($page == "edit") {
            $data["breadcrumb_title_edit"] = "Data Type";
            $data["content"] = "data_type";
        }

        // Menampilkan halaman web
        $this->load->view("super_admin/main_v", $data);
    }
    
    /* ===== AGENT ===== */

    public function agent($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;

        // Title
        $data["sub_title"] = "Agent";
        $data["title_tab1"] = "List Agent";
        $data["title_tab2"] = "Form Input";
        $data["title"] = "SalmaMarket | Agent";
        $data["breadcrumb_title_input"] = "List Agent";

        // Menampilkan data

        if (!isset($data["content"])) {
            $data["content"] = "agent";
        }

        if ($page == "edit") {
            $data["breadcrumb_title_edit"] = "Data agent";
            $data["content"] = "data_agent";
        }

        // Menampilkan halaman web
        $this->load->view("super_admin/main_v", $data);
    }

}
