<?php

require_once APPPATH . '/libraries/REST_Controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Users extends REST_Controller {

    function __construct() {
        parent::__construct();
        //    $this->load->helper('api');
        //    $this->load->database();
        $this->load->model('salma/users_model');
        //$this->load->library('session');
        header('Access-Control-Allow-Origin: *');
        //logCreate('rest user : server'.print_r($_SERVER,1));
    }

    /* ---------- */

    function detail_post() {
        $param = $this->post();
        $respon['raw'] = array($param);
        $respon['err_code'] = FALSE; //wajib ada
        $respon['message'] = NULL; //wajib ada

        $target = isset($param['email']) ? $param['email'] : FALSE;
        if ($target == FALSE) {
            $respon['exist'] = FALSE;
            $respon['user'] = FALSE;
            $respon['user_detail'] = FALSE;
            $this->response($respon, 200);
        }

        $fields = isset($param['field']) ? $param['field'] : 'u_email';
        $exist = $this->users_model->exist($target, $fields);

        $filter = array('get_all' => array($fields, $target));
        $respon['exist'] = $exist;
        $respon['user'] = $exist ? $this->users_model->gets($target) : FALSE;
        $respon['user_detail'] = $exist ? $this->users_model->getDetail($target, TRUE) : FALSE;

        unset($respon['raw']);
        $this->response($respon, 200);
    }

    function exist_post() {
        $param = $this->post();
        $respon['raw'] = array($param);
        $respon['err_code'] = FALSE; //wajib ada
        $respon['message'] = NULL; //wajib ada
        $target = isset($param['email']) ? $param['email'] : '';
        $fields = isset($param['field']) ? $param['field'] : 'u_email';
        if ($target == FALSE) {
            $respon['exist'] = FALSE;
            $respon['user'] = FALSE;
            $this->response($respon, 200);
        }

        $exist = $this->users_model->exist($target, $fields);

        $filter = array('get_all' => array($fields, $target));
        $respon['exist'] = $exist;
        $respon['users'] = $exist ? $this->users_model->get_data($filter, 30) : FALSE;

        unset($respon['raw']);
        $this->response($respon, 200);
    }

    function login_post() {
        $param = $this->post();
        $respon = array(
            'login' => FALSE,
            'err_code' => NULL,
            'message' => NULL,
            'user' => FALSE,
            'user_detail' => FALSE
        );

        $respon['raw'] = array($param);
        $respon['err_code'] = FALSE; //wajib ada
        $respon['message'] = NULL; //wajib ada
        $username = isset($param['email']) ? $param['email'] : '';
        $password = isset($param['password']) ? $param['password'] : 'u_email';

        $exist = $this->users_model->exist($username);
        if (!$exist) {
            $respon['err_code'] = 1;
            $respon['message'] = 'Username not exist';
            unset($respon['raw']);
            $this->response($respon, 200);
        }

        log_add('check login start');
        $status = $this->users_model->check_login($username, $password);
        $respon['login'] = $status;
        log_add('check login end');
        $check_login = $respon['raw'][] = $this->users_model->check_login_old($username, $password);
        if ($check_login) {
            $this->users_model->update_password($username, $password);
        }

        if ($status) {
            unset($respon['raw']);
            $respon['user'] = $this->users_model->gets($username);
            $respon['user_detail'] = $exist ? $this->users_model->getDetail($username, TRUE) : FALSE;
            $this->response($respon, 200);
        }

        $respon['err_code'] = 2;
        $respon['message'] = 'Username or password not match';


        $respon['raw']['old'] = $this->users_model->check_login_old($username, $password);
        $respon['raw']['new'] = $this->users_model->check_login_new($username, $password);
        $respon['raw'][] = $this->users_model->gets($username);
        unset($respon['raw']);

        $this->response($respon, 200);
    }

    /* ---------- */

    function index_post($params = false) {
        $post = $param = $params == false ? $this->post() : $params;
        logCreate('rest user post ' . json_encode($post));
        $noAPI = false;
        if ($params != false)
            $noAPI = true;
        unset($params);
        $function = isset($post['function']) ? 'user_' . $post['function'] : 'fail';
        $res = array('message' => 'unknown', 'param' => $post);

        if (method_exists($this, $function)) {
            $data = isset($post['data']) ? $post['data'] : array();

            logCreate('rest|users| function (start): ' . $function);
            logCreate('rest|users| data: ' . json_encode($data));
            $res = $this->$function($data);
            logCreate('rest|users| function (end): ' . $function);
            if (isset($res['rest_code'])) {
                $code = $res['rest_code'];
                unset($res['rest_code']);
            } else {
                $code = 200;
            }

            $param['function'] = $function;
            $param[] = date("Y-m-d H:i:s");
            logCreate($res);
            //save_and_send_rest($code,$res,$param);
        } else {
            logCreate("rest/users |$function |tidak diketahui");
            $res['message'] = 'fungsi tak diketahui';
            $res['target'] = $function;
            $param[] = date("Y-m-d H:i:s");
            //save_and_send_rest(204,$res,$param);
            $code = 204;
        }

        if ($noAPI) {
            return array($code, $res, $param);
        } else {
            save_and_send_rest($code, $res, $param);
        }
    }

    private function user_exist($param) {
        $target = isset($param[0]) ? $param[0] : '';
        $fields = isset($param[1]) ? $param[1] : 'u_email';
        logCreate('param:' . json_encode($param));
        $res = $this->users_model->exist($target, 5, $fields);

        return $res;
    }

    private function user_erase($param) {
        if (defined('LOCAL')) {
            $target = isset($param[0]) ? $param[0] : '';
            $fields = isset($param[1]) ? $param[1] : 'u_email';
            logCreate('rest|users| erase:' . $target);
            $res = $this->users_model->erase($target);
            return $res;
        } else {
            return false;
        }
    }

    private function register($param) {
        $res['users'] = $this->users_model->register($param);
        $message = 'unknown';
        $res['message'] = $message;
        $email_data = array(
            'username' => $param['email'],
            'email' => $param['email'],
            'masterpassword' => $res['users']['masterpassword']
        );
        $this->load->view('email/emailRegister_email', $email_data);
        $this->users_model->active_email($param['email']);
        return $res;
    }

    private function user_login($params) {
        $username = $params[0];
        $password = $params[1];
        $status = $this->users_model->checkLogin($username, $password);
        if ($status === true) {
            $respon = array('valid' => true);
            $respon['password'] = $this->users_model->gets($username)['u_password'];
            $respon['param'] = $params;
        } else {
            $respon = array('valid' => false);
            $respon['password'] = sha1("$password|zzzz") . "|zzzz";
        }
        return $respon;
    }

    private function user_login_check($params) {
        $username = isset($params[0]) ? $params[0] : false;
        $password = isset($params[1]) ? $params[1] : false;
        if ($username == false) {
            $respon = array('valid' => false);
            $respon['password'] = null;
            return $respon;
        }

        $exist = $this->users_model->exist($username, 2);
        logCreate('exist:' . json_encode($exist));
        $status = $this->users_model->login_check($username, $password);
        if ($status == true) {
            $respon = array('valid' => true);
            $respon['password'] = $this->users_model->gets($username)['u_password'];
        } else {
            $respon = array('valid' => false);
            $respon['password'] = null; //sha1("$password|zzzz")."|zzzz";
        }
        $respon['status'] = $status;
        return $respon;
    }

    private function user_loginCheck($params) {
        return $this->user_login_check($params);
    }

    private function user_detail($params) {
        $username = $params[0];
        $respon['users'] = $users = $this->users_model->gets($username);
        $detail = $this->users_model->getDetail($username);
        foreach ($detail as $name => $val) {
            $respon[$name] = $val;
        }
        if (!isset($respon['balance'])) {
            //=========
            $respon['totalBalance'] = '---';
        }

        $respon['users'] = $users;
        //$respon['param']=$params;
        return $respon;
    }

    private function user_get_id($params) {
        $id = $params[0];
        $respon['users'] = $users = $this->users_model->gets($id, 'u_id');
        $username = $users['u_email'];
        $detail = $this->users_model->getDetail($username);
        foreach ($detail as $name => $val) {
            $respon[$name] = $val;
        }
        $respon['users'] = $users;
        //$respon['param']=$params;
        return $respon;
    }

    private function user_update_password($params) {
        $pass = $params['password'];
        $email = $params['email'];
        $respon = array('base' => 'sha1("$password|zzzz")."|zzzz"');
        $respon['chip'] = $row = $this->password_model->random(1);
        $chip = $row[0]['password'];
        $respon['password'] = $pass_sha1 = sha1("{$pass}|{$chip}") . "|" . $chip;
        //$respon['p']=$params;
        $this->users_model->updatePass($email, $pass_sha1);
        return $respon;
    }

    private function user_update_master_password($params) {
        $pass = $params['password'];
        $email = $params['email'];

        $respon['password'] = $pass;
        //$respon['p']=$params;
        $this->users_model->updateMasterPass($email, $pass);
        return $respon;
    }

    private function user_nullDetail($params) {
        $email = $params[0];
        $res = $this->users_model->addNullDetail($email);
        return $res;
    }

    private function user_token($params) {
        $username = $params[0];
        $respon = array('param' => $params, 'token' => '');
        $users = $this->users_model->gets($username);
        $detail = $this->users_model->getDetail($username);
        foreach ($detail as $name => $val) {
            $respon[$name] = $val;
        }
        if (!isset($respon['balance'])) {
            //=========
            $respon['totalBalance'] = '---';
        }

        $respon['username'] = $username;
        $respon['users'] = $users;
        $respon['token'] = $this->localapi_model->token_save($respon);

        return $respon;
    }

}
