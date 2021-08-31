<?php

try {
    //
    $dsn = "mysql:dbname=DB名;host=localhost;charset=utf8mb4";
    $option = [
        // 静的プレースホルダを指定
        PDO::ATTR_EMULATE_PREPARES => false,
        // 複文実行を禁止
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    //
    //
    $dbh = new PDO($dsn, 'ユーザー名', 'パスワード', $option);
} catch (PDOException $e) {
    // 
    echo $e->getMessage();
    exit; // 
}

