<?php
// src/Controller/BankAccountsController.php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class BankAccountsController extends AppController
{
    public function deductFee($accountId)
    {
        $bankAccountsTable = $this->BankAccounts;
        $connection = ConnectionManager::get('default'); //This line is setting up a connection to our database. In CakePHP, our database configurations are defined in config/app_local.php. The configuration name is typically default, which holds our main database settings. By specifying default, we're telling CakePHP to use these settings to establish the connection.

        $connection->begin();

        try {
    
            $account = $bankAccountsTable->get($accountId);

            $account->balance -= 5.00;

            if (!$bankAccountsTable->save($account)) {
                throw new \Exception("Failed to deduct fee.");
            }

            $connection->commit();
            $this->Flash->success("Fee deducted successfully.");

        } catch (\Exception $e) {
            $connection->rollback();
            $this->Flash->error("Failed to deduct fee: " . $e->getMessage());
        }

        return $this->redirect(['action' => 'index']);
    }

    public function index()
    {
        $accounts = $this->paginate($this->BankAccounts->find());
        $this->set(compact('accounts'));
    }
}
