<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class CelebrityCategoriesTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('celebrity_categories');	
        $this->belongsTo('CelebrityDetails');
		//$this->hasMany('CelebrityCategories');
                
    }
    
}
?>