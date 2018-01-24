<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function logConfig($text){
	log_add($text,'config');
}

function logCreate($text = '') {
    log_add($text);
    return TRUE;
    log_message('debug', $text);
    /*
      saya hapus aja selain text
      ini fungsi untuk nulis log aja..
      hasil tulisannya ada di folder
     */
    return TRUE;
}

function log_add($text = '', $type = 'other',$cat=0) {
 //   if (!is_local())        return TRUE;
    $folder  = config_load('logs');
    if($folder!==TRUE) return FALSE;
    
    $header = date("Y-m-d H:i:s")."\t$type\t";

    if (is_array($text)) {
        $text = json_encode($text);
    }
    
    $folder  = config_load('logs_folder');
    $folder_log=isset($folder[$cat])?$folder[$cat]."/":$folder[0]."/";
    $folder_date=date("Ym")."/";
    $filename=date("YmdH");
    $file = core_folder().$folder_log.$folder_date.$filename.".txt";
	$myfolder= core_folder().$folder_log.$folder_date;
	//die($myfolder);
    create_folder_is_not_valid( $myfolder);
    error_log($header.$text."\n", 3, $file);
    
    
//    log_message('debug', $type . "\t" . $text);
}

function create_folder_is_not_valid($folders){
	$log_win  = config_load('logs_win');
    $ar=explode("/",$folders);
    $folder='';
//	echo_r($ar);
    foreach($ar as $v){
        if($v==''){
            continue;
        }
		
        $folder.=$log_win?"$v/":"/$v";
        if(!is_dir($folder)){
			echo "<br>$folder";
            mkdir($folder);
        }
        
    }
    return TRUE;
}