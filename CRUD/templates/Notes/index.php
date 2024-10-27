<div class="jumbotron">
    <h1 class="display-4">Welcome to our Notes App!</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita inventore nisi vero officia, sed distinctio repudiandae facilis velr.</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notes as $note): ?>
                <tr>
                    <td><?= h($note->id) ?></td>
                    <td><?= h($note->title) ?></td>
                    <td><?= h($note->body) ?></td>
                    <td><?= h($note->created) ?></td>
                    <td>
                    <a class="nav-link active" aria-current="page" href="<?= $this->Url->build(['_name' => 'view','id'=>$note->id])?>">View</a>
                    </td>
                    <td>
                    <a class="nav-link active" aria-current="page" href="<?= $this->Url->build(['_name' => 'update','id'=>$note->id])?>">Update</a>
                    </td>
                    <td>
                    <?= $this->Form->postLink(
                        'Delete',
                        ['action' => 'delete', $note->id],
                        ['confirm' => __('Are you sure you want to delete this {0}?', $note->title), 'class' => 'nav-link active', 'aria-current' => 'page']
                    )?>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
