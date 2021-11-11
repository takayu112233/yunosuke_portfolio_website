<!DOCTYPE html>
<?php 
session_start();
if (!$_SESSION["key"]) {
    header('Location: ./login.php');
}else{
    header('Location: ./home.php');
}
?>

<html lang="ja">
</html>