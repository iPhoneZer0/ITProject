<?php

try {
    //
    $dsn = "mysql:dbname=kotaka;host=localhost;charset=utf8mb4";
    $option = [
        // 静的プレースホルダを指定
        PDO::ATTR_EMULATE_PREPARES => false,
        // 複文実行を禁止
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    //
    //
    $dbh = new PDO($dsn, 'kotaka', 'pakotakass', $option);
} catch (PDOException $e) {
    // 
    echo $e->getMessage();
    exit; // 
}

