<?php   //一度ファイルが消えたので代用
session_start();

if (false === isset($_SESSION['auth'])) {
    header('Location: ../login.php');
exit;}

if(isset($_SESSION['send'])){
    $name = $_SESSION['send']['name'];
    $message = $_SESSION['send']['message'];

    if(isset($_SESSION['send']['name_miss'])){
        $name_miss = true;
    }
    unset($_SESSION['send']);
}else{
    $name = true;
    $message = true;
    $name_miss = null;
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>メール作成フォーム</title>
</head>
<body>
<h2>メール作成フォーム&raquo;<a href="index.php">戻る</a></h2>

<form action = "send_conf.php" method = "POST">
<dl>
	<dt>宛名:
    <?php 
    if (isset($name_miss)) {
        echo '<FONT COLOR="RED">該当するユーザーがいません</FONT>';
    }
    ?>
    </dt>

	<dd>
    <input type = “text” name ="name" value=<?php
    //もし、確認フォームから編集したいとき、内容を引き継ぐ
    //if(isset($_GET['name'])){echo $_GET['name'];}
    if($name ===true){}else{echo $name;}
    ?>><br/>
    </dd>
            
	<dt>メッセージ内容:
    <?php 
    if (empty($message)) {
        echo '<FONT COLOR="RED">メッセージが空です</FONT>';
    }
    ?></dt>
	<dd>
    <textarea name="message" cols="30" rows="5"><?php
    //もし、確認フォームから又は宛名エラーの場合、内容を引き継ぐ
    //if(isset($_GET['message'])){echo $_GET['message'];}
    if($message ===true){}else{echo $message;}
    ?></textarea>
	</dd>
</dl>
<input type="submit" value="確認フォームへ">
</form>


</body>
</html>
<?php

/*
//goto でif文を抜け出している
if(isset($_SESSION['error'])){
    $error = true;
    if(empty($_SESSION['error']['user_miss'])){
        $user_miss = null;
        $no_message = $_SESSION['error']['no_message'];
        goto ifend;
    }
    if(empty($_SESSION['error']['no_message'])){
        $no_message = null;
        $user_miss = $_SESSION['error']['user_miss'];
        goto ifend;
    }

    $no_message = $_SESSION['error']['no_message'];
    $user_miss = $_SESSION['error']['user_miss'];
    unset($_SESSION['error']);
}else{
    $no_message =null;
    $user_miss = null;
}
//goto で抜けるとここまで飛んで来る
ifend:
*/