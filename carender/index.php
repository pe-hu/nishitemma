<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$fp = fopen('1901.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [
      $open,
      $date,
      $cafe,
      $kissa,
      $shop,
      $hour,
      $gallery,
      $time,
      $title,
      $event,
      $info,
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
  <div id="menu"></div>

  <h1 class="month">
    9月
    <br>September
  </h1>

  <ul class="date">
    <?php if (!empty($rows)): ?>
    <?php foreach ($rows as $row): ?>
    <li class="<?=h($row[0])?>">
      <b class="day">
        <?=h($row[1])?>
      </b>
      <p class="<?=h($row[2])?>">
        <i></i><br>
        <u>
          <?=h($row[3])?>
        </u>
      </p>
      <p class="<?=h($row[4])?>">
        <i></i><br>
        <u>
          <?=h($row[5])?>
        </u>
      </p>
      <p class="<?=h($row[6])?>">
        <i></i><br>
        <u>
          <?=h($row[7])?>
        </u>
        <span>
          <?=h($row[8])?>
        </span>
      </p>
      <p class="<?=h($row[9])?>">
        <u>
          <?=h($row[10])?>
        </u><br />
        <span>
          <?=h($row[11])?>
        </span>
      </p>
    </li>
    <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>
  </ul>

  <form id="collection" method="GET">
    <select id="calendar" name="month">
      <option>2019</option>
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
    <button type="submit" name="submit">決定</button>
  </form>

  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    $(function () {
      $("#menu").load("../menu.html");
    })
  </script>
</body>

</html>