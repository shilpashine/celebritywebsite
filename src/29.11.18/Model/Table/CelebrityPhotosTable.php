<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class CelebrityPhotosTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('celebrity_photos');	
        $this->belongsTo('CelebrityDetails');
		//$this->hasMany('CelebrityCategories');
                
    }
    
}
?>