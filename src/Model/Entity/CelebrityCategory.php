<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
class CelebrityCategory extends Entity
{
 
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
?>