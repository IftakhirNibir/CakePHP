<h1 class="display-4">Update note</h1>
<form method="POST">
<input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Note title: </label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $note->title ?>">
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Content: </label>
        <textarea class="form-control" name="body" id="body" style="height: 100px"><?= $note->body ?></textarea>
    </div>
    <div class="mb-3">
    <label for="category-id" class="form-label">Category: </label>
    <select class="form-control" id="category-id" name="category_id">
        <?php foreach ($categories as $id => $name): ?>
            <option value="<?= h($id) ?>" <?= $id == $note->category_id ? 'selected' : '' ?>><?= h($name) ?></option>
        <?php endforeach; ?>
    </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




