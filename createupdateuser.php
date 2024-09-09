<?php
  require("db.php");


  $queryUpdate = sprintf('UPDATE user SET name = "%s", email="%s", password="%s" WHERE id = %d', $_GET["name"], $_GET["email"], $_GET["password"], $_GET["id"]);
  $result = mysqli_query($link,$queryUpdate );

  if (!$result) {
    die('Неверный запрос: ' . mysqli_error($link));
}
$_SESSION["user"]["name"]=$_GET["name"];
$_SESSION["user"]["email"]=$_GET["email"];
$_SESSION["user"]["password"]=$_GET["password"];

  header("Location: user.php")

?>