<?php

mb_language("ja");
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Tokyo');

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$month = "2019/09";
if (isset($_GET["month"])) {
  $month = $_GET["month"];
}

$source_file = "2019/" . $month . ".csv";

$fp = fopen($source_file, 'r');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  flock($fp, LOCK_EX);
  fputcsv($fp, [
    $open,
    $date,
    $cafe,
    $kissa,
    $shop,
    $hour,
    $show,
    $time,
    $title,
    $event,
    $info,
    $name,
    $more
  ]);
  rewind($fp);
}
flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
  $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <title>∧° ┐ | creative, community space</title>
  <link rel="stylesheet" href="calendar.css" />
  <link rel="stylesheet" href="collection.css" />
</head>

<body>
  <form id="collection" method="GET">
    <select id="calendar" name="month">
      <option value="01">1月</option>
      <option value="02">2月</option>
      <option value="03">3月</option>
      <option value="04">4月</option>
      <option value="05">5月</option>
      <option value="06">6月</option>
      <option value="07">7月</option>
      <option value="08">8月</option>
      <option value="09">9月</option>
    </select>
    <button type="submit" name="submit">2019</button>
  </form>

  <ul class="date">
    <?php if (!empty($rows)) : ?>
      <?php foreach ($rows as $row) : ?>
        <li class="<?= h($row[0]) ?>">
          <b class="day">
            <?= h($row[1]) ?>
          </b>
          <p class="<?= h($row[2]) ?>">
            <i></i><br>
            <u>
              <?= h($row[3]) ?>
            </u>
          </p>
          <p class="<?= h($row[4]) ?>">
            <i></i><br>
            <u>
              <?= h($row[5]) ?>
            </u>
          </p>
          <p class="<?= h($row[6]) ?>">
            <i></i>
            <br>
            <u>
              <?= h($row[7]) ?>
            </u>
            <span>
              <?= h($row[8]) ?>
            </span>
          </p>
          <p class="<?= h($row[9]) ?>">
            <u><?= h($row[10]) ?></u>
            <i><?= h($row[12]) ?></i>
            <span><?= h($row[11]) ?></span>
          </p>
        </li>
      <?php endforeach; ?>
    <?php else : ?>
    <?php endif; ?>
  </ul>
  <hr />
  <div id="menu"></div>
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#menu").load("../menu.html");
    })
  </script>
</body>

</html>