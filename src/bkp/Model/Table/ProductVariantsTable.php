<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class ProductVariantsTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('product_variants');
		$this->belongsTo('Products');
		$this->belongsTo('Attributes');
		$this->belongsTo('Variants');
		$this->belongsTo('ProductVariantDetails');
		
    }
}
?>