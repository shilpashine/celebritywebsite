<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class ProductCategoriesTable extends Table
{
    public function initialize(array $config)
    {
		$this->setTable('product_categories');
		$this->belongsTo('Categories');
		$this->belongsTo('Products');
		
    }
}
?>