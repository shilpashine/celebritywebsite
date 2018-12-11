<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventCategoriesTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_categories');	
        $this->belongsTo('EventDetails');
	$this->belongsTo('Categories');
                
    }
    
}
?>