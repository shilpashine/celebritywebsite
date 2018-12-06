<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class HistoryProductCategoriesTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('history_product_categories');
		$this->belongsTo('Categories');
		$this->belongsTo('Products');
		$this->belongsTo('HistoryProducts');
		
    }
}
?>