<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class EventVideosTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('event_videos');	
        $this->belongsTo('EventDetails');
		//$this->hasMany('CelebrityCategories');
                
    }
    
}
?>