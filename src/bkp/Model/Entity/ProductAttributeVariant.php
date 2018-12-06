<?php
// src/Model/Entity/User.php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
 
class ProductAttributeVariant extends Entity
{
 
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
?>