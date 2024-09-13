<?php
require("db.php");


// Проверка соединения
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Обработка формы для изменения вопроса
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vopros_id = $_POST["vopros_id"];
    $vopros_name = $_POST["vopros_name"];
    $vopros_type = $_POST["vopros_type"];

    // Обновление вопроса в базе данных
    $sql = "UPDATE vopros SET name = '$vopros_name', type = '$vopros_type' WHERE id = $vopros_id";
    if ($link->query($sql) === TRUE) {
        echo "Вопрос обновлен успешно.";
    } else {
        echo "Ошибка обновления вопроса: " . $conn->error;
    }

    // Обработка предлагаемых ответов
    $otvet_ids = $_POST["otvet_id"];
    $otvet_texts = $_POST["otvet_text"];

    // Удаление старых ответов
    $sql = "DELETE FROM otvet WHERE vopros_id = $vopros_id";
    if ($link->query($sql) === TRUE) {
        // Добавление новых ответов
        for ($i = 0; $i < count($otvet_texts); $i++) {
            $sql = "INSERT INTO otvet (text, vopros_id) VALUES ('$otvet_texts[$i]', $vopros_id)";
            if ($link->query($sql) === TRUE) {
                echo "Ответ добавлен успешно.";
            } else {
                echo "Ошибка добавления ответа: " . $link->error;
            }
        }
    } else {
        echo "Ошибка удаления старых ответов: " . $link->error;
    }
}

// Получение данных о вопросе и предлагаемых ответах
$result = mysqli_query($link, "SELECT * FROM vopros WHERE id = '$vopros_id'");
if (!$result) {
    die('Неверный запрос: ' . mysqli_error($link));
}
if ($result->num_rows > 0) {
    $vopros = $result->fetch_assoc();
    // Дальнейшая обработка данных вопроса
} else {
    // Обработка случая, когда вопрос не найден
}

$vopros = $result;
$result = mysqli_query($link, "SELECT * FROM otvet WHERE vopros_id = '$vopros_id'");
if (!$result) {
    die('Неверный запрос: ' . mysqli_error($link));
}
if ($result->num_rows > 0) {
    $vopros = $result->fetch_assoc();
    // Дальнейшая обработка данных вопроса
} else {
    // Обработка случая, когда вопрос не найден
}


$otvety = $result;

// Закрытие соединения с базой данных
$link->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Изменение вопроса и ответов</title>
</head>
<body>
    <h1>Изменение вопроса и ответов</h1>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="vopros_id" value="<?php echo $vopros["id"]; ?>">
        Вопрос: <input type="text" name="vopros_name" value="<?php echo $vopros["name"]; ?>"><br>
        Тип вопроса:
        <select name="vopros_type">
            <option value="1" <?php if ($vopros["type"] == "1") echo "selected"; ?>>Один ответ</option>
            <option value="2" <?php if ($vopros["type"] == "2") echo "selected"; ?>>Множественный выбор</option>
            <option value="3" <?php if ($vopros["type"] == "3") echo "selected"; ?>>Текстовый ответ</option>
        </select><br>
        Предлагаемые ответы:<br>
        <?php
        foreach ($otvety as $otvet) {
            echo "Ответ: <input type='text' name='otvet_text[]' value='" . $otvet["text"] . "'><br>";
        }
        ?>
        <input type="submit" name="submit" value="Сохранить">
    </form>
</body>
</html>