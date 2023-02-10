<?php $this->layout('layout'); ?>
<form action="/send-tg" method="POST">
<p>
    <?= $this->e($item['title']); ?> 
</p>
<p>
    <?= $this->e($item['date']); ?>
</p>
    <div class="form-group">
        <label for="text">Текст</label>
        <textarea name="text" class="form-control" id="text" cols="30" rows="10">
            <?= $this->e($item['text']); ?>
        </textarea>
    </div>
    <p></p>
    <button type="submit" class="btn btn-primary">Отправить в ТГ</button>
</form>


    
