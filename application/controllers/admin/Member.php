<?php
class Member extends CI_Controller
{
	private $session_page;
	public function __construct() {
		parent::__construct();
		$this->session_page = $this->session->userdata("u_email");
		$this->load->model("tables/User_table", "user_tables", 'TRUE');
		$this->load->model('tables/currency_table', 'currency_tables', 'TRUE');
	}

	public function index() {
		$this->user();
	}

	public function user($page = "", $id = NULL) {
		// Session
        $data["name"] = $this->session_page;

		// Title
        $data["sub_title"] = "List User";
        $data["sub_title2"] = "Form Input";
        $data["title"] = "SalmaMarket | User";
        $data["breadcrumb_title_input"] = "List User";

        // Menampilkan data
        $data["all_user"] = $this->user_tables->user_join_currency();
		$data["currency_name"] = $this->currency_tables->show_currency_name();

        if (!isset($data["content"])) {
            $data["content"] = "user";
        }

        if($page == "edit") {
            $data["breadcrumb_title_edit"] = "Data User";
            $data["content"] = "data_currency";
        }

        // Menampilkan halaman web
        $this->load->view("admin/Main_v", $data);
	}
}
