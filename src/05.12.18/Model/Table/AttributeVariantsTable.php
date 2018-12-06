<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class AttributeVariantsTable extends Table
{
    public function initialize(array $config)
    {
        // Prior to 3.4 version, use foreignKey() and joinType()
        $this->setTable('attribute_variants');
        $this->belongsTo('Attributes');
		$this->belongsTo('Variants');
    }
}
?>