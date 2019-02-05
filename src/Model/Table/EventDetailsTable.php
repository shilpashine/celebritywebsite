<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventDetailsTable extends Table
{
    public function initialize(array $config)
    {
		
$this->setTable('event_details');		
//$this->belongsTo('CelebrityCategories');
		$this->hasMany('EventCelebrities');
                $this->hasMany('EventPhotos');
                $this->hasMany('EventVideos');
                  $this->hasMany('EventCategories');
                   $this->hasMany('EventOrganizers');
                      $this->hasMany('EventTicketDetails');
                
                   $this->hasMany('EventOrders',[
       'className'=>'EventOrders',
            'foreignKey' =>'event_id',
             'bindingKey'=> 'id',
//            conditions => array('EventOrgnizersTable.organizer_id' => 'Users.id')
      
]);
                    $this->hasMany('EventComments',[
       'className'=>'EventComments',
            'foreignKey' =>'event_id',
             'bindingKey'=> 'id',
//            conditions => array('EventOrgnizersTable.organizer_id' => 'Users.id')
      
]);
                    
                      $this->hasMany('EventFaqs',[
       'className'=>'EventFaqs',
            'foreignKey' =>'event_id',
             'bindingKey'=> 'id',
//            conditions => array('EventOrgnizersTable.organizer_id' => 'Users.id')
      
]);
                      
                      
    }
    
}
?>