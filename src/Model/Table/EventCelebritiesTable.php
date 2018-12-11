<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventCelebritiesTable extends Table
{
    public function initialize(array $config)
    {
		
	$this->setTable('event_celebrities');	
        $this->belongsTo('EventDetails');
        
         $this->hasMany('CelebrityDetails',[
       'className'=>'CelebrityDetails',
            'foreignKey' =>'id',
             'bindingKey'=> 'celebrity_id',
//            conditions => array('EventOrgnizersTable.organizer_id' => 'Users.id')
      
]);
	//$this->belongsTo('CelebrityDetails',['foreignKey' => 'celebrity_id']);
                
    }
    
}
?>