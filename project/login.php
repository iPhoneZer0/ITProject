<!DOCTYPE html><!--	https://dev2.m-fr.net/kotaka/IT/project/login.php		!-->
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ログイン</title>
  </head>
  <body>
  	<p>メールアドレスとパスワードを記入してログインしてください。</p>
  	<p>入会手続きがまだの方はこちらからどうぞ。</p>
  	<p>&raquo;<a href="join/">入会手続きをする</a></p>
<?php
if ('1' === @$_GET['error']) {
    //echo "ログインにエラーがありました。<br>";
    echo '<FONT COLOR="RED">ログインにエラーがありました。<br></FONT>';
}
    
?>
  	<form action="./login_main.php" method="post">
  		<dl>
	<dt>メールアドレス</dt>
	<dd>
		<input type="text" name="mail" size="35" maxlength="255"
				value="">
        
	</dd>
            
	<dt>パスワード</dt>
	<dd>
		<input type="password" name="pass" size="35" maxlength="255"
				value="">
	</dd>
</dl>
  		<input type="submit" value="ログインする">
  	</form>
  </body>
</html>