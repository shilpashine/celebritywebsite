                             <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Event Organizer Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                    <th class="all">First name</th>
                                                    <th class="min-phone-l">Last name</th>
                                                    <th class="min-tablet">Gendar</th>
                                                     <th class="min-tablet">User type</th>
                                                    <th class="desktop">Dob</th>
                                                    <th class="none">Phone No</th>
                                                    <th class="none">Description</th>
                                                     <th class="none">Email</th>
                                                   
                                                    <th class="none">Address</th>
                                                  
                                                     <th class="desktop">Action</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($celebrity_datas)){
												$celebrity_datas=json_decode($celebrity_datas);
												foreach($celebrity_datas as $celebrity_val){
													//pr($policy_val);exit;
												$dob=explode('T',$celebrity_val->dob);
												?>
                                                <tr>
                                                    <td><?php echo $celebrity_val->fname;?> </td>
                                                    <td><?php echo $celebrity_val->lname;?></td>
                                                    <td><?php if($celebrity_val->gender=='1'){ echo 'Male'; ?> <?php }else{  echo 'Female';?>  <?php }?></td>
                                                    <td><?php if($celebrity_val->user_type==1){ echo 'Visitors' ; }elseif($celebrity_val->user_type==4){ echo 'Org Manager' ; };?></td>
                                                    <td><?php echo $dob[0];?></td>

                                                    <td><?php echo $celebrity_val->phone_number;?></td>
                                                    <td><?php echo $celebrity_val->description;?></td>
                                                    <td><?php echo $celebrity_val->email;?></td>
                                                   <td><?php echo $celebrity_val->address;?></td> 
                                                
                                               <td>
                                                       
                                                         
                                                     <?php if($celebrity_val->status=='1'){ ?>
                                                        <a href="change_status/<?php echo $celebrity_val->id;?> ">
                                                            <i class="fa fa-check" style="color:green"></i> Status </a>
                                                            
                                                            
                                                     <?php }else{  ?>
                                                         
                                                          <a href="change_status/<?php echo $celebrity_val->id;?> ">
                                                            <i class="fa fa-ban"  style="color:red"></i> Status </a>
                                                         
                                                         
                                                   <?php  } ?>
                                                  
                                                 </td>
                                                </tr>
                                                                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
		<?php echo $this->Html->script("admin-js/assets/global/scripts/table-datatables-responsive.min"); ?>

<script>
    


 $(document).ready(function(){
    $('.date-picker').datepicker({
              endDate: '+0d',
    format: 'yyyy-mm-dd'
    
});
  } );
  
</script>
<?php exit;?>