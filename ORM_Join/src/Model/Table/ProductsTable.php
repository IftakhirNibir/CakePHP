<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('products'); 
        $this->setPrimaryKey('id'); 
        
        // Define relationships (if any)
        // $this->hasMany('RelatedTable', [ ... ]);
        $this->hasMany('OrderItems', [
            'foreignKey' => 'product_id'
        ]);
        
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator;
    }
}

