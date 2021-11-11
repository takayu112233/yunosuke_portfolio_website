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
        <title>ポケット学生便覧「Pokebi」</title>
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
                <h2>ポケット学生便覧「Pokebi」</h2>
            </header>
        </div>

        <div class = "content wrapper">
            <main>
                <h2>トップページ</h2>
                <img src="../img/pokebi/pokebi_login.png">
                <h2>概要</h2>
                <p>
		            いつでもどこでも学生便覧を読む事ができるサイトです。</br>
		            </br>
		            大学の授業のグループワークで学校に関する情報サイトを作成する事になり、</br>
		            その1コンテンツとして学生便覧閲覧サイトを作成しました。</br>
                </p>
                <h2>使用言語</h2>
                <p>
		            PHP</br>
		            JavaScript</br>
		            MySQL</br>
		            Python</br>
                </p>
                <h2>ワンタイムパスワードの導入</h2>
                <img src="../img/pokebi/pokebi_mail.png">
                <p>
                    大学の学生か識別する為にユーザー登録にワンタイムパスワードを導入しています。</br>
                    大学のメールアドレス以外は登録できないようにする事で大学の学生のみユーザー登録できます。</br>
                    </br>
                    AzureVM上にWebサーバを構築している為、AzureVMからメールを送信するとポリシー違反に当たってしまいます。</br>
                    その為、SendGridを使用して自分のメールサーバーを経由してメールを送信しています。

                </p>
                <h2>メニュー</h2>
                <img src="../img/pokebi/pokebi_home.png">
                <p>
                    こちらがログイン後に表示されるトップページです。</br>
                    開発時の写真ですのでコンテンツが少ないですが、左のメニューから閲覧したい内容を選択します。</br>
                </p>
                <h2>スマートフォンに対応</h2>
                <img src="../img/pokebi/pokebi_sp.png">
                <p>
                    レスポンシブルデザインになっており、スマートフォンでも閲覧する事ができます。</br>
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