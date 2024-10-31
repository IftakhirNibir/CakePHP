<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class UpdateNotes extends AbstractMigration
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
        $table = $this->table('notes');
        $table->addColumn('category_id','integer',['null'=>true])
              ->addForeignKey('category_id','categories','id',['update'=>'CASCADE','delete'=>'CASCADE'])
              ->update();
    }
}



