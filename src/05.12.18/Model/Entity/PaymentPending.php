<?php
namespace App\Model\Entity;
 
use Cake\ORM\Entity;
 
class PaymentPending extends Entity
{
 
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
?>