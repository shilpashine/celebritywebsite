<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class HistoryProductVariantsTable extends Table
{
    public function initialize(array $config)
    {
		//$this->belongsTo('Categories');
		$this->setTable('history_product_variants');
		$this->belongsTo('HistoryProducts');
		$this->belongsTo('Products');
		$this->belongsTo('Attributes');
		$this->belongsTo('Variants');
		$this->belongsTo('ProductVariantDetails');
    }
}
?>