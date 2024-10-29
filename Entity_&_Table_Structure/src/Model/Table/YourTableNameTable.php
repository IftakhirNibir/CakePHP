<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class YourTableNameTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('your_table_name'); // Specify the database table name
        $this->setPrimaryKey('id'); // Specify the primary key
        
        // Define relationships (if any)
        // $this->hasMany('RelatedTable', [ ... ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        // Define validation rules
        return $validator;
    }
}


