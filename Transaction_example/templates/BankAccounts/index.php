<?= $this->Flash->render() ?>

<h1>Bank Accounts</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Balance</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($accounts as $account): ?>
        <tr>
            <td><?= h($account->id) ?></td>
            <td>$<?= h($account->balance) ?></td>
            <td>
                <!-- Link to deduct fee -->
                <?= $this->Html->link('Deduct Fee', ['action' => 'deductFee', $account->id], ['class' => 'btn btn-primary']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


