<?php
session_start();

if (false === isset($_SESSION['auth'])) {
    header('Location: ../login.php');
    exit;
}

require('../pdo.php');

// 準備された文(プリペアードステートメント)を作成する
$sql = 'INSERT INTO mail SET sender=:sender, receiver=:receiver, message=:message ;';
$res = $dbh->prepare($sql);

// プレースホルダ(SQLインジェクション対策)に値をバインドする
// INSERT文に追加
$res->bindValue(':sender', $_SESSION['auth']['name']);
$res->bindValue(':receiver',  $_SESSION['send']['name']);
$res->bindValue(':message',  $_SESSION['send']['message']);


// SQLを実行
$r = $res->execute();
if (false === $r) {
    echo "DBミス";
    exit;
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>メール作成フォーム</title>
<!--5秒後にページ移動-->
<meta http-equiv="refresh" content="5;URL=index.php">

</head>
<body>
<h2>メール送信完了フォーム</h2>

<p>送信完了しました。<FONT COLOR="RED">このページは5秒後にメールTopに戻ります</FONT></p>

</body>
</html>