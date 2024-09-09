<?php
require("db.php");
print_r($_GET);

$user_id = $_SESSION["user"]["id"];
$date = mysqli_real_escape_string($link, $_GET["date"]);
$name = mysqli_real_escape_string($link, $_GET["name"]);
$description = mysqli_real_escape_string($link, $_GET["description"]);
$category = mysqli_real_escape_string($link, $_GET["category_id"]);
$status = mysqli_real_escape_string($link, $_GET["status"]);
$due_date= mysqli_real_escape_string($link, $_GET["due_date"]);

$sql = "INSERT INTO `tasks` (`user_id`, `date`, `name`, `description`, `category_id`, `status`, `due_date`)
        VALUES ('$user_id', '$date', '$name', '$description', '$category', '$status', '$due_date')";

$result = mysqli_query($link, $sql);
if (!$result) {
    die('Неверный запрос: ' . mysqli_error($link));
} else {
    header("Location: index.php");
    exit;
}

//$result = mysqli_query($link, "INSERT INTO `expenses_and_incomes` (`date`, `type`, `category`,`amount`,`description`) VALUES ('".$_GET["date"]."', '".$_GET["type"]."', '".$_GET["category"]."','".$_GET["amount"]."', '".$_GET["description"]."');");
//if (!$result) {
// /  die('Неверный запрос: ' . mysqli_error($link));
//}
//if (isset($_SESSION["user"]) && $_SESSION["user"]["id"]) {

//    $queryTemplate_InsertRent = "INSERT INTO `expenses_and_incomes` (`user_id`, `date`, `type`, `category`,`amount`,`description`) VALUES (%d, now(), %d, %d, %d, %d)";

//    $sqlInsertRent = sprintf($queryTemplate_InsertRent, $_SESSION["user"]["id"], $_GET["date"], $_GET["type"], $_GET["category"], $_GET["amount"], $_GET["description"]);

//    $result = mysqli_query($link, $sqlInsertRent);
//    if (!$result) {
//        die('Неверный запрос: ' . mysqli_error($link));
 //   }
//}

//$result = mysqli_query($link, "INSERT INTO `expenses_and_incomes` (`user_id`,`date`, `type`, `category`,`amount`,`description`) VALUES ('$user_id".$_GET["date"]."', '".$_GET["type"]."', '".$_GET["category"]."','".$_GET["amount"]."', '".$_GET["description"]."');");
//if (!$result) {
//    die('Неверный запрос: ' . mysqli_error($link));
//}
header("Location: index.php")
?>

