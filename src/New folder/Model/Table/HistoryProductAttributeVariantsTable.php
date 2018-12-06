<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class HistoryProductAttributeVariantsTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('history_product_attribute_variants');
		$this->belongsTo('HistoryProducts');
		$this->belongsTo('Products');
		$this->belongsTo('ProductAttributes');
		$this->belongsTo('Variants');
    }
}
?>