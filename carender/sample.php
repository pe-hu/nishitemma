<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$fp = fopen('sample.csv', 'a+b');
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
<li><h1><b>_月<br>___</b></h1></li>
<li><h1>FEATURED</h1>
__(__) <a href="___">Title</a>
</li>
</ul>
</hedder>
<ul class="date">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="<?=h($row[0])?>">
  <b class="day"><?=h($row[1])?></b>
  <p class="<?=h($row[2])?>">
    <i></i><br>
    <u><?=h($row[3])?></u>
  </p>
  <p class="<?=h($row[4])?>">
    <i></i><br>
    <u><?=h($row[5])?></u>
  </p>
  <p class="<?=h($row[6])?>">
    <i></i><br>
    <u><?=h($row[7])?></u>
    <span><?=h($row[8])?></span>
  </p>
  <p class="<?=h($row[9])?>">
    <u><?=h($row[10])?></u><br/>
    <span><?=h($row[11])?></span>
  </p>
</li>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</ul>
</body>
</html>
