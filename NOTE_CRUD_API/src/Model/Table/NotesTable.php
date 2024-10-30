<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class NotesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('notes');
        $this->setPrimaryKey('id');
        $this->setDisplayField('title');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('title', 'A title is required')
            ->notEmptyString('body', 'The body is required');
        
        return $validator;
    }
}


