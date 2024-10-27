<h1 class="display-4">Create new note</h1>
<form method="POST">
<input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Note title: </label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Content: </label>
        <textarea class="form-control" name="body" id="body" style="height: 100px"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


