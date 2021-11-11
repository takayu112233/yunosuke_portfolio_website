<!DOCTYPE html>
<?php 
session_start();
if (!$_SESSION["key"]) {
    header('Location: ./login.php');
}

function read_manu()
{
    echo("\n<!– php 処理 開始 –>\n");
    $handle = fopen('./manu.csv', 'r');
    while (($row = fgetcsv($handle, 4096)) !== false) {
        list($name, $imgurl, $url) = $row;

        echo"<div class=\"item\">"."\n";
        echo"<a href=\"" . $url . "\">"."\n";
        echo"<img src=\"" . $imgurl . "\">"."\n";
        echo"<p>" . $name . "</p>"."\n";
        echo"</a>"."\n";
        echo"</div>"."\n";

    }
    fclose($handle);
    echo("\n<!– php 処理 終了 –>\n");
}
?>

<html lang="ja">
    <head>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title>高橋祐之介のポートフォリオ</title>
        <link href="css/style.css" rel="stylesheet">
        <link rel="icon" href="img/favi.ico">
    </head>

    <body>
        <div class = "header">
            <header class="page_header wrapper">
                <h1>高橋祐之介のポートフォリオ</h1>
                <ul class="main_menu">
                    <li><a href="./home.php">ホーム</a></li>
                    <li><a href="./logout.php">ログアウト</a></li>
                </ul>
            </header>

            <header class="title wrapper">
                <h2>メニュー</h2>
            </header>
        </div>

        <div class="grid_menu wrapper">
            <?php read_manu(); ?>
        </div>
    </body>

    <footer>
        <p><small>&copy;2021 Takahashi Yunosuke</small></p>
    </footer>
</html>