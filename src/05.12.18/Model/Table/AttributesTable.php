<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class AttributesTable extends Table
{
    public function initialize(array $config)
    {
		$this->hasMany('AttributeVariants');
		$this->hasMany('Variants');
		$this->hasMany('ProductVariants');
		$this->hasMany('ProductAttributes');
		$this->hasMany('HistoryProductAttributes');
    }
}
?>