<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class UsersTable extends Table
{
    public function initialize(array $config)
    {
		$this->hasMany('PaymentDetails');
		$this->hasMany('PaymentHistories');
		$this->hasMany('Orders');
		$this->hasMany('MessageReplies');
		$this->hasMany('Products');
		$this->hasMany('HistoryProducts');
		$this->hasMany('Carts');
		$this->hasMany('OrderProducts');
		$this->hasMany('Policies');
		$this->hasMany('Tasks');
    }
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'An email address is required')
            ->notEmpty('password', 'A password is required');
    }
}
?>