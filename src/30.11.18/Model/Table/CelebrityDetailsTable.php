<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class CelebrityDetailsTable extends Table
{
    public function initialize(array $config)
    {
		
$this->setTable('celebrity_details');		
//$this->belongsTo('CelebrityCategories');
		$this->hasMany('CelebrityCategories');
                $this->hasMany('CelebrityPhotos');
                $this->hasMany('CelebrityVideos');
                
                
    }
    
}
?>