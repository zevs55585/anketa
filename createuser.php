<?
require("db.php");


$result = mysqli_query($link, "INSERT INTO `users` (`name`, `email`, `password`,`admin`) VALUES ('".$_GET["name"]."', '".$_GET["email"]."', '".$_GET["password"]."',0);");
if (!$result) {
    die('Неверный запрос: ' . mysqli_error($link));
}

header("Location: index.php")
?>