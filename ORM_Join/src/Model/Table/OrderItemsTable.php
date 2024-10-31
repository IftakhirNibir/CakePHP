<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class OrderItemsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('order_items'); 
        $this->setPrimaryKey('id'); 
        
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id'
        ]);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
        ]);
        
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator;
    }
}

