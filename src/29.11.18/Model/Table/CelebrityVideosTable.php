<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class CelebrityVideosTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('celebrity_videos');	
        $this->belongsTo('CelebrityDetails');
		//$this->hasMany('CelebrityCategories');
                
    }
    
}
?>