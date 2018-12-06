                                    <div>
									<!--<?php echo $this->Flash->render();?>
                                    <table  class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Reply</th>
												<th>User Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$reply_message_data=json_decode($reply_message_data);
										?>
									    <?php foreach($message_data->message_replies as $reply_val){ 
									    ?>
                                            <tr>
                                                <td><?php echo $reply_val->reply;?></td>
												<td><?php if($reply_val->user_type==0){echo "Admin";}
												elseif($reply_val->user_type==1){echo "Customer";}
												elseif($reply_val->user_type==2){echo "Designer";}
												elseif($reply_val->user_type==3){echo "Supplier";}
												elseif($reply_val->user_type==4){echo "Franchise";}
												else{echo "Operator Admin";}?>
												</td>
												<?php if($reply_val->user_type==0){?>
                                                <td>
												<a title="Edit" onclick="reply_edit_data(<?php echo $reply_val->id;?>)" href="#"><i class="fa fa-edit"></i></a>
												</td>
												<?php }?>
                                            </tr>
												<?php }?>
                                        </tbody>
                                    </table>-->
									<?php 
										$reply_msg_data=json_decode($reply_msg_data);
									?>
									<form method="post" action="reply_edit_data" id="myAjaxEditForm">
									<input type="hidden" id="reply_msg_id" value="<?php echo($reply_msg_data->message_id);?>" />									
									<div class="form-group">
											<label for="edit_reply">Reply</label>
											<textarea id="edit_reply" name="edit_reply" class="form-control"><?php echo(strip_tags($reply_msg_data->reply));?></textarea>
									</div>
									<div class="form-group text-right m-b-0">
											<button class="btn btn-primary waves-effect waves-light" type="button" onclick="reply_update_data('<?php echo($reply_msg_data->id);?>')">
												Update Reply
											</button>
									</div>
									</form>
									</div>
<script>
function goBack() {
    window.history.back();
}
function reply_update_data(message_reply_id){
	//alert("jhgdgdadghj");exit;
	   var message_id=$('#reply_msg_id').val();
	   var edit_reply=$('#edit_reply').val();
	   /*alert(message_reply_id);
	   alert(message_id);
	   alert(edit_reply);
	   exit();*/
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/messages/reply_edit_data', true);  ?>',
				data: ({message_reply_id:message_reply_id,message_id:message_id,edit_reply:edit_reply}),
				success: function (data){
				//$('#reply_div').html(data);
				alert(data);
				window.location.reload();
				
				}
		    });
			//document.getElementById("myAjaxEditForm").submit();
	  }	 
</script>
<?php exit;?>									