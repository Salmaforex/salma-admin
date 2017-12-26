<?php
class Login extends CI_Controller
{
    public function __contruct()
    {
        parent::__construct();
        // $this->load->model("");
    }

    public function index()
    {
        $data["title"] = "SalmaMarket | Login";
        $this->load->view("login_v", $data);
    }

    public function proses()
    {
        $this->load->model("proses/login_m", "login", TRUE);
    	$email = $this->input->post("email");
    	$password = $this->input->post("password");

    	$result = $this->login->api_process($email, $password);
    	if($result["login"]){
    		$this->session->set_userdata("u_email", $result["user"]["email"]);
    		redirect('admin/beranda');
    		// echo 'berhasil login';
    		// return TRUE;
    		// print_r($a);
    	}
    	else{
    		$this->session->set_flashdata("error_message", "<div class='alert alert-warning' role='alert' style='max-width: 500px; margin: auto;'><span class='glyphicon glyphicon-alert'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ".$result['message']." </div>");
           	redirect(base_url());
    	}

    }
}
