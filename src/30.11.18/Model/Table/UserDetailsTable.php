<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class UserDetailsTable extends Table
{
    public function initialize(array $config)
    {
        // Prior to 3.4 version, use foreignKey() and joinType()
        $this->setTable('user_details');
        $this->belongsTo('Users');
        //$this->setForeignKey('user_id');
        //$this->setJoinType('INNER');
    }
}
?>