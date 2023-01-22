<?php $this->layout('layout'); ?>

<?php foreach($news as $item): ?>
    <ol>
        <li>
            <?= $this->e($item->getTitle()) ?>
        </li>
    </ol>
    <p>
        <?= $this->e($item->getText()); ?>
    </p>
<?php endforeach ?>

