<?php
	if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys") {
?>
<html><body>
Bonjour Zaz<br />
<img src='<?php
		$file = file_get_contents('../img/42.png');
		$base64_img = base64_encode($file);
		echo "data:image/png;base64,".$base64_img;
?>'>
</body></html>
<?php
	}
	else {
		header("WWW-Authenticate: Basic realm=''Espace membres''");
		header("HTTP/1.0 401 Unauthorized");
		header("Content-Type: text/html");
?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
<?php
	}
?>
