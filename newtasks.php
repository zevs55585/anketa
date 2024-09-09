<?php
require("db.php");


$result = mysqli_query($link, 'SELECT * From author');
$categ=mysqli_query($link, 'SELECT * From category');
if (!$result) {
    die('Неверный запрос: ' . mysqli_error($link));
}
?>
<html>
	<head>
		<title>Book shop - newbook</title>
	</head>
	<body>
<a href="index.php">список книг</a>
<br/>

<form action="createbook.php">

<table border=1>
<tr>
	<td>
		Название
	</td>
	<td>
		<input name="name" type="text"/>
	</td>
</tr>
<tr>
	<td>
		Описание книги
	</td>
	<td>
		<input name="description" type="text"/>
	</td>
</tr>
<tr>
	<td>
		Дата
	</td>
	<td>
		<input name="date" type="text"/>
	</td>
</tr>
<tr>
	<td>
		статус
	</td>
	<td>
		<select name="status">

    			<option value="0">свободен</option>
    			<option value="1">занято</option>

   		</select>
	</td>
</tr>
<tr>
	<td>
		Цена аренды
	</td>
	<td>
		<input name="rent_price" type="text"/>
	</td>
</tr>
<tr>
	<td>
		Цена продажи
	</td>
	<td>
		<input name="sale_price" type="text"/>
	</td>
</tr>
<tr>
	<td>
		Автор
	</td>
	<td>
		<select name="author_id">
			<?
			while ($r = mysqli_fetch_assoc($result)) {
			?>
    			<option value="<?= $r["id"] ?>"><?= $r["name"]?></option>
    		<?
    		}
    		?>
   		</select>
	</td>
</tr>
<tr>
	<td>
		Категория
	</td>
	<td>
		<select name="category_id">
			<?
			while ($c = mysqli_fetch_assoc($categ)) {
			?>
    			<option value="<?= $c["id"] ?>"><?= $c["name"]?></option>
    		<?
    		}
    		?>
   		</select>
	</td>
</tr>
</table>
<input type="submit"/>
 </form>

	</body>
</html>