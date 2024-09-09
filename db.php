<?
session_start();
$link = mysqli_connect('localhost','root','');
if (!$link) {
	die('Ошибка оединения:' . mysql_error());
}

$db_selected = mysqli_select_db($link,'opros');
if (!$db_selected){
	die('Неудалось подключиться к базе opros:' . mysqli_error($link));
}
?>