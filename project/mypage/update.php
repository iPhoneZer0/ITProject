<?php
session_start();

if (false === isset($_SESSION['auth'])) {
    header('Location: ../login.php');
    exit;}
require('../pdo.php');



/* 登録処理 */
/* ------- */
// formからデータ取り出し
// XXX 今回は$_POSTをそのまま使う

// validate
$error = [];
//blank(空白)だとエラー
  if($_POST['name'] == ''){
    $error['name'] = 'blank';
  }
  if($_POST['mail'] == ''){
    $error['mail'] = 'blank';
  }
    //4文字以下だとエラー
  if(strlen($_POST['pass']) < 4){
    $error['pass'] = 'length';
  }
  if($_POST['pass'] == ''){
    $error['pass'] = 'blank';
  }

  // エラーが１つでもあったらindex.phpに戻る
  // エラーがempty(空)だったら移動する
  if(false === empty($error)){
    //$_SESSION['join'] = $_POST;
    header('Location: up.php?error=1');
    exit();
  }

/* DBにinsert */
// 準備された文(プリペアードステートメント)を作成する
$sql = ("UPDATE `user` SET name=:name, mail=:mail, pass=:pass WHERE id = '" . $_SESSION['auth']['id'] . "'");
$pre = $dbh->prepare($sql);

// プレースホルダに値をバインドする
// UPDATE文の[:name :mail :pass]の中をPOSTで拾って入力する
$pre->bindValue(':name', $_POST['name']);
$pre->bindValue(':mail', $_POST['mail']);
$pre->bindValue(':pass', password_hash($_POST['pass'], PASSWORD_DEFAULT));

// SQLを実行
$r = $pre->execute();
if (false === $r) {
    // XXX
    echo "DBミス";
    exit;
}
?>
<form action="../logout.php" method="post">
<!-- 完了Pageに飛ばす -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログアウトに飛ぶ</title>
</head>
<body>
   <h2>更新完了</h2>
   <p>もう一度ログインしてください</p>
    <input type="submit" value="確認">
<!--header('Location: ../logout.php'); -->

    
</body>
</html>

</form>