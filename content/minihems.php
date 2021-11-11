<!DOCTYPE html>
<?php
session_start();
if (!$_SESSION["key"]) {
    header('Location: ../login.php');
}

function read_manu()
{
    echo("\n<!– php 処理 開始 –>\n");
    $handle = fopen('../manu.csv', 'r');
    while (($row = fgetcsv($handle, 4096)) !== false) {
        list($name, $imgurl, $url) = $row;

        echo "<li><a href=\"../" . $url . "\">" . $name . "</a></li>"."\n";

    }
    fclose($handle);
    echo("\n<!– php 処理 終了 –>\n");
}
?>
<html lang="ja">
    <head>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title>Mini HEMS System</title>
        <link href="../css/style.css" rel="stylesheet">
        <link rel="icon" href="../img/favi.ico">
    </head>

    <body>
        <div class = "header">
            <header class="page_header wrapper">
                <h1>高橋祐之介のポートフォリオ</h1>
                <ul class="main_menu">
                    <li><a href="../home.php">ホーム</a></li>
                    <li><a href="../logout.php">ログアウト</a></li>
                </ul>
            </header>

            <header class="title wrapper">
                <h2>Mini HEMS System</h2>
            </header>
        </div>

        <div class = "content wrapper">
            <main>
                <h2>機器写真</h2>
                <img src="../img/minihems/minihems.png">
                <h2>概要</h2>
                <p>
		            スマートメータとRaspberryPiが通信を行い、瞬間電力使用量と積算電力使用量を取得します。</br>
		            有機ELディスプレイにはリアルタイム瞬間電力使用量と使い続けた場合の電力料金が表示されています。</br>
                    </br>
		            MYSQLデータベースに30分毎の積算電力使用量を記録しています。</br>
                </p>
                <h2>使用言語</h2>
                <p>
		            Python</br>
		            MySQL</br>
                </p>
                <h2>瞬間電力使用量の共有</h2>
                <img src="../img/minihems/mqtt.png">
                <p>
		            瞬間電力使用量のMQTTメッセージを送信する機能を持っており、</br>
		            瞬間電力使用量を色々な端末で共有する事が可能です。</br>
                </p>
                <h2>LINE送信機能</h2>
                <img src="../img/minihems/line.png">
                <p>
		            一日の電力使用量をLINEで送信する機能を持っており、</br>
		            決めれた時間に前日の電気使用量を送信します。</br>
                </p>
                <h2>今後やりたい事</h2>
                <p>
		            Webブラウザ上から、瞬間電力使用量や積算電力使用量のグラフが</br>
                    閲覧できる用にしたいと思います。</br>
                </p>


            </main>
            <side>
                <h3 class="side_title">このサイトについて</h3>
                <p>
                このサイトは高橋祐之介が過去に作成した物を紹介しています。</br>
                </p>
                <h3 class="side_title">制作物一覧</h3>
                <ul class="side_menu">
                    <?php read_manu(); ?>
                </ul>
            </side>
        </div>
    </body>

    <footer>
        <p><small>&copy;Takahashi Yunosuke 2021</small></p>
    </footer>
</html>