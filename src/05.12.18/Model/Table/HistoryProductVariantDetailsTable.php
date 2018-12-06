<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class HistoryProductVariantDetailsTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('history_product_variant_details');
		$this->belongsTo('Products');
		$this->belongsTo('HistoryProducts');
    }
}
?>