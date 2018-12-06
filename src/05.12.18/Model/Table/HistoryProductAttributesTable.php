<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class HistoryProductAttributesTable extends Table
{
    public function initialize(array $config)
    {
		//$this->belongsTo('Categories');
		$this->setTable('history_product_attributes');
		$this->belongsTo('Products');
		$this->belongsTo('Attributes');
		$this->belongsTo('HistoryProducts');
    }
}
?>