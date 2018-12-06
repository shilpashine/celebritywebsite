<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class OperatorsTable extends Table
{
    public function initialize(array $config)
    {
		/*$this->hasMany('UserDetails');
		$this->hasMany('OrderSellsUserDetails');
		$this->hasMany('AdminPaymentRequests');*/
    }
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'An email address is required')
            ->notEmpty('password', 'A password is required');
    }
	

}
?>