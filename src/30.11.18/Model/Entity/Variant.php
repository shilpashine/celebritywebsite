<?php
// src/Model/Entity/User.php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
 
class Variant extends Entity
{
 
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
?>