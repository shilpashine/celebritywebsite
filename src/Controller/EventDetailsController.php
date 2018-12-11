<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
class EventDetailsController extends AppController {
 public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	 
	   
			 $this->Auth->allow(['login','logout','eventList','replaceTab','swapTab']);

	    
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
		 $this->loadModel('Categories');
                 $this->loadModel('EventDetails');
                 $this->loadModel('EventCelebrities');
                 $this->loadModel('EventVideos');
                  $this->loadModel('EventPhotos');
                   $this->loadModel('EventOrganizers');
                   $this->loadModel('EventTicketDetails');
                  
                  $this->loadModel('CelebrityDetails');
                  $this->loadModel('CelebrityVideos');
                $this->loadModel('CelebrityCategories');
               $this->loadModel('CelebrityPhotos');
             
              $this->loadModel('EventCategories');
                $this->loadModel('EventPhotos');
                  $this->loadModel('EventVideos');
             
                  
                      
                 //   'EventCategories','EventCelebrities','EventOrganizers'
              
        $this->loadComponent('RequestHandler');
    } 
	
  
    
    public function eventList(){
        $date1=date('Y-m-d');
        $data_all_event=$this->EventDetails->find('all', array(
         'recursive' => -1,
		  'contain' => array('EventPhotos','EventCategories'=>array('Categories'),'EventOrganizers'=>['Users']),
	    'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.status' =>1,
               'EventDetails.approx_start_date >' => $date1 
			
                ),
                     
                'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
            
		$data_all_event = $data_all_event->toArray();
            //   pr($data_all_event);exit;
                if(!empty($data_all_event)){
		$this->set('data_all_event',$data_all_event);
            
		}
        
    }
    
  
}
?>