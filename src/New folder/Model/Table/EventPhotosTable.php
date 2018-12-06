<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventPhotosTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_photos');	
        $this->belongsTo('EventDetails');
		//$this->hasMany('CelebrityCategories');
                
    }
    
}
?>