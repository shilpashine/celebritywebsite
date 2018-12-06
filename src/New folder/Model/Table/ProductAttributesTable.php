<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class ProductAttributesTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('product_attributes');
		$this->belongsTo('Attributes');
		$this->belongsTo('Products');
		$this->hasMany('ProductAttributeVariants');
		
    }
}
?>