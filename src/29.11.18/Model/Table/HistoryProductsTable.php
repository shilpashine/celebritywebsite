<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class HistoryProductsTable extends Table
{
    public function initialize(array $config)
    {
		//$this->belongsTo('Categories');
		$this->setTable('history_products');
		$this->belongsTo('Users');
		$this->belongsTo('Products');
		$this->hasMany('HistoryProductAttributes');
		$this->hasMany('HistoryProductCategories');
		$this->hasMany('HistoryProductAttributeVariants');
		$this->hasMany('HistoryProductVariantDetails');
		$this->hasMany('HistoryProductVariants');
		
    }
}
?>