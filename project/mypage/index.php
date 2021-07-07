<?php
// セッション開始
session_start();

if (false === isset($_SESSION['auth'])) {
    header('Location: ../login.php');
    exit;}
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>PHPのマイページ機能</title>
</head>

<body>
<h2>マイページ</h2>
ようこそ
    <?php echo htmlspecialchars($_SESSION['auth']['name'], ENT_QUOTES, 'utf-8'); ?> さん
    &raquo;<a href="profile.php">登録情報の確認</a><br>

  <h3>新機能:メール機能は<a href="../message/">こちら</a></h3><br><br>

    
  <br>    
  <a href="../logout.php">ログアウト</a>


</body>
</html>