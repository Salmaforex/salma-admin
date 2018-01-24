<?php
class Keuangan extends CI_Controller
{
    private $session_page;
    public function __construct() {
        parent::__construct();
        $this->session_page = $this->session->userdata("u_email");
        $this->load->model('proses/keuangan_m','keuangan', TRUE);
        /***
         * Model tables itu untuk nama table.. 
         * seharusnya tidak ada fungsi tambahan di dalamnya
        $this->load->model('tables/tarif_table', 'tarif_tables', 'TRUE');
        $this->load->model('tables/currency_table', 'currency_tables', 'TRUE');
         * 
         */
    }

    public function index() {
        $this->currency();
    }

    public function currency($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;
        $data["currency_id"] = $id;

        // Title
        $data["sub_title"] = "List Currency";
        $data["sub_title2"] = "Form Input";
        $data["title"] = "SalmaMarket | Currency";
        $data["breadcrumb_title_input"] = "List Currency";
/****
 * TIDAK PERLU DILAKUKAN DISINI. DATA JALANKAN DI VIEW
        // Menampilkan data
        $data["all_currency"] = $this->currency_tables->show_all_data();
        $data["one_currency"] = $this->currency_tables->show_one_data($id);
*/
        if (!isset($data["content"])) {
            $data["content"] = "currency";
        }

        if($page == "edit") {
            $data["breadcrumb_title_edit"] = "Data Currency";
            $data["content"] = "data_currency";
        }

        // Menampilkan halaman web
        $this->load->view("admin/Main_v", $data);
    }

    public function currency_input($id = NULL) {
        $code = $this->input->post("code");
        $name = $this->input->post('name');
        $symbol = $this->input->post('symbol');

        $input_array = array(
            'id'=>$id,
            'code' => $code,
            'name' => $name,
            'symbol' => $symbol
        );
        
        $sql = $this->keuangan->currency_add($input_array);
        //echo_r($sql,TRUE);die('stop');
        if ($sql) {
            $this->session->set_flashdata('success', 
                    "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data berhasil disimpan. Terima kasih.</div>");
            redirect(site_url('admin/keuangan'));
        } else {
            $this->session->set_flashdata('success', 
                    "<div class='alert alert-warning' role='alert'><span class='glyphicon glyphicon-alert'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data gagal disimpan. Silahkan mencoba kembali. Terima kasih.</div>");
            redirect(site_url('admin/keuangan'));
        }
    }

    public function currency_ubah($id) {
        $this->currency_input($id);
        exit;
    /*    
        $id = $this->input->post("id");
        $code = $this->input->post("code");
        $name = $this->input->post('name');
        $symbol = $this->input->post('symbol');

        $ubah_array = array(
            'id' => $id,
            'code' => $code,
            'name' => $name,
            'symbol' => $symbol
        );
        $sql = $this->currency_tables->update_Data($ubah_array);
        if ($sql) {
            $this->session->set_flashdata('success', 
                    "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data berhasil diubah. Terima kasih.</div>");
            redirect(site_url('admin/keuangan'));
        } else {
            $this->session->set_flashdata('success', 
                    "<div class='alert alert-warning' role='alert'><span class='glyphicon glyphicon-alert'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data gagal disimpan. Silahkan mencoba kembali. Terima kasih.</div>");
            redirect(site_url('admin/keuangan'));
        }
     * 
     */
    }

    public function currency_approve($id)
    {
        //$sql = $this->currency_tables->approve_data($id);
        $input_array = array(
            'id'=>$id,
            'approved' => 1
        );
        
        $sql = $this->keuangan->currency_add($input_array);
        if ($sql) {
            $this->session->set_flashdata('approve_success', 
                    "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Approve berhasil dilakukan. Terima kasih.</div>");
            redirect(site_url('admin/keuangan'));
        }
    }

    public function currency_disapprove($id)
    {
       // $sql = $this->currency_tables->disapprove_data($id);
        $input_array = array(
            'id'=>$id,
            'approved' => 0
        );
        
        $sql = $this->keuangan->currency_add($input_array);
        if ($sql) {
            $this->session->set_flashdata('disapprove_success', 
                    "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Disapprove berhasil dilakukan. Terima kasih.</div>");
            redirect(site_url('admin/keuangan'));
        }
    }

    /* ===== TARIF ===== */
    public function tarif($page = "", $id = NULL) {
        // Session
        $data["name"] = $this->session_page;

        // Title
        $data["sub_title"] = "List Tarif";
        $data["sub_title2"] = "Form Input";
        $data["title"] = "SalmaMarket | Tarif";
        $data["breadcrumb_title_input"] = "List Tarif";

        // Menampilkan data
        $data["one_tarif"] = $this->tarif_tables->show_one_data($id);
        $data["all_tarif"] = $this->tarif_tables->tarif_join_currency();
        $data["currency_name"] = $this->currency_tables->show_currency_name();

        if (!isset($data["content"])) {
            $data["content"] = "tarif";
        }

        if($page == "edit") {
            $data["breadcrumb_title_edit"] = "Data Tarif";
            $data["content"] = "data_tarif";
        }

        // Menampilkan halaman web
        $this->load->view("admin/Main_v", $data);
    }

    public function tarif_input() {
        $code = $this->input->post("code");
        $price = $this->input->post('price');
        $currency = $this->input->post('currency');

        $ubah_array = array(
            'types' => $code,
            'price' => $price,
            'currency' => $currency
        );
        $sql = $this->tarif_tables->insert_data($ubah_array);
        if ($sql) {
            $this->session->set_flashdata('success_input', "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data berhasil diubah. Terima kasih.</div>");
            redirect(site_url('admin/keuangan/tarif'));
        } else {
            $this->session->set_flashdata('warning_input', "<div class='alert alert-warning' role='alert'><span class='glyphicon glyphicon-alert'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data gagal disimpan. Silahkan mencoba kembali. Terima kasih.</div>");
            redirect(site_url('admin/keuangan/tarif'));
        }
    }

    public function tarif_ubah() {
        $id = $this->input->post("id");
        $types = $this->input->post("types");
        $price = $this->input->post('price');

        $ubah_array = array(
            'id' => $id,
            'types' => $types,
            'price' => $price
        );
        $sql = $this->tarif_tables->update_data($ubah_array);
        if ($sql) {
            $this->session->set_flashdata('success_ubah', "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data berhasil diubah. Terima kasih.</div>");
            redirect(site_url('admin/keuangan/tarif'));
        } else {
            $this->session->set_flashdata('warning_ubah', "<div class='alert alert-warning' role='alert'><span class='glyphicon glyphicon-alert'></span><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Data gagal disimpan. Silahkan mencoba kembali. Terima kasih.</div>");
            redirect(site_url('admin/keuangan/tarif'));
        }
    }
}
