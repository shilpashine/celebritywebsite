<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventOrganizersTable extends Table
{
    public function initialize(array $config)
    {
		
	$this->setTable('event_organizers');	
        $this->belongsTo('EventDetails');
        //$this->belongsTo('Users')->setForeignKey('organizer_id');
            //->setJoinType('INNER');
		//$this->hasMany('EventDetails');
             //   EventOrganizers 
        /*$this->belongsTo('Users', [
        'setForeignKey' => 'Users.organizer_id'
        
        ]);*/
         $this->hasMany('Users',[
       'className'=>'Users',
            'foreignKey' =>'id',
             'bindingKey'=> 'organizer_id',
//            conditions => array('EventOrgnizersTable.organizer_id' => 'Users.id')
      
]);
                
    }
    
}
?>