<?php
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
    header('Location: index.php?error=1');
    exit();
  }

/* DBにinsert */
// 準備された文(プリペアードステートメント)を作成する
$sql = 'INSERT INTO user SET name=:name, mail=:mail, pass=:pass ;';
$pre = $dbh->prepare($sql);

// プレースホルダ(SQLインジェクション対策)に値をバインドする
// INSERT文の[:name :mail :pass]の中をPOSTで拾って入力する
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

// 完了Pageに飛ばす
header('Location: thanks.php');

