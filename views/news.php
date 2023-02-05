<?php $this->layout('layout'); ?>





<?php foreach($news as $item): ?>
    
        
            
    <?= $this->e($item['title']) ?> 
    <p>
        <?= $this->e($item['text']); ?>
    </p>
    <p>

            <a href="/news/<?= $this->e($item['id']) ?>">Редактировать</a>
        </form>
    </p>
    <hr>
<?php endforeach ?>

