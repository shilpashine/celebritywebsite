<?php
// src/Model/Entity/User.php
namespace App\Model\Entity;
 
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
 
class MessageReply extends Entity
{
 
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
?>