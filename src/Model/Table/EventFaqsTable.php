<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventFaqsTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_faqs');
       
	$this->belongsTo('Users');
                
    }
    
}
?>