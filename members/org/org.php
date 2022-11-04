<section class="words">
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
</section>

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