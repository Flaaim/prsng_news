<?php $this->layout('layout'); ?>

<h2>Новости техэксперт</h2>
<div class="row">
    <div class="col-3">
    <div class="form-group">
        <form action="/parce" method="POST">
            <button class="btn btn-primary">Спарсить:техэксперт</button>
        </form>
    </div>
    </div>
    <div class="col-3">
    <div class="form-group">
        <form action="/parce-ot" method="POST">
            <button class="btn btn-primary">Спарсить:инспекция</button>
        </form>
    </div>
    </div>
</div>



<table class="table">
    <thead>
        <th>ID</th>
        <th>Date</th>
        <th>Title</th>
        <th>Status</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach($news as $item): ?> 
            <tr>
                <td><?= $this->e($item['idnews']) ?></td>
                <td><?= $this->e($item['date']) ?></td>
                <td><?= $this->e($item['title']) ?></td>
                    <?php if ($this->e($item['status']) == 1): ?>
                        <td><span class="badge bg-primary">Отправлено</span></td>
                    <?php else:?>
                        <td><span class="badge bg-secondary">Неотправлено</span></td>
                    <?php endif ?>
                <td>
                    <a href="/news/<?= $this->e($item['id']) ?>">Show</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>