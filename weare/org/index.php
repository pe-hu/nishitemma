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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title> 言葉の強さと方向と感情 | creative-community.space </title>

    <link rel="stylesheet" href="org.css" />
    <link rel="stylesheet" href="submit.css" />
    <style type="text/css">

        #form,
        #index {
            position: relative;
            display: block;
            padding: 0;
            margin: 0;
            border: none;
            width: 50%;
            height: 100vh;
            max-height: -webkit-fill-available;
        }

        #form {
            float: left;
            overflow: auto;
            z-index: 2;
        }

        #index {
            float: right;
            z-index: 1;
        }

        @media screen and (max-width: 750px) {

            #form,
            #index {
                top: 0;
                left: 0;
                width: 100%;
                height: auto;
                clear: both;
            }
        }
    </style>
    <link rel="stylesheet" href="http://creative-community.space/coding/fontbook/css/font-family.css" />
</head>

<body id="box">
    <section id="form"></section>
    <section id="index" class="words"></section>

    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="http://creative-community.space/org/searchBox.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#form").load("submit.html");
            $("#index").load("org.php");
        })
    </script>
</body>

</html>