<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Буракова Полина Юрьевна,221-362,лр.9,вар.2</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <img src="logo.png" alt="Логотип университета">
    <h1>Буракова Полина Юрьевна</h1>
    <h3>Группа 221-362</h3>
    <h3>Лабораторная работа 9 - Вариант 2</h3>
  </header>
  <main>
    <form method="POST">
      <!-- Инициализация числовых переменных -->
      <label for="startValue">Начальное значение аргумента:</label>
      <input type="number" id="startValue" name="startValue">

      <label for="numValues">Количество вычисляемых значений функции:</label>
      <input type="number" id="numValues" name="numValues">

      <label for="step">Шаг изменения значения аргумента:</label>
      <input type="number" id="step" name="step">

      <label for="maxValue">Максимальное значение функции:</label>
      <input type="number" id="maxValue" name="maxValue">

      <label for="minValue">Минимальное значение функции:</label>
      <input type="number" id="minValue" name="minValue">

      <!-- Инициализация строковой переменной -->
      <label for="markupType">Тип формируемой верстки:</label>
      <input type="text" id="markupType" name="markupType">

      <!-- Вычисление значений функции -->
      <button type="submit">Вычислить значения функции</button>
    </form>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $startValue = $_POST['startValue'];
  $numValues = $_POST['numValues'];
  $step = $_POST['step'];
  $maxValue = $_POST['maxValue'];
  $minValue = $_POST['minValue'];
  $markupType = $_POST['markupType'];
  $x = $startValue;
  if ($markupType == 'B') {  // если тип верстки B
    echo '<ul>';  // начинаем список
  } else if ($markupType == 'C') {  // если тип верстки C
    echo '<ol>';  // начинаем нумерованный список
  } else if ($markupType == 'D') {  // если тип верстки D
    echo '<table border="1" cellspacing="0" cellpadding="2">';
    echo '<tr><th>Номер</th><th>Аргумент</th><th>Значение функции</th></tr>';
  } else if ($markupType == 'E') {  // если тип верстки E
    echo '<div class="block-wrapper">';
  }

  $values = [];  // создаем пустой массив для хранения значений функции

  for ($i = 0; $i < $numValues; $i++, $x += $step) {
    if ($x <= 10) {
      $y = round((10 + $x) / $x);
    } else if ($x < 20 && $x > 10) {
      $y = round(($x / 7) * ($x - 2));
    } else {
      if ($x >= 20) {
        $y = round($x * 8 + 2);
      } else {
        $y = null;
      }
    }

    if ($markupType == 'A') {  // если тип верстки A
      if ($y >= $minValue && $y <= $maxValue) {
        echo 'f(' . $x . ')=' . $y;
        if ($i < $numValues - 1) {
          echo '<br>';
        }
      }
    } else if ($markupType == 'B') {  // если тип верстки B
      // выводим данные как пункт списка
      if ($y >= $minValue && $y <= $maxValue) {
      echo '<li>f(' . $x . ')=' . $y . '</li>';
      }
    } else if ($markupType == 'C') {  // если тип верстки C
      // выводим данные как элемент нумерованного списка
      if ($y >= $minValue && $y <= $maxValue) {
      echo '<li>f(' . $x . ')=' . $y . '</li>';
      }
    } else if ($markupType == 'D') {  // если тип верстки D
      // выводим данные в таблице
      if ($y >= $minValue && $y <= $maxValue) {
        echo '<tr><td>' . ($i+1) . '</td><td>' . $x . '</td><td>' . $y . '</td></tr>';
      }
    } else if ($markupType == 'E') {  // если тип верстки E
      // выводим данные в блоке
      if ($y >= $minValue && $y <= $maxValue) {
        echo '<div class="block">' . 'f(' . $x . ')=' . $y . '</div>';
      }
    }


    if ($y !== null) {  // добавляем значение функции в массив, только если оно не равно null
      $values[] = $y;
    }

    $x += $step;  // увеличиваем x на step
  }

  if ($markupType == 'B') {  // если тип верстки B
    echo '</ul>';  // закрываем тег списка
  } else if ($markupType == 'C') {  // если тип верстки C
    echo '</ol>';  // закрываем тег нумерованного списка
  } else if ($markupType == 'D') {  // если тип верстки D
    echo '</table>';  // закрываем таблицу
  } else if ($markupType == 'E') {  // если тип верстки E
    echo '</div>';  // закрываем блок-wrapper
  }

  // Вычисление и вывод максимального, минимального, среднего арифметического и суммы значений функции
  $max = max($values);
  $min = min($values);
  $average = array_sum($values) / count($values);
  $sum = array_sum($values);

  echo "<br>Максимальное значение: $max<br><br>";
  echo "Минимальное значение: $min<br><br>";
  echo "Среднее арифметическое: $average<br><br>";
  echo "Сумма значений: $sum<br>";
}
?>
</main>
<footer>
<p>Тип верстки: <?php echo $markupType; ?></p>
</footer>
</body>
</html>
          