<?php
require("db.php");
print_r($_GET);


//SELECT name, type, vopros_id, anketa_id FROM `vopros` v JOIN Vopros_anketa va on va.vopros_id = v.id WHERE va.anketa_id=1;
//SELECT o.* FROM `vopros` v JOIN Vopros_anketa va on va.vopros_id = v.id JOIN otvet o on o.vopros_id = v.id WHERE va.anketa_id=1;

?>

<!DOCTYPE html>
<html>
<head>
  <title>Добавить новую анкету</title>
  <!--<link rel="stylesheet" href="style.css">-->
</head>
<body>
  <div style="position:absolute; right:10px;top:10px;">
    <a href="user.php"><?=$_SESSION["user"]["name"]?></a></div>
  <h1>Добавить новую анкету</h1>
  <form action="create_newopros.php" method="GET">
    <table border="1">
      <tr>
        <td>Название Анкеты</td>
        <td><input name="name" type="text"/></td>
      </tr>
      <tr>
        <td>Название вопроса</td>
        <td><input type="text" name="name_vopros"></td>
      </tr>
      <tr>
        <td>вариант ответа</td>
        <td><input type="text" name="name_onvet"></td>
      </tr>


    </table>
<input type="submit"/>
  </form>
</body>
</html>