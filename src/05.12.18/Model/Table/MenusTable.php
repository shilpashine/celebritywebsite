<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class MenusTable extends Table
{
    public function initialize(array $config)
    {
		//$this->hasMany('UserDetails');
		/*$this->hasMany('UserDetails')
        $this->setForeignKey('user_id')
        $this->setDependent(true);*/
    }
	public function menulist(){
		echo"hello";exit;
		$datas = $this->Menus->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 //'QuestionOptions',
		 //'QuestionDetails'
	    ),
	    'conditions'=>array(
				'Menus.menu_type' =>'Admin',
				'Menus.active' =>1
                ),
                'order' => array(
                'Menus.id' => 'DESC'
                )
        ));
		$menu_data = $datas->toArray();
		return $menu_data;
		//pr($menu_data);exit;
	}
}
?>