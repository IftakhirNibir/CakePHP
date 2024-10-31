<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CustomersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('customers'); 
        $this->setPrimaryKey('id'); 
        
        $this->hasMany('Orders',[
            'foreignKey'=>'customer_id'
        ]);
        
        
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator;
    }
}

