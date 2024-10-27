<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Notes extends AbstractMigration
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
        $table->addColumn('title','string',['limit'=>255])
              ->addColumn('body','text')
              ->addColumn('created','datetime',['default'=>'CURRENT_TIMESTAMP'])
              ->addColumn('modified','datetime',['null'=>true,'default'=>null])
              ->create();
    }
}


