<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
class EventCategory extends Entity
{
 
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
?>