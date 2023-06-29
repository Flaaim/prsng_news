<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <form action="/parce/kodeks" method="POST">
                        <div class="form-group">
                            <label>Выберите источник парсинга:</label>
                            <select class="form-control" name="source">
                                <?php foreach($parcingSources as $source): ?>
                                <option value="<?= $source['url'] ?>"><?= $source['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Старт!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Заголовок</th>
                            <th>Статус</th>
                            <th>Источник</th>
                            <th>Действия</th>
                        </thead>
                        <tbody>
                        <?php if($news): ?>
                            <?php foreach($news as $item): ?>
                                <tr>
                                    <td><?= $item['id']?></td>
                                    <td><?= $item['title']?></td>
                                    <td>
                                        <?= $item['status'] ? "<i class='fas fa-check'></i>" : "<i class='fas fa-times'></i>" ?>
                                    </td>
                                    <td><?= $item['source']?></td>
                                    <td>
                                        <a href="/parce/<?= $item['id']; ?>"><i class="fas fa-edit"></i></a>
                                        | <a href="/parce/delete" class="news-delete" data-id="<?= $item['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td>Новости не найдены!</td>
                            </tr>
                        <?php endif ?>
                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>