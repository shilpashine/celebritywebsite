<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class MessagesTable extends Table
{
    public function initialize(array $config)
    {
		$this->hasMany('MessageReplies');
    }
}
?>