<?php
//https://dev2.m-fr.net/kotaka/IT/test/test.php

//https://github.com/gallu/Inquiry2020/blob/master/libs/DbHandle.php
$dsn      = 'mysql:dbname=kotaka; host=localhost';
$user     = 'kotaka';
$password = 'pakotakass';

// DBへ接続
try{
    $dbh = new PDO($dsn, $user, $password);

    // クエリの実行

//エラー処理
}catch(PDOException $e){
    print("データベースの接続に失敗しました".$e->getMessage());
    exit;
}


echo "成功";

// 接続を閉じる
$dbh = null;