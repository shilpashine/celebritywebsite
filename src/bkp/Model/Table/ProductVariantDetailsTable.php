<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class ProductVariantDetailsTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('product_variant_details');
		$this->belongsTo('Products');
		$this->hasMany('ProductVariants');
		$this->hasMany('OrderProductsTable');
		
    }
}
?>