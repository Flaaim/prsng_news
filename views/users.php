<?php $this->layout('layout'); ?>
<h2>Парсинг пользователей</h2>
<a href="/">Назад</a><br/>
Всего спарсено пользователей: <br/>
Последний номер: 
Путь к файлу: <?= ROOT."/docs/emails.txt" ?><p>
<form action="/news/parce" method="POST">
    <button class="btn btn-primary">Спарсить пользователей</button>
    <input type="hidden" name="source" value="Users">
</form>
<p>
<a href="/clear">Очистить файл</a>