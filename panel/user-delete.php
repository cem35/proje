<?php
session_start();
require_once("inc/config.php");

if(!isset($_SESSION['userid'])){
  header("Location: ./login.php");
  exit;
}

if($auth['group_id'] != 2){
  header("Location: ./index.php");
  exit;
}

$db->query("DELETE FROM users WHERE id='$_GET[id]'");
header("Location: ./users.php");

?>
