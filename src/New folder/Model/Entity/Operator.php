<?php
// src/Model/Entity/User.php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
 
class Operator extends Entity
{
 
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
 
    protected function _setPassword($password)
    {
        if (strlen($password) > O) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
 
}
?>