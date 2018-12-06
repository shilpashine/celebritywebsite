<?php
namespace App\Model\Entity;
 
use Cake\ORM\Entity;
 
class OrderSellsUserDetail extends Entity
{
 
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
?>