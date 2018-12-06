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
		$this->hasMany('EventCelebritries');
                $this->hasMany('EventPhotos');
                $this->hasMany('EventVideos');
                  $this->hasMany('EventCategories');
                   $this->hasMany('EventOrganizers');
                
                
    }
    
}
?>