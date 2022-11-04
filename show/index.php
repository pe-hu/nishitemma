<?php

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$date = (string)filter_input(INPUT_POST, 'date'); // $_POST['date']
$title = (string)filter_input(INPUT_POST, 'title'); // $_POST['title']
$info = (string)filter_input(INPUT_POST, 'info'); // $_POST['info']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$category = (string)filter_input(INPUT_POST, 'category'); // $_POST['category']
$click = (string)filter_input(INPUT_POST, 'click'); // $_POST['click']

$fp = fopen('nishitemma.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  flock($fp, LOCK_EX);
  fputcsv($fp, [$date, $title, $info, $link, $category, $click]);
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>∧° ┐ | creative, community space</title>
  <link rel="stylesheet" href="index.css" />
  <link rel="stylesheet" href="../index.css" />
  <link rel="stylesheet" href="../menu.css" />
  <link rel="stylesheet" href="../floor.css" />
</head>

<body id="box">
  <div id="menu"></div>
  <div id="floor"></div>

  <main>
    <div class="refine">
      <p>西天満のペフで開催したすべての催し</p>
      <input id="refine-0" type="radio" name="refine-btn" checked><span class="refine-0"><b>✔</b></span>
      <label class="refine-btn all" for="refine-0">ALL</label>
      <input id="refine-1" type="radio" name="refine-btn"><span class="refine-1"><b>✔</b></span>
      <label class="refine-btn show" for="refine-1">EXHIBITION</label>
      <input id="refine-2" type="radio" name="refine-btn"><span class="refine-2"><b>✔</b></span>
      <label class="refine-btn live" for="refine-2">LIVE/PERFORMANCE</label>
      <input id="refine-3" type="radio" name="refine-btn"><span class="refine-3"><b>✔</b></span>
      <label class="refine-btn dj" for="refine-3">DJ PARTY</label>
      <input id="refine-4" type="radio" name="refine-btn"><span class="refine-4"><b>✔</b></span>
      <label class="refine-btn shop" for="refine-4">POP UP SHOP</label>
      <input id="refine-5" type="radio" name="refine-btn"><span class="refine-5"><b>✔</b></span>
      <label class="refine-btn workshop" for="refine-5">WORKSHOP</label>
      <input id="refine-6" type="radio" name="refine-btn"><span class="refine-6"><b>✔</b></span>
      <label class="refine-btn community" for="refine-6">COMMUNITY EVENT</label>
      <input id="refine-7" type="radio" name="refine-btn"><span class="refine-7"><b>✔</b></span>
      <label class="refine-btn residency" for="refine-7">RESIDENCY</label>
      <input id="refine-8" type="radio" name="refine-btn"><span class="refine-8"><b>✔</b></span>
      <label class="refine-btn members" for="refine-8">MEMBERS ONLY</label>
      <hr />
      <?php if (!empty($rows)) : ?>
        <?php foreach ($rows as $row) : ?>
          <div id="contents" class="refine-teims<?= h($row[4]) ?>">
            <a class="<?= h($row[3]) ?>" href="<?= h($row[3]) ?>"></a>
            <u><?= h($row[0]) ?></u>
            <p class="title"><?= h($row[1]) ?></p>
            <p class="info"><?= h($row[2]) ?></p>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <div id="contents" class="refine-teims">
          <a></a>
          <u>date</u>
          <p class="title">Title</p>
          <p class="info">infomation of this event</p>
        </div>
      <?php endif; ?>
    </div>
  </main>

  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#menu").load("../menu.html");
      $("#floor").load("../floor.html");
    })
  </script>
</body>

</html>