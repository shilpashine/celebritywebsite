<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventTicketDetailsTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_ticket_details');	
        $this->belongsTo('EventDetails');
		//$this->hasMany('CelebrityCategories');
                
    }
    
}
?>