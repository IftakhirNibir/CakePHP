<div class="jumbotron">
    <h1 class="display-4">Categories</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita inventore nisi vero officia, sed distinctio repudiandae facilis velr.</p>
    <a class="nav-link active" aria-current="page" href="<?= $this->Url->build(['_name'=>'add_category'])?>"><button class="btn btn-primary mb-3">Add Category</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= h($category->id) ?></td>
                    <td><?= h($category->name) ?></td>
                    <td>
                    <a class="nav-link active" aria-current="page" href="<?= $this->Url->build(['_name' => 'update_category','id'=>$category->id])?>">Update</a>
                    </td>
                    <td>
                    <?= $this->Form->postLink(
                        'Delete',
                        ['action' => 'delete', $category->id],
                        ['confirm' => __('Are you sure you want to delete this {0}?', $category->name), 'class' => 'nav-link active', 'aria-current' => 'page']
                    )?>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
