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
        <title>LED個別制御システム(ソフトウェア)</title>
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
                <h2>LED個別制御システム</h2>
            </header>
        </div>

        <div class = "content wrapper">
            <main>
                <h2>全体写真</h2>
                <img src="../img/sw_led/sw_led.png">
                <h2>概要</h2>
                <p>
                    LED個別制御システムはインターネットブラウザ上から、LEDのグルーピング、</br>
                    グループ事の点灯スケジュールの設定を行う事ができます。</br>
                    </br>
		            ミニチュアテーマパークでのアルバイトで作成しました。</br>
                    LEDドライバ等の基盤をハードウェア担当の方が作成し、</br>
                    私がネットワーク経由で遠隔操作できる用にした形になります。</br>
                    </br>
                    １万個以上のLEDを個別に制御、スケジュール作成を行う事ができます。</br>
                    </br>
                    <img src="../img/sw_led/sw_led_app.png"></br>
                    Webブラウザを使用してLEDの点灯スケジュールを作成します。</br>
                    </br>
                    ランダム点灯・消灯に加え、グループ内で点灯・消灯するLEDの割合も設定する事ができます。</br>
                    </br>
                    インターネットブラウザを使用して、グルーピングとスケジュールを設定する為、</br>
                    機械の操作が苦手な人も簡単に演出設定を行う事ができるようになりました。</br>
                    </br>
                </p>
                <h2>使用言語</h2>
                <p>
		            Python</br>
		            HTML</br>
		            JavaScript</br>
		            Ajex</br>
		            PHP</br>
		            MYSQL</br>
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