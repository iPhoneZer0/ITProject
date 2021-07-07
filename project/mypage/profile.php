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
<h2>登録内容</h2>
    &raquo;<a href="up.php">登録情報の変更</a><br>

  <table border="1">
  <tr>
    <td>ユーザーID</td>
    <td><?php echo htmlspecialchars($_SESSION['auth']['id'], ENT_QUOTES, 'utf-8'); ?></td>
  </tr>

  <tr>
    <td>ユーザー名</td>
    <td><?php echo htmlspecialchars($_SESSION['auth']['name'], ENT_QUOTES, 'utf-8'); ?>さん</td>
  </tr>
      
  <tr>
    <td>メールアドレス</td>
    <td><?php echo htmlspecialchars($_SESSION['auth']['mail'], ENT_QUOTES, 'utf-8'); ?></td>
  </tr>
  
  <tr>
    <td>パスワード</td>
    <td>セキュリティ上、表示できません</td>
  </tr>
      
  </table>

    
 <a href="index.php">マイページに戻る</a>   
    


    
</body>
</html>