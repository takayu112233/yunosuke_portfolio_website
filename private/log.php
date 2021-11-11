<!DOCTYPE html>
<!-- このページは必ず認証をつける事 -->
<?php 
function show_msg()
{
    session_start();

        require("../libDB.php");
        
        $db = new libDB();
        $pdo = $db->getPDO();
        
        $sql = $pdo->prepare("SELECT * from view_log;"); 

        $sql->execute();
        $result = $sql->fetchAll();
        if(!$result){
            echo "ERR<br>";
        }else{
            foreach($result as $loop){
            echo "<br>" . $loop["log_id"] . " " . $loop["log_date"] . " " . $loop["key_memo"];
        }
    }
}
?>
<html lang="ja">
    <head>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title>ログイン履歴</title>
        <link href="../css/style.css" rel="stylesheet">
        <link rel="icon" href="../img/favi.ico">
    </head>

    <body>
        <?php show_msg()?>
    </body>

    <footer>
        <p><small>&copy;Takahashi Yunosuke 2021</small></p>
    </footer>
</html>