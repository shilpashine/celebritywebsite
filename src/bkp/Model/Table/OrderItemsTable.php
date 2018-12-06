<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class OrderItemsTable extends Table
{
    public function initialize(array $config)
    {
        // Prior to 3.4 version, use foreignKey() and joinType()
        $this->setTable('order_items');
		$this->belongsTo('Orders');
        $this->belongsTo('Products');
		$this->belongsTo('Categories');
    }
}
?>