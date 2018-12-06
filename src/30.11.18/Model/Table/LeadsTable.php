<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class LeadsTable extends Table
{
    public function initialize(array $config)
    {
		
		$this->belongsTo('Users');
		$this->hasMany('Remarks');
    }
    
}
?>