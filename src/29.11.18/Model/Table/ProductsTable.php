<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class ProductsTable extends Table
{
    public function initialize(array $config)
    {
		//$this->belongsTo('Categories');
		$this->belongsTo('Users');
		$this->hasMany('PaymentDetails');
		$this->hasMany('PaymentHistories');
		$this->hasMany('OrderItems');
		$this->hasMany('ProductCategories');
		$this->hasMany('ProductVariants');
		$this->hasMany('ProductAttributes');
		$this->hasMany('ProductVariantDetails');
		$this->hasMany('ProductAttributeVariants');
		$this->hasMany('HistoryProducts');
		$this->hasMany('HistoryProductCategories');
		$this->hasMany('HistoryProductAttributes');
		$this->hasMany('HistoryProductVariantDetails');
		$this->hasMany('HistoryProductVariants');
		$this->hasMany('HistoryProductAttributeVariants');
		$this->hasMany('Carts');
		$this->hasMany('OrderProductsTable');
		
    }
}
?>