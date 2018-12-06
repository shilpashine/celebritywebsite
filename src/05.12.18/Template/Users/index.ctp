<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">List of Users</div>
                  <?php //if($loggedIn): ?>
                    <br />
                    <?= $this->Html->link('Logout', '/users/logout', ['class' => 'btn btn-danger']); ?>
                    <hr/>
                    <table class="table">
                          <tr>
						    <th>Email ID</th>
							  <?php	
                                   if(!empty($user_data)){							  
							       foreach($user_data[0]['user_details'] as $val_details){				
								?>
								<th><?php echo $val_details['field_name']; ?></th>
								
								   <?php }} ?>
						
                          </tr>
                          <?php 
						  $count=count($user_data);
						  if(!empty($user_data)){	
						  foreach($user_data as $val){
							  ?>
							 <tr> 
							  <td><?php echo $val['username'];?></td>
							  <?php
                                  if(!empty($val['user_details'])){							  
							    foreach($val['user_details'] as $val_details){
							  ?>
                              <td><?php echo $val_details['field_value'];?></td>
							   
                            
								  <?php } } ?> 
						  </tr>
						  <?php } }?>
                    </table>
                  <?php //else{ ?>
                    <br />
                    <!--<div align="center">
                      <h5> You need to login to have access to this list <?= $this->Html->link('Login', '/users/login', ['class' => 'btn btn-info']); ?> </h5>
                    </div>-->
                  <?php //} ?>
            </div>
        </div>
    </div>
</div>