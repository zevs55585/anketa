<?php
require("db.php");


$result = mysqli_query($link, 'SELECT * From users Where email = "'.$_GET['email'].'"');
if (!$result) {
    die('Неверный запрос: ' . mysqli_error($link));
}


$r = mysqli_fetch_assoc($result);

	if ($r["password"] != $_GET["password"]) {
		header("Location: auth.php?error=не верный логин или пароль");

	}else {
		$_SESSION['user'] = $r;
		header("Location: index.php");
	}


//print_r($resoult);

mysqli_close($link);
?>


	</body>
</html>