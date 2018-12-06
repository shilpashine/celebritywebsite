<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class MessageRepliesTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('message_replies');
        $this->belongsTo('Messages');
		$this->belongsTo('Users');
    }
}
?>