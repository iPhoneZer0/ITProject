<?php
session_start();
//header()が2つあるとエラーでるっぽいので一度全部のファイルを読んでから実行
ob_start();
// 
if (false === isset($_SESSION['auth'])) {
    header('Location: login.php');
    exit;}
?>

<!doctype html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>ログアウト</title>
 </head>
 <body>
  <h1>ログアウト</h1>
        
  <?php
    $method = $_SERVER['REQUEST_METHOD'];

     if($method == "POST"){
         //POST通信だったら
        header('Location: login.php');
     }else{
         //GET通信だったら
     }
?>
        
        <a href="login.php">ログイン画面に戻る</a>
        
    </body>
</html>