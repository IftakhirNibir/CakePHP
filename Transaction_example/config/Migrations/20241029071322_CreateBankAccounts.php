<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateBankAccounts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('bank_accounts');
        $table->addColumn('balance', 'decimal', ['precision' => 10, 'scale' => 2, 'default' => 0]) //max contain 10 digit, default 0.00
              ->create();
    }
}



