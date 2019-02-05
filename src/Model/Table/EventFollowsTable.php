<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventFollowsTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_follows');
       
	$this->belongsTo('Users');
                
    }
    
}
?>