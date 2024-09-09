<?php
  require("db.php");

    $result_id=$_GET['id'];
    $result = mysqli_query($link, 'SELECT * From users Where id = "'.$_GET['id'].'"');

    if (!$result) {
        die('Неверный запрос: ' . mysqli_error($link));
    }
    $result = mysqli_fetch_assoc($result);
?>
<html>
    <head>
        <title>Tasks - update user</title>
    </head>
    <body>
<a href="index.php">список задач</a>
<br/>

<form action="createupdateuser.php">

<table border=1>
<tr>
    <input type="hidden" name="id" value="<?=$result['id']?>">
    <td>
        Имя
    </td>
    <td>
        <input type="text" name="name"  value= "<?= $result['name'] ?>">
    </td>
</tr>
<tr>
    <td>
        Электронная почта
    </td>
    <td>
        <input name= "email" type="text"value="<?= $result['email'] ?>">
    </td>
</tr>
<tr>
    <td>
        Пароль
    </td>
    <td>
        <input name="password" type="text" value="<?= $result['password'] ?>">
    </td>
</tr>
</table>
<input type="submit"/>
 </form>

    </body>
</html>