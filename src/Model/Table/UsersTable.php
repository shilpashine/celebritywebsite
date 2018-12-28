<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class UsersTable extends Table
{
    public function initialize(array $config)
    {
		
		$this->hasMany('OrderProducts');
		
                $this->hasMany('OrganizerCelebrities');
                 $this->hasMany('NewsDetails');
                 //$this->hasMany('EventOrganizers');
    }
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'An email address is required')
            ->notEmpty('password', 'A password is required');
    }
}
?>