<!DOCTYPE html>
<?php
session_start();
if (!$_SESSION["key"]) {
    header('Location: ../login.php');
}

require "../embedded/main.php";
write_log();

function read_manu()
{
    echo("\n<!– php 処理 開始 –>\n");
    $handle = fopen('../manu.csv', 'r');
    while (($row = fgetcsv($handle, 4096)) !== false) {
        list($name, $imgurl, $url, $external) = $row;
        if($external == 1){
            echo "<li><a href=\"" . $url . "\" target=\"_blank\">" . $name . "</a></li>"."\n";
        }else{
            echo "<li><a href=\"../" . $url . "\">" . $name . "</a></li>"."\n";
        }
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
		            有機ELディスプレイにはリアルタイム瞬間電力使用量と電力料金が表示されます。</br>
                    </br>
		            MySQLデータベースに30分毎の積算電力使用量を記録しています。</br>
                </p>
                <h2>使用言語</h2>
                <p>
		            Python</br>
		            MySQL</br>
                </p>
                <h2>瞬間電力使用量の共有</h2>
                <img src="../img/minihems/mqtt.png">
                <p>
		            瞬間電力使用量をMQTTプロトコルを用いて送信する機能を搭載している為、</br>
		            瞬間電力使用量を別の端末や場所で確認する事ができます。</br>
                </p>
                <h2>LINE送信機能</h2>
                <img src="../img/minihems/line.png">
                <p>
		            1日の電力使用量をLINEで送信する機能を搭載しています。</br>
                </p>

                <h2>今後やりたい事</h2>
                <p>
                    MySQLデータベースに30分後毎に登録している積算電力値を使用し、</br>
                    Webブラウザから、電気に関する様々な情報を閲覧できるようにしていきたいです。
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