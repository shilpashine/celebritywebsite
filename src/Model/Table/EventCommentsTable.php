<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventCommentsTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_comments');
       
	$this->belongsTo('Users');
                
    }
    
}
?>