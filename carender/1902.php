<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$open = (string)filter_input(INPUT_POST, 'open');
$day = (string)filter_input(INPUT_POST, 'week');
$open = (string)filter_input(INPUT_POST, 'week');
$cafe = (string)filter_input(INPUT_POST, 'cafe');
$shop = (string)filter_input(INPUT_POST, 'shop');
$gallery = (string)filter_input(INPUT_POST, 'gallery');
$topic = (string)filter_input(INPUT_POST, 'topic');
$event = (string)filter_input(INPUT_POST, 'event');
$time = (string)filter_input(INPUT_POST, 'time');
$title = (string)filter_input(INPUT_POST, 'title');
$price = (string)filter_input(INPUT_POST, 'price');
$discussion = (string)filter_input(INPUT_POST, 'discussion');

$fp = fopen('1902.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$open, $day, $week, $cafe, $shop, $gallery, $topic, $event, $time, $title, $price, $discussion]);
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>∧° ┐ | creative, community space</title>
<link rel="stylesheet" href="stylesheet.css"/>
<style>
</style>
</head>
<body>
<hedder>
<ul class="month">
<li><h1><b>2月<br>February</b></h1></li>
<li><h1>FEATURED</h1>
2 (sat) <a href="https://vg.pe.hu/jp/show/020219.html">サウンドチェック</a>
4 - 16 <a href="https://vg.pe.hu/2f/ms1.html">MS1</a>
10 (sun) <a href="https://vg.pe.hu/jp/show/021019.html">#10FEB19SUN</a>
22 - <a href="https://vg.pe.hu/2f/ns5.html">NS5</a>
25 (mon) <a href="https://vg.pe.hu/jp/show/022519.html">VAMPIRE✞HUNTER™ one man gig</a>
</li>
</ul>
</hedder>
<ul class="date">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="<?=h($row[0])?> <?=h($row[2])?>">
  <b class="day"><?=h($row[1])?></b>
  <p class="cafe <?=h($row[3])?>">
    <b></b><br>
    <u class="hour"></u>
  </p>
  <p class="shop <?=h($row[4])?>">
    <b></b><br>
    <u class="hour"></u>
  </p>
  <p class="gallery <?=h($row[5])?>">
    <b></b><br>
    <u class="hour"></u>
    <span class="topic"><?=h($row[6])?></span>
  </p>
  <p class="event <?=h($row[7])?>">
    <?=h($row[8])?><br/><u><?=h($row[9])?></u><br/>
    <span class="price"><?=h($row[10])?></span>
  </p>
  <p class="discussion <?=h($row[11])?>"><br/>
    <u></u>
  </p>
</li>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</ul>
</body>
</html>
