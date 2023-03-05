<?php $this->layout('layout'); ?>
<h2>Парсинг пользователей</h2>
<a href="/">Назад</a><br/>
Всего спарсено пользователей: <br/>
Последний номер: <?= $userLast ?><br/>
Путь к файлу: <?= ROOT."/docs/emails.txt" ?><p>
<form action="/users/parce-us" method="POST">
    <button class="btn btn-primary">Спарсить пользователей</button>
</form>
<p>
<a href="/clear">Очистить файл</a>