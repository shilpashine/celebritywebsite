<?php
namespace App\Model\Entity;
 
use Cake\ORM\Entity;
 
class PaymentDetail extends Entity
{
 
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
?>