<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Customer extends Entity
{
    protected array $_accessible = [
        '*' => true, 
        'id' => false, 
    ];
}



