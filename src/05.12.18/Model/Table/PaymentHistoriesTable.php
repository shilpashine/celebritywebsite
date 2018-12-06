<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class PaymentHistoriesTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('payment_histories');
		$this->belongsTo('Users');
		$this->belongsTo('Products');
    }
}
?>