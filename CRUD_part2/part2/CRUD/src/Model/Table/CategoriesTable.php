<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;



class CategoriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('notes',[
            'foreignKey' => 'category_id'
        ]);
    }

}
