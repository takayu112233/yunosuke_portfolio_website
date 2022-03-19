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
        <title>私について</title>
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
                <h2>私について</h2>
            </header>
        </div>

        <div class = "content wrapper">
            <main>
                <h2>名前</h2>
                <p>
		            高橋 祐之介</br>
                </p>

                <h2>写真</h2>
                </p>
                <img src="../img/my/my2.png">
                </p>
                

                <h2>保有資格・免許</h2>
                応用情報技術者試験</br>
                基本情報技術者試験</br>
                ITパスポート試験</br>
                Microsoft Office Specialist Excel 2019</br>
                Microsoft Office Specialist Word 2019</br>
                大型自動車第一種運転免許</br>
                普通自動車第一種運転免許</br>
                普通自動二輪車免許</br>
                </p>

                <h2>学生時代に学んできた言語</h2>
                <p>
                    HTML, CSS, JavaScript, jQuery, PHP, Python, C#, java
                </p>

                <h2>得意な分野</h2>
                <p>
                    業務効率化ツールの作成等
                </p>

                <h2>趣味</h2>
                <p>
		            私の趣味はドライブを行う事です。</br>
                    バイクはNinja250SLを所持しており、天気のいい日に出かけています。</br>
                    私の父がバスを所持している関係で、時々、マイクロバスや観光バスを運転しています！</br>
                </p>

                <h2>連絡先</h2>
                <p>
                    このサイトに関するお問い合わせは以下のメールアドレスにお送りください</br>
		            takayu112233aa@gmail.com</br>
                    <a href="mailto:takayu112233aa@gmail.com">メーラーを起動します</a>
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