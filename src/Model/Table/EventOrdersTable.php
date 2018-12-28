<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventOrdersTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_orders');
         $this->belongsTo('Users');
     //   $this->belongsTo('EventDetails');
          $this->hasMany('EventTicketCodeDetails');
	$this->belongsTo('EventDetails',[
       'className'=>'EventDetails',
            'foreignKey' =>'event_id',
             'bindingKey'=> 'id',
//            conditions => array('EventOrgnizersTable.organizer_id' => 'Users.id')
      
]);
                
    }
    
}
?>