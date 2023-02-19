<?php $this->layout('layout'); ?>
<form action="/send-tg" method="POST">
<p>
    <?= $this->e($item['date']); ?>
</p>
<p>
    <input type="hidden" value="<?= $this->e($item['id']); ?>" name="id">
    
</p>
    <div class="form-group">
        <label for="text">Текст</label>
        <textarea name="text" class="form-control" id="text" cols="30" rows="30">
            <?= $this->e($item['title']); ?>
            
            <?= $this->e($item['text']); ?>
        </textarea>
    </div>
    <p></p>
    <button type="submit" class="btn btn-primary">Отправить в ТГ</button>
</form>


    
