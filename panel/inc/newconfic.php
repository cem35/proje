<?php 

try {
     $db = new PDO("mysql:host=localhost;dbname=cembase;charset=utf8", "root", "");
    //  $db = new PDO("mysql:host=localhost;dbname=boyozcom_emea;charset=utf8", "boyozcom_emeausr", "5a5Tco_edN-On^JC~D");
} catch ( PDOException $e ){
     print $e->getMessage();
}

 ?>