<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class CartsTable extends Table
{
    public function initialize(array $config)
    {
		$this->belongsTo('Users');
		$this->belongsTo('Prtoducts');
		//$this->hasMany('OrderItems');
    }
}
?>