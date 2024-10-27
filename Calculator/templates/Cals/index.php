<h1>This is our Calculator</h1>
<form>
    <legend>Basic Calculation example</legend>
    <div class="mb-3">
      <label for="num1" class="form-label">Enter first number: </label>
      <input type="text" id="num1" name="num1" class="form-control">
    </div>
    <div class="mb-3">
      <label for="num2" class="form-label">Enter second number: </label>
      <input type="text" id="num2" name="num2" class="form-control">
    </div>
    <div class="mb-3">
      <label for="menu" class="form-label">select menu</label>
      <select id="menu" name="menu" class="form-select">
        <option>Addition</option>
        <option>Subtraction</option>
        <option>Multiplication</option>
        <option>Division</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php if(isset($message)): ?>
    <legend><?= h($message)?></legend>
<?php endif; ?>
<?php if(isset($result)): ?>
    <legend><?= "Output: ". h($result)?></legend>
<?php endif; ?>


