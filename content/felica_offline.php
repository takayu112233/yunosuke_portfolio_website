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
        <title>出席管理システム（オフライン版）</title>
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
                <h2>出席管理システム（オフライン版）</h2>
            </header>
        </div>

        <div class = "content wrapper">
            <main>
                <h2>全体写真</h2>
                <img src="../img/felica_offline/felica_offline.png">
                <h2>概要</h2>
                <p>
                    <a href="../content/felica_db.php">DBを使用した入場者管理システム</a>のオフライン版です。</br>
		            サーバを構築する事無く、Windows搭載パソコンとFeliCaリーダを用意する事で使用できます。</br>
                </p>

                <h2>授業を複数登録可能</h2>
                <img src="../img/felica_offline/setup.png">
                <img src="../img/felica_offline/wait.png">
                <p>
		            起動時に授業内容と授業時間を設定する事ができます。</br>
		            設定内容はファイルに保存する事ができます。</br>
                </p>

                <h2>学生証をかざすだけで出席</h2>
                <img src="../img/felica_offline/read.png">
                <p>
                    FeliCaリーダーに学生証をかざす事で出席登録できます。</br>
                    読取成功時、大きく学籍番号が表示されます。</br>
		            入室時にタッチする事で点呼を省略する事が可能です。</br>
                </p>

                <h2>出席情報はCSV出力可能</h2>
                <img src="../img/felica_offline/csv_out.png">
                <p>
		            授業終了後、出席情報はCSVファイルに書き出す事が可能です。</br>
                </p>
                
                <h2>使用言語</h2>
                <p>
		            C#</br>
		            .NET Framework</br>
                </p>
                <h2>ソースコード</h2>
                <p>
		            <a href="https://github.com/takayu112233/Local-attendance-registration-system" target="_blank">GitHub</a>にアップロードされております。
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