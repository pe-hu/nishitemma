<?php
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$word = (string)filter_input(INPUT_POST, 'word');
$weight = (string)filter_input(INPUT_POST, 'weight');
$size = (string)filter_input(INPUT_POST, 'size');
$feel = (string)filter_input(INPUT_POST, 'feel');

$fp = fopen('index.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$word, $weight, $size, $feel,]);
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Think Note</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="contents.css" />
    <link rel="stylesheet" href="../index.css" />
    <link rel="stylesheet" href="../menu.css" />
    <link rel="stylesheet" href="../floor.css" />
    <link rel="stylesheet" href="../scrollable.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://creative-community.space/coding/fontbook/css/font-family.css" />
</head>

<body id="box">
    <div id="menu"></div>
    <div id="floor"></div>
    <main>
        <ul class="mousedragscrollable library">
            <li class="think"></li>

            <li>
                <div class="contents">
                    <p>
                        <span class="title">
                            <b><u>Think Note</u></b>
                        </span>
                        <span class="by">is</span>
                    </p>
                    <span style="font-size: 150%;"><b>stickey</b></span>
                    <span class="name">and</span>
                    <span style="font-size: 150%;"><b>pen</b></span>
                    <p>
                        <br />
                        <span class="as"><b>peace<br />piece</b></span>
                        <span class="as">of</span>
                        <span class="as"><b>mind</b></span>
                    </p>
                    <p>
                        <span class="as"><i> won't</i></span>
                        <span class="as"><i>forget</i></span>
                        <span class="as">/</span>
                        <span class="as"><i>write</i></span>
                        <span class="as"><i>down</i></span>
                    </p>
                    <p>
                        <span class="as"><i>make</i></span>
                        <span class="as"><i>it</i></span>
                        <span class="as"><i>visible</i></span>
                    </p>
                </div>
            </li>

            <li class="book"></li>

            <li>
                <div class="contents">
                    <p>
                        <span class="title">
                            <b><u>Think Note</u></b>
                        </span>
                        <span class="by">は、</span>
                    </p>
                    <br />
                    <p>小さくコンパクトなスティッキー＆ペンです。</p>
                    <p>ここに、気持ちの一片を書き出してみましょう。</p>
                    <br />
                    <span class=""><i><u>not for sale</u></i></span>
                </div>
            </li>

            <li class="aa"></li>
            <li class="bb"></li>
            <li class="cc"></li>
            <li>
                <div class="contents">
                    <p>
                        <span class="title">
                            <b><u>Think Note</u></b>
                        </span>
                        <span class="by">is</span>
                    </p>
                    <p>
                        <b>only
                            <span class="as">for</span>
                            <span class="as"><u>Members</u></span></b>
                        <br /><i>of</i>
                        <br />
                    </p>
                    <br />
                    <span class="nlc">
                        NEW LIFE<br />
                        <i>Collection</i>
                    </span>
                    <br />
                    <p>
                        <br />
                        <span class="by"><u>color</u></span>
                        <span class="by"></span>
                        <span class="as"><i>yellow</i></span>
                        <span class="as"><i>transparent</i></span>
                        <span class="as"></span>
                        <br />
                        <span class="by"><u>size</u></span>
                        <span class="by"></span>
                        <span class=""><i>mini</i>　</span>
                        <span class=""><i>compact</i>　</span>
                        <span class=""><i>pocketable</i></span>
                    </p>
                </div>
            </li>
        </ul>
    </main>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../scrollable.js"></script>
    <script>
        $(function() {
            $("#form").load("submit.html");
            $("#index").load("org.php");
            $("#menu").load("../menu.html");
            $("#floor").load("../floor.html");
        })

        $(".mousedragscrollable").mousedragscrollable();
    </script>

</body>

</html>