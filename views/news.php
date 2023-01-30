<?php $this->layout('layout'); ?>

<?php foreach($news as $item): ?>
    <ol>
        <li>
            <?= $this->e($item['title']) ?>
        </li>
    </ol>
    <p>
        <?= $this->e($item['text']); ?>
    </p>
<?php endforeach ?>

