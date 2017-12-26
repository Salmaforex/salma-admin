<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 */

function logCreate($text = '') {
    log_message('debug', $text);
    /*
      saya hapus aja selain text
      ini fungsi untuk nulis log aja..
      hasil tulisannya ada di folder
     */
    return TRUE;
}

function log_add($text = '') {
    return TRUE;
}

function logConfig() {
    return TRUE;
}

function api_url(){
     $api_url=config_load('api_url', 'site');
     return $api_url!=''?$api_url:base_url()."index.php/api/";

}

if (!function_exists('_runApi_old')) {

    function _runApi_old($url, $parameter = array(), $debug = FALSE) {
        global $maxTime;
        if ($maxTime == null)
            $maxTime = 10;
        if (isset($parameter['maxTime']))
            $maxTime = $parameter['maxTime'];
        //log_info_table('run_api',array('old',$url,count($parameter) ));

        $CI = & get_instance();
        $dtAPI = array('url' => $url);
        if (count($parameter)) {
            $logTxt = "func:_runApi| url:{$url}| param:" . http_build_query($parameter, '', '&');
        } else {
            $logTxt = "func:_runApi| url:{$url}";
            $parameter['info'] = 'no post';
        }
        //$parameter[]=array('server'=>$_SERVER);
        $dtAPI['parameter'] = json_encode($parameter);
        logCreate('API: ' . $logTxt);

        if (count($parameter)) {
            logCreate('API: ' . "url:{$url}| param:\n" . print_r($parameter, 1), 'debug');
        } else {
            logCreate('API: param:' . print_r(parse_url($url), 1), 'debug');
        }
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($parameter != '' && count($parameter) != 0) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, $maxTime);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($parameter, '', '&'));
            //curl_setopt($ch, CURLOPT_POSTFIELDS, array('file' => '@/path/to/file.ext');
            //if( isset($_SERVER['HTTP_USER_AGENT']) )
            //	curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
            logCreate('API:POST', 'info');
        } else {
            logCreate('API:GET', 'info');
        }
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        $response = curl_exec($curl);

        if (0 != curl_errno($curl)) {
            $response = new stdclass();
            $response->code = '500';
            $response->message = curl_error($curl);
            $response->maxTime = $maxTime;
            $dtAPI['response'] = json_encode($response);
            $dtAPI['error'] = 1;
        } else {
            $response0 = $response;
            $dtAPI['response'] = $response;
            $dtAPI['error'] = 0;
            $response = json_decode($response, 1);
            if (!is_array($response)) {
                $response = $response0;
                $dtAPI['error'] = 1;
            } else {
                $dtAPI['error'] = 0;
            }
        }

        curl_close($curl);
        if (!isset($response0))
            $response0 = '?';
        logCreate('helper| API| url:' . $url . "|raw:" . (is_array($response) ? 'total array/obj=' . count($response) : $response0 ));

        //$CI->db->insert($CI->forex->tableAPI,$dtAPI);
        //$sql=$CI->db->insert_string($CI->forex->tableAPI, $dtAPI);
        //dbQuery($sql);
        return $debug ? array($url, $parameter, 'response' => $response) : $response;
    }

} else {
    
}

if (!function_exists('_runApi')) {

    function _runApi($url, $parameter = array(), $debug = FALSE) {
        global $maxTime;
        if ($maxTime == null){
            $maxTime = 10;
        }
        if (isset($parameter['maxTime'])){
            $maxTime = $parameter['maxTime'];
        }
        //log_info_table('run_api',array('old',$url,count($parameter) ));

        $CI = & get_instance();
        $dtAPI = array('url' => $url);
        if (count($parameter)) {
            $logTxt = "func:_runApi| url:{$url}| param:" . http_build_query($parameter, '', '&');
        } else {
            $logTxt = "func:_runApi| url:{$url}";
            $parameter['info'] = 'no post';
        }
        //$parameter[]=array('server'=>$_SERVER);
        $dtAPI['parameter'] = json_encode($parameter);
        logCreate('API: ' . $logTxt);

        if (count($parameter)) {
            logCreate('API: ' . "url:{$url}| param:\n" . print_r($parameter, 1), 'debug');
        } else {
            logCreate('API: param:' . print_r(parse_url($url), 1), 'debug');
        }
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($parameter != '' && count($parameter) != 0) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, $maxTime);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($parameter, '', '&'));
            //curl_setopt($ch, CURLOPT_POSTFIELDS, array('file' => '@/path/to/file.ext');
            //if( isset($_SERVER['HTTP_USER_AGENT']) )
            //	curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
            logCreate('API:POST', 'info');
        } else {
            logCreate('API:GET', 'info');
        }
        
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        $response = curl_exec($curl);

        if (0 != curl_errno($curl)) {
            $response = new stdclass();
            $response->code = '500';
            $response->message = curl_error($curl);
            $response->maxTime = $maxTime;
            $dtAPI['response'] = json_encode($response);
            $dtAPI['error'] = 1;
        } else {
            $response0 = $response;
            $dtAPI['response'] = $response;
            $dtAPI['error'] = 0;
            $response = json_decode($response, 1);
            if (!is_array($response)) {
                $response = $response0;
                $dtAPI['error'] = 1;
            } else {
                $dtAPI['error'] = 0;
            }
        }

        curl_close($curl);
        if (!isset($response0)){
            $response0 = '?';
        }
        
        logCreate('helper| API| url:' . $url . "|raw:" . (is_array($response) ? 'total array/obj=' . count($response) : $response0 ));

        return $debug ? array($url, $parameter, 'response' => $response,'raw'=>$response0) : $response;
    }

} else {
    
}

