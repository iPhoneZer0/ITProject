<?php
// セッション開始
session_start();

require('pdo.php');

// idとパスワードをformから取得
$mail = $_POST['mail'];
$pass = $_POST['pass'];

if ( ('' === $mail)or('' === $pass) ) {
    header('Location: login.php');
    exit();
}

/* DBから取得 */
// 準備された文(プリペアードステートメント)を作成する
$sql = 'SELECT * FROM user WHERE mail = :mail ;';
$pre = $dbh->prepare($sql);

// プレースホルダに値をバインドする
$pre->bindValue(':mail', $mail);

// SQLを実行
$r = $pre->execute();
if (false === $r) {
    // XXX
    echo "DBミス";
    exit;
}
//
$user = $pre->fetch();
//var_dump($user); exit;
if (false === $user) {
    header('Location: login.php?error=1');
    exit();
}

// パスワードの比較
if (false === password_verify($pass, $user['pass'])) {
    header('Location: login.php?error=1');
    exit();
}

// ここまできたら認証OK

//
session_regenerate_id(true); // セキュリティ対策

// ログインのマーキング
$_SESSION['auth']['id'] = $user['id'];
$_SESSION['auth']['name'] = $user['name'];
$_SESSION['auth']['mail'] = $user['mail'];


//
header('Location: mypage/');

