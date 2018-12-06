<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class PaymentMethodsTable extends Table
{
    public function initialize(array $config)
    {
		//$this->belongsTo('QuestionDetails');
		//$this->hasMany('QuestionOptions');
    }
    public function validationDefault(Validator $validator)
    {
        
    }
}
?>