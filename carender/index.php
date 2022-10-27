<?php

mb_language("ja");
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Tokyo');

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$month = "sample";
if (isset($_GET["month"])) {
  $month = $_GET["month"];
}

$source_file = "" . $month . ".csv";

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
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="collection.css" />
</head>

<body>
  <form id="collection" method="GET">
    <select id="calendar" name="month">
      <option value="1901">1月</option>
      <option value="1902">2月</option>
      <option value="1903">3月</option>
      <option value="1904">4月</option>
      <option value="1905">5月</option>
      <option value="1906">6月</option>
      <option value="1907">7月</option>
      <option value="1908">8月</option>
      <option value="1909">9月</option>
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
            <span><?= h($row[11]) ?></span>
            <u>
              <?= h($row[10]) ?>
            </u>
            <br />
            <i>
              <?= h($row[12]) ?>
            </i>
          </p>
        </li>
      <?php endforeach; ?>
    <?php else : ?>
    <?php endif; ?>
  </ul>

  <div id="menu"></div>
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#menu").load("../menu.html");
    })
  </script>
</body>

</html>