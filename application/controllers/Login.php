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
        $data["title"] = "Salma Market | Login";
        $data['error_message']=$this->session->userdata("error_message");
        $this->session->set_userdata("error_message",FALSE);
        $this->load->view("login_v", $data);
    }

    public function proses()
    {
    	$this->load->model("login_m");
    	$email = $this->input->post("email");
    	$password = $this->input->post("password");

    	$result = $this->login_m->api_process($email, $password);
    	if($result["login"]){
    		$this->session->set_userdata("u_email", $result["user"]["email"]);
    		
    		// echo 'berhasil login';
    		redirect('admin/beranda');
    		// return TRUE;
    		// print_r($a);
    	}
    	else{
            $this->session->set_userdata("error_message", $result["message"]);
            redirect('login/index');
            
    		echo 'gagal <pre>'.$result['message'];
    	}

    }
}

