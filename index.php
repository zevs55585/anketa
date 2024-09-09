<?php
require("db.php");

print_r($_GET);

function allOprosByUser($link) {
    $result = mysqli_query($link, "SELECT * FROM `anketa`  ");


    if (!$result) {
        die('Неверный запрос: ' . mysqli_error($link));
   }

    $res = [];
    while ($u = mysqli_fetch_assoc($result)){   //$r  переменная
        $res[] = $u;
    }
    return $res;
}
$r = $_SESSION["user"]

?>
<!DOCTYPE html>
<html>
<head>
  <title>Журнал опросов</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div style="position:absolute; right:10px;top:10px;">
    <?
    if (!$_SESSION["user"]){
      ?>
      <a href="auth.php">Вход</a>
      <a href="registration.php">Зарегистрироваться</a>
      <?
    } else{
      ?>
      <a href="logout.php">Выход</a>
      <a href="user.php"><?=$_SESSION["user"]["name"]?></a>
      <?

    }
    ?>
  </div>
  <h1>задачи</h1>
  <table border="1">
    <tr>
      <td>название анкеты</td>
      <td></td>
    </tr>
    <?foreach (allOprosByUser($link) as $key => $u) {
      echo "<tr>";
      echo "<td>".$u["name"]."</td>"; // 3 столбец
      echo "<td><a href='answer.php?id=" . $u["id"] ."'>пройти опрос</a></td>";
      echo "</tr>\n";

}
?>
  </table>








</body>
</html>