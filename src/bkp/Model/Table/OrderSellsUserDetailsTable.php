<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class OrderSellsUserDetailsTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('order_sells_user_details');
		$this->belongsTo('Users');
		$this->hasMany('AdminPaymentRequests');
    }
    public function validationDefault(Validator $validator)
    {
        
    }
}
?>