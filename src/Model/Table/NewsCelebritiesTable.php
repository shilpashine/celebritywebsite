<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class NewsCelebritiesTable extends Table
{
    public function initialize(array $config)
    {
		
$this->setTable('news_celebrities');	
$this->belongsTo('Users');
$this->belongsTo('CelebrityDetails', [
   
    'foreignKey' => 'celebrity_id'
]);

//$this->belongsTo('CelebrityCategories');
		//$this->hasMany('NewsCelebrities');
             //   $this->hasMany('NewsPhotos');
                //$this->hasMany('EventVideos');
                 // $this->hasMany('EventCategories');
                //   $this->hasMany('EventOrganizers');
                  //    $this->hasMany('EventTicketDetails');
                      
                
                
    }
    
}
?>