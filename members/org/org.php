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

<ul class="random org">
    <?php if (!empty($rows)) : ?>
        <?php foreach ($rows as $row) : ?>
            <li class="list_item list_toggle" data-weight="<?= h($row[1]) ?>" data-size="<?= h($row[2]) ?>" data-feel="<?= h($row[3]) ?>">
                <span class="<?= h($row[1]) ?> <?= h($row[2]) ?>">
                    <a href="https://www.google.com/search?q=<?= h($row[0]) ?>">
                        <?= h($row[0]) ?>
                    </a>
                </span>
            </li>
        <?php endforeach; ?>
    <?php else : ?>
        <li class="list_item list_toggle" data-weight="<?= h($row[1]) ?>" data-size="<?= h($row[2]) ?>" data-feel="<?= h($row[3]) ?>">
            <span class="<?= h($row[1]) ?> <?= h($row[2]) ?>">
                <a href="https://www.google.com/search?q=keyword">
                    keyword
                </a>
            </span>
        </li>
    <?php endif; ?>
</ul>

<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    function shuffleContent(container) {
        var content = container.find("> *");
        var total = content.length;
        content.each(function() {
            content.eq(Math.floor(Math.random() * total)).prependTo(container);
        });
    }
    $(function() {
        shuffleContent($(".random"));
    });
</script>