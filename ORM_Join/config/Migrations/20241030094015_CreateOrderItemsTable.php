<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateOrderItemsTable extends AbstractMigration
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
        $table = $this->table('order_items');
        $table->addColumn('order_id','integer')
              ->addForeignKey('order_id','orders','id')
              ->addColumn('product_id','integer')
              ->addForeignKey('product_id','products','id')
              ->addColumn('quantity','integer')
              ->create();
    }
}



