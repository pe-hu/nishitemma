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
  <link rel="stylesheet" href="../index.css" />
  <link rel="stylesheet" href="../menu.css" />
  <link rel="stylesheet" href="../floor.css" />
  <style type="text/css">
    #contents {
      position: relative;
      width: 17.5vw;
      height: 17.5vw;
      padding: 1vw;
      margin: 0.5vw;
      float: left;
    }

    #contents .title {
      font-style: italic;
      margin: 0 0.5rem 0 0;
      font-size: 125%;
    }

    #contents .info {
      margin: 1.25vw 0 0;
      font-size: 75%;
    }

    #contents a {
      position: absolute;
      margin: 0;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      text-indent: -999px;
    }

    #contents a:hover {
      cursor: pointer;
      background-color: rgba(225, 225, 225, 0.25);
    }

    #contents .none {
      display: none;
    }

    .refine {
      clear: both;
      font-size: 1rem;
      padding: 0 2.5%;
    }

    .refine input[type=radio] {
      display: none;
    }

    .refine-btn {
      display: inline-block;
      margin: 0rem 0.5rem 0.25rem 0;
      padding: 0 0.25rem;
      cursor: pointer;
    }

    .show a {
      border: #000 0.1rem solid;
    }

    .live a {
      border: blue 0.1rem solid;
    }

    .dj a {
      border: gray 0.1rem solid;
    }

    .shop a {
      border: gold 0.1rem solid;
    }

    .workshop a {
      border: pink 0.1rem solid;
    }

    .community a {
      border: green 0.1rem solid;
    }

    .residency a {
      border: red 0.1rem solid;
    }

    #refine-1:checked~.refine-teims:not(.show),
    #refine-2:checked~.refine-teims:not(.live),
    #refine-3:checked~.refine-teims:not(.dj),
    #refine-4:checked~.refine-teims:not(.shop),
    #refine-5:checked~.refine-teims:not(.workshop),
    #refine-6:checked~.refine-teims:not(.community),
    #refine-7:checked~.refine-teims:not(.residency),
    #refine-8:checked~.refine-teims:not(.members) {
      display: none;
    }

    .refine b {
      display: inline-block;
      text-align: center;
    }

    .refine span:before {
      content: '[';
      opacity: 1;
      font-weight: 500;
      padding-right: 0.5rem;
    }

    .refine span:after {
      content: ']';
      opacity: 1;
      font-weight: 500;
      padding-left: 0.5rem;
    }

    .refine input[type=radio]:checked+.refine-0 b,
    .refine input[type=radio]:checked+.refine-1 b,
    .refine input[type=radio]:checked+.refine-2 b,
    .refine input[type=radio]:checked+.refine-3 b,
    .refine input[type=radio]:checked+.refine-4 b,
    .refine input[type=radio]:checked+.refine-5 b,
    .refine input[type=radio]:checked+.refine-6 b,
    .refine input[type=radio]:checked+.refine-7 b,
    .refine input[type=radio]:checked+.refine-8 b {
      opacity: 1;
      color: blue;
    }

    .refine b {
      opacity: 0;
    }

    .refine-0,
    .refine-1,
    .refine-2,
    .refine-3,
    .refine-4,
    .refine-5,
    .refine-6,
    .refine-7,
    .refine-8 {
      opacity: 1;
    }

    @media screen and (max-width: 1000px) {
      #contents {
        width: 25vw;
        height: 25vw;
      }
    }

    @media screen and (max-width: 550px) {
      #contents {
        width: 95%;
        margin: 0 0 0.5rem;
        padding: 2.5%;
        height: auto;
      }
    }
  </style>
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