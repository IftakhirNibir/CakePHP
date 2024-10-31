<h1 class="display-4">Create new category</h1>
<form method="POST">
<input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Category Name: </label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>


