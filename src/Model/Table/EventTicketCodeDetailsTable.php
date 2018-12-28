<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventTicketCodeDetailsTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_ticket_code_details');
        
           $this->belongsTo('EventTicketDetails');
	
                
    }
    
}
?>