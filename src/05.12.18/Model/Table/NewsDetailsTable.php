<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class NewsDetailsTable extends Table
{
    public function initialize(array $config)
    {
		
$this->setTable('news_details');	
$this->belongsTo('Users');
$this->belongsTo('CelebrityDetails');

//$this->belongsTo('CelebrityCategories');
		$this->hasMany('EventCelebrities');
                $this->hasMany('EventPhotos');
                $this->hasMany('EventVideos');
                  $this->hasMany('EventCategories');
                   $this->hasMany('EventOrganizers');
                      $this->hasMany('EventTicketDetails');
                      
                
                
    }
    
}
?>