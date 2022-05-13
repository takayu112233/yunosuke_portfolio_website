<?php
require "../libDB.php";

function write_log()
{
    $db = new libDB();
    $pdo = $db->getPDO();

    $sql = $pdo->prepare("INSERT INTO access_log_table(key_id,access_url) VALUES (:key_id,:access_url);"); 
    $sql->bindValue(':access_url', $_SERVER['REQUEST_URI'], PDO::PARAM_STR);  
    $sql->bindValue(':key_id', $_SESSION["key_id"], PDO::PARAM_STR);  

    $sql->execute();
}
?>
