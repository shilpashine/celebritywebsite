<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class CategoriesTable extends Table
{
    public function initialize(array $config)
    {
		//$this->hasMany('Products');
		$this->hasMany('OrderItems');
		$this->hasMany('ProductCategories');
		$this->hasMany('HistoryProductCategories');
                $this->hasMany('EventCategories',['foreignKey' => 'category_id']);
                  $this->hasMany('CelebrityCategories',['foreignKey' => 'category_id']);
    }
}
?>