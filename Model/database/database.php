<?php 

define('DSN', 'mysql');
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'base_teste');

ini_set('display_errors', true);
error_reporting(E_ALL);

function conndb(){
    $conn = new PDO(DSN.':host='.HOST.'; dbname='.BASE. ';charset=utf8',USER,PASS);
    return $conn;
}

?>