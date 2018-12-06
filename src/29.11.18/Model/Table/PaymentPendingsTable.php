<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class PaymentPendingsTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('payment_pendings');
		//$this->belongsTo('QuestionDetails');
		//$this->hasMany('QuestionOptions');
    }
    public function validationDefault(Validator $validator)
    {
        
    }
}
?>