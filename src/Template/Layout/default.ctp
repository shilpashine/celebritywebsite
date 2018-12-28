<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

//$this->layout = false;


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        PartyWithStar
    </title>
    
   <?php  echo $this->element('header');
   
 echo $this->fetch('content');
   
   echo $this->element('footer');
   ?>
  <script>
window.onload = function() {
  ipLookUp();
};
</script>
         <script>
                        
                        function ipLookUp () {
                      
  $.ajax('http://ip-api.com/json')
  .then(
      function success(response) {
         var country=response.country;
          var city=response.city;
           var regionName=response.regionName;
            var query=response.query;
            
     //    console.log('User\'s Location Data is ', response);
      //    console.log('User\'s Country', response.country);
          
            $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/Pages/response_detail', true);  ?>',
				data: ({country:country,city:city,state:regionName,ipadd:query}),
				success: function (data){
                             // alert(data)
                                
                                   //$("#org_data").html(data);
                                   
                             
				}
		    });
                    
      },

      function fail(data, status) {
          console.log('Request failed.  Returned status of',
                      status);
      }
  );
}

                        </script>       