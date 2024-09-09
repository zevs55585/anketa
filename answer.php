<?php
require("db.php");

print_r($_GET);

//SELECT name, type, vopros_id, anketa_id FROM `vopros` v JOIN Vopros_anketa va on va.vopros_id = v.id WHERE va.anketa_id=1;
//SELECT o.* FROM `vopros` v JOIN Vopros_anketa va on va.vopros_id = v.id JOIN otvet o on o.vopros_id = v.id WHERE va.anketa_id=1;


function allvoprosByanket($link, $anketa_id) {
    $result = mysqli_query($link, "SELECT name, type, vopros_id, anketa_id FROM `vopros` v JOIN Vopros_anketa va on va.vopros_id = v.id WHERE va.anketa_id=$anketa_id");



    if (!$result) {
        die('Неверный запрос: ' . mysqli_error($link));
   }

    $res = [];
    while ($u = mysqli_fetch_assoc($result)){   //$r  переменная
        $res[] = $u;
    }
    return $res;
}

function allotvetByanket($link, $anketa_id) {
    $result = mysqli_query($link, "SELECT o.* FROM `vopros` v JOIN Vopros_anketa va on va.vopros_id = v.id JOIN otvet o on o.vopros_id = v.id WHERE va.anketa_id=$anketa_id");

    if (!$result) {
        die('Неверный запрос: ' . mysqli_error($link));
   }

    $res = [];
    while ($u = mysqli_fetch_assoc($result)){   //$r  переменная
        $res[] = $u;
    }
    return $res;
}
?>
<html>
    <head>
        <title>opros - opros</title>
    </head>
    <body>
<a href="index.php">главная страница</a>
<br/>

<form action="answer_save.php" method="post">

<?
$allOtvets = allotvetByanket($link, $_GET['id']);
$otvetsByVopros = [];
foreach ($allOtvets as $k => $v) {
    $otvetsByVopros[$v['vopros_id']][] = $v;
}

?>
<table border=1>
    <?foreach (allvoprosByanket($link, $_GET["id"]) as $key => $u) {
      ?>
      <tr>
    <td>
        <? echo $u["name"] ?>
    </td>
    <td>

        <?
        if ($u['type'] == 1 || $u['type'] == 2) {
            if ($u['type'] == 1) {
                echo "<select name='vopros_id[".$u["vopros_id"]."][id]'>";
            } else {
                echo "<select multiple size=".count($otvetsByVopros[$u['vopros_id']])." name='vopros_id[".$u["vopros_id"]."][id][]'>";
            }

            foreach ($otvetsByVopros[$u['vopros_id']] as $k => $o){
                echo "<option value='".$o['id']."'>".$o['text']."</option>";
            }
            echo "</select>";
        } else {
            echo "<input type='hidden' name='vopros_id[".$u["vopros_id"]."][id]' value='".$otvetsByVopros[$u['vopros_id']][0]['id']."'/>";
            echo "<input name='vopros_id[".$u["vopros_id"]."][text]' value='".$otvetsByVopros[$u['vopros_id']][0]['text']."'/>";
        }
        ?>
    </td>
</tr>
      <?


}
echo "<input type='hidden' name='anketa_id' value='".$_GET['id']."'/>";
?>

</table>
<input type="submit"/>
 </form>

    </body>
</html>