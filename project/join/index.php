<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>新規会員登録</title>
</head>
<body>
<?php
if ('1' === @$_GET['error']) {
    echo '<FONT COLOR="RED">※入力にエラーがありました。 ブラウザバックで戻ると入力内容を引き継ぎます<br></FONT>';
}
    
?>
    
    <p>必要事項をご記入ください</p>
  <form action="register.php" method="post" enctype="multipart/form-data">
<dl>
  <dt>ユーザー名<font color="red">　必須</font></dt>
  <dd>
    <input type="text" name="name" size="35" maxlength="255" value="">
  </dd>
    
  <dt>メールアドレス<font color="red">　必須</font></dt>
  <dd>
    <input type="email" name="mail" size="35" maxlength="255" value="">
  </dd>
    
  <dt>パスワード<font color="red">　必須</font></dt>
  <dd>
    <input type="password" name="pass" size="10" maxlength="20" value="">
  </dd>
</dl>
  <div><input type="submit" value="登録"></div>
  </form>
</body>
</html>