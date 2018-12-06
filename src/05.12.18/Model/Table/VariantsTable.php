<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class VariantsTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('AttributeVariants');
		$this->hasMany('ProductVariants');
		$this->hasMany('ProductAttributeVariants');
		$this->belongsTo('Attributes');
    }
}
?>