<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
class CelebritiesController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	 
	   
			 $this->Auth->allow(['login','logout','listCelebrity','replaceTab','swapTab']);

	    
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
		$this->loadModel('CelebrityDetails');
                $this->loadModel('Categories');
                 $this->loadModel('CelebrityVideos');
                   $this->loadModel('CelebrityPhotos');
                    $this->loadModel('CelebrityCategories');
		$this->loadModel('OrganizerCelebrities');
                    
        $this->loadComponent('RequestHandler');
    } 
	
    
    
    public function listCelebrity(){
       
         
          $date1=date('Y-m-d');
        $this->viewBuilder()->setLayout('default');
          $data_all11=$this->Categories->find('all', array(
         'recursive' => -1,
		
              'contain' => array(
                     'CelebrityCategories'=>array('CelebrityDetails'=>array('CelebrityPhotos','conditions'=>array(
		'CelebrityDetails.isdeleted' =>0,
                'CelebrityDetails.status' =>1
               
              
				
                ))
                             )),
                         'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.status' =>1,
                'EventDetails.approx_start_date >' => $date1
              
				
                ),
                         
                       
	    'conditions'=>array(
		'Categories.is_deleted' =>0,
                'Categories.status' =>1,
                'Categories.parent_id' =>0
              
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
        // pr($data_all11);exit;
		$data_all = $data_all11->toArray();
     //     pr($data_all);exit;
                if(!empty($data_all)){
		$this->set('data_all',$data_all);
              
		}
    }
                
        
      }      
	 

?>