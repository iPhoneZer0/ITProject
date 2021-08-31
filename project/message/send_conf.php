<?php   //
session_start();

if (false === isset($_SESSION['auth'])) {
    header('Location: ../login.php');
    exit;}
//一応書く
unset($_SESSION['send']);
//header()が2つあるとエラーでるっぽいので一度全部のファイルを読んでから実行
ob_start();

require('../pdo.php');

//$name = $_POST["name"];
//$message = $_POST["message"];

$_SESSION['send']['name'] = $_POST["name"];
$_SESSION['send']['message'] = $_POST["message"];

$sql =("SELECT * FROM user WHERE name  ='" . $_SESSION['send']['name'] . "'");
// SQL実行
$res = $dbh->prepare($sql);
$res->execute();

//配列の取得
$result = $res->fetchAll();

if($result == false){
    $_SESSION['send']['name_miss'] = true;
    header("location: send.php");
        exit;
    }
if($_SESSION['send']['message'] == null){
    header("location: send.php");
        exit;
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>メール作成フォーム</title>
</head>
<body>
<h2>メール確認フォーム&raquo;
<a href="send.php">#</a></h2>

<input id="i_event" type="text" name="event" value=<?php echo $_SESSION['send']['name']?> readonly><br>

<textarea name="message" cols="30" rows="5" readonly><?php
echo  $_SESSION['send']['message'] ?></textarea><br>

<button onclick="location.href='send.php'">編集画面に戻る</button>

<button onclick="location.href='send_sql.php'">送信</button>
</body>
</html>
<?php
/*
if($result == false){
    if($message == null){
        //もし宛先ミス＆メッセーが空の場合の処理
        $_SESSION['error']['user_miss'] = true;
        $_SESSION['error']['no_message'] = true;
        
        header("location: send.php");
        exit;
    }else{
        //宛名ミスの場合
        $_SESSION['error']['user_miss'] = true;
        header("location: send.php?message=$message&name=$name");
    exit;
    }
}else if($message == null){
    //メッセージが空の場合
    $_SESSION['error']['no_message'] = true;
    header("location: send.php?name=$name");
    exit;
}

?name=<?php echo $name;?>&message=<?php echo $message;?>
*/