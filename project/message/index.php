<?php   //  https://dev2.m-fr.net/kotaka/IT/project/login.php
// セッション開始
session_start();

if (false === isset($_SESSION['auth'])) {
    header('Location: ../login.php');
    exit;
}

require('../pdo.php');

//もしここにsendのセッション[send]が来たら削除
unset($_SESSION['send']);
   
$sql =("SELECT * FROM mail WHERE receiver ='" . $_SESSION['auth']['name'] . "'");

// SQL実行
$res = $dbh->query($sql);
//queryのためexecuteは要らない  $res->execute();

//配列の取得
$result = $res->fetchAll();
// 接続を閉じる
//$dbh = null;

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>メッセージ機能</title>
</head>
<body>
<h2>Myメッセージページ</h2>
<h3>受信したメッセージを確認する</h3>
<table border="1">
    <tr>
        <th>送信者</th>
        <th>メッセージ</th>
    </tr>

<?
    if ([] === $result) {
        //空の時用の出力処理 
        echo "<td colspan=2>あなた宛てのメールはありません</td>"; 
        } else if (false === $result) {
        //エラー時の処理
        echo "SQLエラー";
        } else {
            for($j=0;$j<count($result);$j++){
                echo "<tr>";
                echo "<td>".htmlspecialchars($result[$j][1])."</td>\n";
                echo "<td>".htmlspecialchars($result[$j][3])."</td>\n";  
                echo "</tr>";    
            }
    }
?>
</table>

<h3>メッセージの作成する&raquo;<a href="send.php">こちら</a></h3>

<h3>メッセージの送信履歴を確認する</h3>
<table border="1">
<tr>
        <th>送信先</th>
        <th>メッセージ</th>
    </tr>

<?
    $sql =("SELECT * FROM mail WHERE sender ='" . $_SESSION['auth']['name'] . "'");

	// SQL実行
	$res = $dbh->query($sql);
    $res->execute();

    //配列の取得
    $result = $res->fetchAll();
    if ([] === $result) {
        //空の時用の出力処理 
        echo "<td colspan=2>あなたが送信したメールはありません</td>"; 
        } else if (false === $result) {
        //エラー時の処理
        echo "SQLエラー";
        } else {
            for($j=0;$j<count($result);$j++){
                echo "<tr>";
                echo "<td>".htmlspecialchars($result[$j][2])."</td>\n";
                echo "<td>".htmlspecialchars($result[$j][3])."</td>\n";  
                echo "</tr>"; 
                
            }            
    }
?>
</table>
<br><br>
トップぺージに戻る<a href="../mypage/">こちら</a>

</body>
</html>

<?php
//var_dump($_SESSION['auth']);
//echo htmlspecialchars($_SESSION['auth']['id'], ENT_QUOTES, 'utf-8');
/*
// ログインのマーキング
$_SESSION['auth']['aaa'] = $user['aaa'];
$_SESSION['auth']['aaa'] = $user['aaa'];
$_SESSION['auth']['aaa'] = $user['aaa'];

$data = $pre->fetchAll();
if ([] === $data) {
空の時用の出力処理
} else if (false === $data) {
    エラー時の処理
} else {
    foreach($data as $datum) {
    $datumに入っているデータを各個出力
    }
}

*/
?>