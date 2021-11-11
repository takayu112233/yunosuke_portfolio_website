<!DOCTYPE html>
<?php 
session_start();
if ($_SESSION["key"]) { 
    $_SESSION = array();
    setcookie(session_name(), '', time() - 3600, "/");
}
header('Location: ./login.php');
?>
<html lang="ja">
    
</html>