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
        <title>入場者管理システム（DB版）</title>
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
                <h2>入場者管理システム（DB版）</h2>
            </header>
        </div>

        <div class = "content wrapper">
            <main>
                <h2>全体写真</h2>
                <img src="../img/felica/felica_thumbnail.png">
                <h2>概要</h2>
                <p>
		            学生証をFeliCaリーダーにかざす事で瞬時に入場・出席登録ができるシステムです。</br>
		            学生情報と入場・出席情報はCSVファイルで書き出す事ができます。</br>
                </p>

                <h2>プロジェクトについて</h2>
		            このソフトウェアは専門学生の時、他学部の先生からの依頼で作成する事になりました。</br>
                    </br>
                    <img src="../img/felica/real_dreams.png"></br>
		            日本工学院専門学校はリアルドリームスと呼ばれる、学内最大音楽イベントを毎年開催しています。</br>
                    
                    このソフトウェアを作成する前は2000人を超える音楽イベントに出席した生徒を</br>
                    点呼で確認し、出欠情報を手入力でパソコンに登録していまいた。</br>
                    </br>
                    そこで、学生証をリーダにかざすだけで出席登録を行えるシステムを提案し、作成しました。</br>

                <h2>学内最大音楽イベントで活躍</h2>
                <img src="../img/felica/felica_realdreams.png">
                <p>
		            学内最大音楽イベントでは2000人以上の入場管理が行われました。</br>
		            </br>
                </p>
                <h2>ソフトウェア一覧</h2>
                <p>
		            入場者管理システムでは４つのソフトウェアがあります。</br>
                    </br>
		            学生証読取ソフト　・・・　学生証を読取り、登録します。</br>
		            学生証忘れ入力ソフト　・・・　学生証を忘れた人がタブレットを使用して手入力で登録します。</br>
		            DB管理ソフト　・・・　学生情報入力、入場履歴出力、入場履歴のリアルタイム表示をします。</br>
		            DB構築ソフト　・・・　データベースを自動で構築します。</br>
		            </br>
                </p>
                <h2>学生証読取ソフト</h2>
                <img src="../img/felica/read.png">
                <p>
		            felicaリーダーに学生証をかざす事で入場登録できます。</br>
                    データベースに学生情報を追加すると、読取成功時に氏名が表示されます。</br>
                </p>
                <h2>学生証忘れ入力ソフト</h2>
                <img src="../img/felica/manual.png">
                <p>
		            学生証を忘れた際に、タブレットに学籍番号を入力する事で入場登録する事ができます。</br>
                    データベースに学生情報を追加すると、登録時に氏名が表示されます。</br>
                </p>
                <h2>DB管理ソフト</h2>
                <img src="../img/felica/db_info.png">
                <p>
		            DB管理ソフトを使用して、学生情報の追加、入場履歴出力、入場履歴のリアルタイム表示ができます。</br>
		            データの入出力は全てCSVファイルで行います。</br>
                </p>
                
                <h2>アジャイル開発</h2>
                <p>
		            このソフトウェアを作成する際、アジャイル開発の手法を取り入れました。</br>
                    </br>
                    日本工学院専門学校では、蒲田キャンパスと八王子キャンパスがあります。</br>
                    始め、音楽イベントでは蒲田キャンパスの人のみ、入場登録を行うと言う事で開発が進んでいました。
                    </br>
                    しかし、イベント開催１週間前になり、八王子キャンパスの人も入場登録を行うと言う事がわかりました。</br>
                    </br>
                    アジャイル開発の手法を取り入れていた為、急な変更に柔軟に対応でき、</br>
                    ソフトウェアの変更に加え、データベース構成の変更を行う必要がありましたが、
                    イベント当日までに実装とテストを行う事ができました。
                </p>


                <h2>使用言語</h2>
                <p>
		            C#</br>
		            .NET Framework</br>
                </p>
                <h2>ソースコード</h2>
                <p>
		            <a href="https://github.com/takayu112233/FeliCa-attendance-registration-system" target="_blank">GitHub</a>にアップロードされております。
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