<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateOrdersTable extends AbstractMigration
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
        $table = $this->table('orders');
        $table->addColumn('customer_id','integer')
              ->addForeignKey('customer_id','customers','id')
              ->addColumn('order_date','datetime',['default'=>'CURRENT_TIMESTAMP'])
              ->addColumn('total_amount','integer')
              ->create();
    }
}



