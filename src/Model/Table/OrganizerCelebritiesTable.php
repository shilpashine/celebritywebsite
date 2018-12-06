<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class OrganizerCelebritiesTable extends Table
{
    public function initialize(array $config)
    {
		
	 $this->setTable('organizer_celebrities');	
        $this->belongsTo('Users');
          $this->belongsTo('CelebrityDetails');
        
		//$this->hasMany('CelebrityCategories');
                
    }
    
}
?>