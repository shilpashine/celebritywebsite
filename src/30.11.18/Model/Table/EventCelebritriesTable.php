<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventCelebritriesTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_celebrities');	
        $this->belongsTo('EventDetails');
		//$this->hasMany('CelebrityCategories');
                
    }
    
}
?>