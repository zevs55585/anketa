<html>
    <head>
        <title>Book shop - ayth</title>
    </head>
    <body>
<a href="index.php">список книг</a>
<br/>

<form action="login.php">
<?
if (isset($_GET['error'])){
    echo $_GET['error'];
}
?>
<table border=1>

<tr>
    <td>
        Электронная почта
    </td>
    <td>
        <input name="email" type="text"/>
    </td>
</tr>
<tr>
    <td>
        Пароль
    </td>
    <td>
        <input name="password" type="password"/>
    </td>
</tr>
</table>
<input type="submit" value="войти"/>
 </form>

    </body>
</html>