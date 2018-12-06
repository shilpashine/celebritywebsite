<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventOrgnizersTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_organizers');	
        $this->belongsTo('EventDetails');
		$this->hasMany('EventDetails');
                
    }
    
}
?>