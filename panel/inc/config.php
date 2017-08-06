<?php

date_default_timezone_set('Europe/Istanbul');

try {
     $db = new PDO("mysql:host=localhost;dbname=cembase;charset=utf8", "root", "");
    //  $db = new PDO("mysql:host=localhost;dbname=boyozcom_emea;charset=utf8", "boyozcom_emeausr", "5a5Tco_edN-On^JC~D");
} catch ( PDOException $e ){
     print $e->getMessage();
}

define("TITLE", "TOSHIBA LOGAN");

function secure($text){
  return htmlentities($text);
}

if(isset($_SESSION['userid'])){
  $auth = $db->query("SELECT * FROM users  LIMIT 1")->fetch();
  if(empty($auth)){
    session_destroy();
    header("Location: ./index.php");
  }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
