<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class CelebrityDetailsTable extends Table
{
    public function initialize(array $config)
    {
		
$this->setTable('celebrity_details');		
$this->hasMany('EventFollows');


             
		$this->hasMany('CelebrityCategories');
                $this->hasMany('CelebrityPhotos');
                $this->hasMany('CelebrityVideos');
               $this->hasMany('EventCelebrities');
                $this->hasMany('CelebrityRattings');
              $this->hasMany('NewsCelebrities', [
   
    'foreignKey' => 'celebrity_id'
]);
                
    }
    
}
?>