<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class OrderProductsTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('order_products');
		$this->belongsTo('Orders');
		$this->belongsTo('Products');
		$this->belongsTo('Users');
		$this->belongsTo('ProductVariantDetails');
		
    }
}
?>