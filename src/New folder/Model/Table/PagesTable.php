<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class PagesTable extends Table
{
    public function initialize(array $config)
    {
		$this->hasMany('PageDetails');
		//$this->hasMany('OrderSellsUserDetails');
		//$this->hasMany('AdminPaymentRequests');
        /*$this->setForeignKey('user_id')
        $this->setDependent(true);*/
    }
}
?>