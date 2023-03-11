<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Tokyo');

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$year = "2019";
$month = date("m");
if (isset($_GET["month"])) {
  $month = $_GET["month"];
}

$source_file = $month . ".csv";

$fp = fopen($source_file, 'r');
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
  <title>PHP Calendar</title>
  <link rel="stylesheet" href="index.css" />
  <link rel="stylesheet" href="calendar.css" />
  <style>
  @font-face {
    font-family: "Kevin Wild";
    src: url("/wp-content/uploads/kevinwildfont.ttf");
  }

  #index_form h1,
  .date b,
  .date i {
    font-family: "Kevin Wild", cursive;
  }
  </style>
</head>

<body>
  <form id="index_form" method="GET">
    <select id="calendar" name="month">
      <option disabled selected hidden>Select Month</option>
      <option value="1">1月</option>
      <option value="2">2月</option>
      <option value="3">3月</option>
      <option value="4">4月</option>
      <option value="5">5月</option>
      <option value="6">6月</option>
      <option value="7">7月</option>
      <option value="8">8月</option>
      <option value="9">9月</option>
      <option disabled value="10">10月</option>
      <option disabled value="11">11月</option>
      <option disabled value="12">12月</option>
    </select>
    <p class="month">
      <?php
      date_default_timezone_set('Asia/Tokyo');
      print(date($month) . "月")
      ?>
    </p>
    <button type="submit" name="submit">
      <?php
      print($year)
      ?>
    </button>
  </form>
  <ol class="date">
    <?php if (!empty($rows)) : ?>
      <?php foreach ($rows as $row) : ?>
        <li class="<?=h($row[0])?>">
          <b class="day"><?=h($row[1])?></b>
          <p>
            <u><?=h($row[3])?></u>
            <span><?=h($row[2])?></span>
            <i><?=h($row[4])?></i>
          </p>
        </li>
      <?php endforeach; ?>
    <?php else : ?>
    <?php endif; ?>
  </ol>
</body>

</html>
