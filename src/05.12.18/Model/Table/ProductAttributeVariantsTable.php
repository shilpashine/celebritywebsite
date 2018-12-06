<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class ProductAttributeVariantsTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('product_attribute_variants');
		$this->belongsTo('Products');
		$this->belongsTo('ProductAttributes');
		$this->belongsTo('Variants');
		
    }
}
?>