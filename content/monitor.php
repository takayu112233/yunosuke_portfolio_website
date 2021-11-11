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
        <title>死活監視システム</title>
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
                <h2>死活監視ソフトウェア</h2>
            </header>
        </div>

        <div class = "content wrapper">
            <main>
                <h2>全体写真</h2>
                <img src="../img/monitor/monitor.png">
                <h2>概要</h2>
                <p>
		            こちらは開発のアルバイトで作成した物です。</br>
                    </br>
                    多くのマイコンを同時に起動した際に正常起動しないマイコンがあった為、</br>
                    簡単に確認できるように作成したものです。</br>
                </p>
                <h2>使用言語</h2>
                <p>
		            C#</br>
		            .NET Framework</br>
                </p>
                <h2>色で状況を知らせる</h2>
                <img src="../img/monitor/color.png">
                <p>
		            画面上の色が全て緑の場合は正常動作していると確認できます。</br>
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