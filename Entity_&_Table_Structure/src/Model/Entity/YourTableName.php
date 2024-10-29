<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class YourTableName extends Entity
{
    protected $_accessible = [
        '*' => true, // Allows mass assignment for all fields
        'id' => false, // Prevent mass assignment for the ID field
    ];
}


