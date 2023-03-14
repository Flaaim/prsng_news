<?php $this->layout('layout'); ?>

<h2>Новости техэксперт</h2>
<div class="row">
    <div class="col-3">
    <div class="form-group">
        <form action="/news/parce" method="POST">
            <button class="btn btn-primary">Спарсить:техэксперт</button>
            <input type="hidden" name="source" value="News">
        </form>
    </div>
    </div>
    <div class="col-3">
    <div class="form-group">
        <form action="/news/parce" method="POST">
            <button class="btn btn-primary">Спарсить:инспекция</button>
            <input type="hidden" name="source" value="OhranaTruda">
        </form>
    </div>
    </div>
    <div class="col-3">
            <a href="/users">Пользователи</a>
    </div>
</div>



<table class="table">
    <thead>
        <th>ID</th>
        <th>Дата</th>
        <th>Заголовок</th>
        <th>Откуда</th>
        <th>Статус</th>
        <th>Действия</th>
    </thead>
    <tbody>
        <?php foreach($news as $item): ?> 
            <tr>
                <td><?= $this->e($item['idnews']) ?></td>
                <td><?= $this->e($item['date']) ?></td>
                <td><?= $this->e($item['title']) ?></td>
                <?php if($this->e($item['name']) == 'Инспекция'): ?>
                        <td><span>Инспекция</span></td>
                <?php else: ?>
                        <td><span>Техэксперт</span></td>
                <?php endif ?>
                <?php if($this->e($item['status']) == "Отправлено"): ?>
                    <td><span class="badge bg-primary"><?= $this->e($item['status']) ?></span></td>
                <?php else: ?>
                    <td><span class="badge bg-secondary"><?= $this->e($item['status']) ?></span></td>
                <?php endif ?>
                <td>
                    <a href="/<?= $this->e($item['id']) ?>">Показать</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>
<div class="row">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for($page = 1; $page<= $count; $page++): ?>
                <?php if($page == $currentPage): ?>
                    <li class="page-item active">
                    <a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a>
                </li>
                <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a>
                </li>
                <?php endif ?>
            <?php endfor ?>
        </ul>
    </nav>
</div>
