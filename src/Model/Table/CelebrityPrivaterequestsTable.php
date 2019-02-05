<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class CelebrityPrivaterequestsTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('celebrity_privaterequests');	
        $this->belongsTo('CelebrityDetails');
         $this->belongsTo('Users');
		//$this->hasMany('CelebrityCategories');
                
    }
    
}
?>