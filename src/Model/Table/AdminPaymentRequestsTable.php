<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class AdminPaymentRequestsTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('admin_payment_requests');
		$this->belongsTo('OrderSellsUserDetails');
		$this->belongsTo('Users');
		//$this->hasMany('QuestionOptions');
    }
    public function validationDefault(Validator $validator)
    {
        
    }
}
?>