if (!function_exists('config_loads')) {

    function config_load($name = 'test', $header = FALSE) {
        $CI = & get_instance();
        if ($header) {
            $CI->config->load($header, TRUE);
            $value_config = $CI->config->item($name, $header);
        } else {
            $value_config = $CI->config->item($name);
        }
        //print_r($value_config);
        return $value_config;
    }

}

function echo_r($arr,$show=FALSE) {
    if($show){
        echo '<pre>' . print_r($arr, 1) . '</pre>' ;
        return TRUE;
    }
    echo is_local() ? '<pre>' . print_r($arr, 1) . '</pre>' : NULL;
}

function js_goto($url, $time = 0) {
    if ($time == 0) {
        echo "<script>window.location.href = '{$url}';</script>";
    } else {
        $time_miliseconds = $time * 1000;
        echo '<script>
		setTimeout(function(){
    window.location.href = "' . $url . '";
}, ' . $time_miliseconds . ');</script>';
    }
    die;
}

function js_new_window($url) {
    echo "<script>window.open('{$url}');</script>";
}

function is_local() {
    $return = is_file(APPPATH . '../default.php'); // ? TRUE : FALSE;
    //var_dump($return);
    return $return;
}

if (!function_exists('driver_run')) {

    function driver_run($driver_core, $driver_name, $func_name = 'executed', $params = array()) {
        log_add("driver_run |$driver_core, $driver_name, $func_name");
        $result = array('code' => 0, 'data' => false, 'messages' => '');
        /* no drivers core =============================== */
        $core_file = ucfirst(strtolower($driver_core));
        if (!is_file(APPPATH . 'libraries/' . $core_file . '/' . $core_file . ".php")) {
            $result['messages'] = !is_local() ? 'no core driver file' : 'buatlah core drivernya di:' . APPPATH . 'libraries/' . $core_file . '/' . $core_file . ".php";
            $result['error'] = 100;
            log_add($result, 'driver_run');
            return $result;
        }

        $CI = & get_instance();


        // log_add("run driver: $driver_core| $driver_name| $func_name");
        // log_add("parameter:".count($params));
        /* 	Kita butuh file config khusus untuk daftar driver  */
        $config_file = 'driver_gw';
        if (!is_file(APPPATH . 'config/' . $config_file . ".php")) {
            // log_add('buatlah confignya di:'.APPPATH.'config/'.$config_file.".php",'error');
            $result['messages'] = !is_local() ? 'no config file' : 'buatlah confignya di:' . APPPATH . 'config/' . $config_file . ".php\nbuatlah array confignya \$config['drivers_{$driver_core}']=array('{$driver_name}');";
            $result['error'] = 101;
            log_add($result, 'driver_run');
            return $result;
        }

        /* 	Kita butuh config parameter untuk daftar driver  */
        //$CI->config->load($config_file);
        //$valid_drivers = $CI->config->item('drivers_' . $driver_core);
        $valid_drivers = config_load('drivers_' . $driver_core, $config_file);
        if (is_null($valid_drivers) || $valid_drivers === false) {
            // log_add("buatlah array confignya \$config['drivers_{$driver_core}']=array();",'error');
            $result['error'] = 102;
            $result['messages'] = !is_local() ? 'no config' : "buatlah array confignya \$config['drivers_{$driver_core}']=array();";
            log_add($result, 'driver_run');
            return $result;
        }
        /* 	Kita butuh nilai parameter yang sesuai untuk daftar driver  */
        log_add('exist?' . $driver_name);
        if (!in_array($driver_name, $valid_drivers)) {
            // log_add("buatlah nilai '{$driver_name}' pada array confignya \$config['drivers_{$driver_core}']=array('{$driver_name}');",'error');
            $result['error'] = 103;
            $result['messages'] = !is_local() ? 'no config' : "buatlah nilai '{$driver_name}' pada array confignya \$config['drivers_{$driver_core}']=array('{$driver_name}');";
            log_add($result, 'driver_run');
            return $result;
        }

        /* keberadaan file driver ====================================  */
        $core_file = ucfirst(strtolower($driver_core));
        $driver_file = ucfirst(strtolower($driver_core)) . "_" . strtolower($driver_name);
        $file_check = APPPATH . 'libraries' . DIRECTORY_SEPARATOR . $core_file . DIRECTORY_SEPARATOR . 'drivers' . DIRECTORY_SEPARATOR . $driver_file . ".php";
        if (!is_file($file_check)) {
            // log_add('buatlah file drivernya di:'.APPPATH.'libraries/'.$core_file.'/drivers/'.$driver_file.".php",'error');
            $result['error'] = 104;
            $result['messages'] = !is_local() ? 'no config' : 'buatlah file drivernya di:' . $file_check;
            log_add($result, 'driver_run');
            return $result;
        }
        log_add('file OK' . $driver_file);

        /* 	Kita butuh functionnya ==================================  

          $result['data']=$CI->{$driver_core}->{$driver_name}->{$func_name}($params);
         */
        log_add('run ?' . $driver_name);
        $CI->load->driver($driver_core);
        if (!method_exists($CI->{$driver_core}->{$driver_name}, $func_name)) {
            // log_add('buatlah fungsi '.$func_name.'($params) pada file drivernya di:'.APPPATH.'libraries/'.$core_file.'/drivers/'.$driver_file.".php",'error');
            $result['error'] = 105;
            $result['messages'] = !is_local() ? 'no config' : 'buatlah fungsi ' . $func_name . '($params) pada file drivernya di:' . APPPATH . 'libraries/' . $core_file . '/drivers/' . $driver_file . ".php";
            log_add($result, 'driver_run');
            return $result;
        } else {
            $result['error'] = false;
            $result['messages'] = 'success';
            log_add($result, 'driver_run');
            $result['data'] = $CI->{$driver_core}->{$driver_name}->{$func_name}($params);
        }

        return isset($result['data']) ? $result['data'] : array();
    }

}

