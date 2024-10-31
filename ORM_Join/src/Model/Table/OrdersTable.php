<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class OrdersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('orders'); 
        $this->setPrimaryKey('id'); 
        
        $this->hasMany('OrderItems',[
            'foreignKey'=>'order_id'
        ]);

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator;
    }
}

