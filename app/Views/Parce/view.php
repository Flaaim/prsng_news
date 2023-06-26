<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/parce/send" method="POST">
                <div class="card-header">
                    <div class="form-group">
                        <label for="news-title">Заголовок новости</label>
                        <input class="form-control" id="news-title" name="title" type="text" value="<?= $oneNews['title']; ?>">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="news-content">Текст новости</label>
                        <textarea class="form-control"  name="content" rows="10" ><?= $oneNews['content'] ?></textarea>
                    </div>
                    <button class="btn btn-primary">Отправить</button>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#news-content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>