<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class OrdersTable extends Table
{
    public function initialize(array $config)
    {
		$this->belongsTo('Users');
		$this->hasMany('OrderItems');
		$this->hasMany('PaymentDetails');
		$this->hasMany('OrderProducts');
    }
}
?>