if (!function_exists('myIP')) {

    function myIP() {
        $ip = 'unknown';
        if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
        }
        return $ip;
    }

}

function db_id($name = 'id', $sub = NULL, $detail = NULL, $min_num = 1000000) {
    $CI = & get_instance();
    $table = 'z_id';
    if (!$CI->db->table_exists($table)) {
        $CI->load->dbforge();
        $fields = array(
            'num' => array(
                'type' => 'BIGINT',
                'auto_increment' => TRUE
            ),
            'modified' => array(
                'type' => 'timestamp',
            )
        );
        $CI->dbforge->add_field($fields);
        $CI->dbforge->add_key('num', TRUE);
        $attributes = array('ENGINE' => 'myisam');
        $CI->dbforge->create_table($table, TRUE, $attributes);
    } else {
        $now = date("Y-m-d H:i:s", strtotime('-12 hours'));
        $sql = "delete from $table where modified<'$now'";
        $CI->db->query($sql);
    }
    $aSql = array();
    if (!$CI->db->field_exists('nama', $table)) {
        $aSql[] = "ALTER TABLE `{$table}` ADD `nama` char(255) NULL";
    }
    if (!$CI->db->field_exists('sub', $table)) {
        $aSql[] = "ALTER TABLE `{$table}` ADD `sub` char(255) NULL";
    }
    if (!$CI->db->field_exists('detail', $table)) {
        $aSql[] = "ALTER TABLE `{$table}` ADD `detail` text NULL";
    }

    foreach ($aSql as $sql) {
        $CI->db->query($sql);
    }

    $data = array(
        'nama' => $name,
        'sub' => $sub,
        'detail' => $detail
    );
    $CI->db->insert($table, $data);
    $num = $CI->db->insert_id();
    if ($num < $min_num) {
        $num = $min_num;
        $data['num'] = $num;
        $CI->db->insert($table, $data);
    }

    return $num;
}
