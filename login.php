<!DOCTYPE html>
<?php 
function show_msg()
{
    session_start();

    if(isset($_POST["key"])){
        $key = $_POST["key"];
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
        }else{
            foreach($result as $loop){
                session_regenerate_id(true); 
                $_SESSION['key'] = $loop["key_value"];
                $_SESSION['key_id'] = $loop["key_id"];

                $sql = $pdo->prepare("INSERT INTO log_table(key_id) VALUES (:key_id);"); 
                $sql->bindValue(':key_id', $loop["key_id"], PDO::PARAM_STR);  

                $sql->execute();
                header('Location: ./home.php');
            }
        }
    }else{
        echo("keyを入力してください");
    }
}
?>
<html lang="ja">
    <head>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title>高橋祐之介のポートフォリオ　ログイン</title>
        <link href="./css/style.css" rel="stylesheet">
        <link rel="icon" href="./img/favi.ico">
    </head>

    <body>
        <div class = "header">
            <header class="page_header wrapper">
                <h1>高橋祐之介のポートフォリオ</h1>
                <ul class="main_menu">
                    <li><a></a></li>
                </ul>
            </header>

            <header class="title wrapper">
                <h2>ログイン</h2>
            </header>
        </div>

        <div class = "wrapper">
            <login>
                <form action="./login.php" method="post">
                        <table>
                        <tr>
                            <td colspan = 3><p style="text-align:center;"><?php show_msg()?><p><td>
                        <tr>
                        <tr>
                            <td>Key：</td>
                            <td><input type="password" name="key" size="10" maxlength="8"></td>
                            <td><input type="submit" value="送信"></td>
                        </tr>
                        </table> 
                </form>
            </login>
            <main>
            </main>
            <side>
            </side>
        </div>
    </body>

    <footer>
        <p><small>&copy;Takahashi Yunosuke 2021</small></p>
    </footer>
</html>