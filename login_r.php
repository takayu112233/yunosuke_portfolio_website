<!DOCTYPE html>
<?php 
function show_msg()
{
    session_start();

    if(isset($_GET["key"])){
        $key = $_GET["key"];

        $key = htmlspecialchars($key, ENT_QUOTES, "UTF-8");
        require("libDB.php");
        
        $db = new libDB();
        $pdo = $db->getPDO();
        
        $sql = $pdo->prepare("SELECT * from key_table WHERE key_value = :key_value AND delete_flag = 0;"); 
        $sql->bindValue(':key_value', $key, PDO::PARAM_STR);  

        
        $sql->execute();
        $result = $sql->fetchAll();
        if(!$result){
            echo "ログインに失敗しました<br>";
            header('Location: ./login.php');
        }else{
            foreach($result as $loop){
                session_regenerate_id(true); 
                $_SESSION['key'] = $loop["key_value"];

                $sql = $pdo->prepare("INSERT INTO log_table(key_id) VALUES (:key_id);"); 
                $sql->bindValue(':key_id', $loop["key_id"], PDO::PARAM_STR);  

                $sql->execute();

                if(isset($_GET["url"])){
                    $url = $_GET["url"];
                    $lo = "Location: ./content/" . $url;
                    header($lo);
                }else{
                    header("Location: ./home.php");
                }
            }
        }
    }else{
        header('Location: ./login.php');
    }
}

show_msg();
?>
<html lang="ja">
    <head>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title>高橋祐之介のポートフォリオ オートログイン</title>
        <link href="./css/style.css" rel="stylesheet">
        <link rel="icon" href="./img/favi.ico">
    </head>

    <body>
        <div class = "header">
            <header class="page_header wrapper">
                <h1>高橋祐之介　オートログイン</h1>
            </header>
        </div>
    </body>

    <footer>
        <p><small>&copy;Takahashi Yunosuke 2021</small></p>
    </footer>
</html>