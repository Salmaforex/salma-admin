<?php
phpinfo();die;
$username = 'root';
$pass = 'gundam1981';
$hostname='118.98.166.65';
$port = 10060;
$dbname='test';
try {
    //$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
	$dbh = new PDO ("dblib:host=$hostname:$port;dbname=$dbname","$username","$pass");
	//$dbh = new PDO('mssql:server=118.98.166.65;database=xsad',$user,$pass);
   echo "berhasil connect";
	
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

//====global_data/get_sekolah
//=====api/data/get_sekolah