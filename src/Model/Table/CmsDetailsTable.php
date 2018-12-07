<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class CmsDetailsTable extends Table
{
    public function initialize(array $config)
    {
		
$this->setTable('cms_details');		
//$this->belongsTo('CelebrityCategories');


             
		
                $this->hasMany('CmsPosts');
                
                
    }
    
}
?>