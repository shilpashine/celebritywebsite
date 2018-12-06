<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class PaymentDetailsTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('payment_details');
		$this->belongsTo('Users');
		$this->belongsTo('Orders');
    }
}
?>