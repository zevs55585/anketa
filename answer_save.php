<?
require("db.php");

print_r($_GET);
print_r($_POST);

//SELECT DISTINCT anketa_id, user_id FROM `answers`;  -- все заполненные анкеты каждого пользователя
//SELECT v.name as vopros, o.text as otvet, a.text as otvet_text from answers a join vopros v on a.vopros_id = v.id join otvet o on o.id = a.otvet_id where a.user_id = 1 and a.anketa_id = 1; -- как пользоватеь ответил на вопрос
//SELECT a.anketa_id, v.name as vopros, o.text as otvet, a.text as otvet_text, count(a.otvet_id) as kolvo from answers a join vopros v on a.vopros_id = v.id join otvet o on o.id = a.otvet_id where a.anketa_id = 1 group by a.anketa_id, v.name, o.text, a.text ORDER by v.name asc; -- для рисования диаграммыколличества ответов к конкретной анкете.


function saveAnswer($link, $user_id, $anketa_id, $vopros_id, $otvet_id, $text) {
    $result = mysqli_query($link, "INSERT INTO `answers` (`user_id`, `anketa_id`, `vopros_id`,`otvet_id`, `text`) VALUES ('$user_id', '$anketa_id', '$vopros_id', '$otvet_id', '$text');");
    if (!$result) {
        die('Неверный запрос: ' . mysqli_error($link));
    }
}

foreach ($_POST['vopros_id'] as $vopros_id => $v) {
    if (is_array($v['id'])) {
        foreach ($v['id'] as $k => $id) {
            saveAnswer($link, $_SESSION['user']['id'], $_POST['anketa_id'], $vopros_id, $id, '');
        }
    } else {
        saveAnswer($link, $_SESSION['user']['id'], $_POST['anketa_id'], $vopros_id, $v['id'], $v['text']);
    }
}

//header("Location: index.php")
?>