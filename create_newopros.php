<?php
require("db.php");


// Подключение к базе данных


// Получение данных из базы данных
$query = "SELECT a.anketa_id, v.name as vopros, o.text as otvet, count(a.otvet_id) as kolvo
          FROM answers a
          JOIN vopros v ON a.vopros_id = v.id
          JOIN otvet o ON o.id = a.otvet_id
          WHERE a.anketa_id = 1
          GROUP BY a.anketa_id, v.name, o.text
          ORDER BY v.name ASC";
$result = mysqli_query($link, $query);

// Подготовка данных для диаграммы
$labels = array();
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['vopros'] . " - " . $row['otvet'];
    $data[] = $row['kolvo'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Результаты анкетирования</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
  <h1>диаграмма анкетирования</h1>
  <a href="index.php">Главная сраница</a>
    <canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Количество ответов',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>