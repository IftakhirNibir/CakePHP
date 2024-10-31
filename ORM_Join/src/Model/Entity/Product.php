<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Product extends Entity
{
    protected array $_accessible = [
        '*' => true, 
        'id' => false, 
    ];
}