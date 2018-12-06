                                <div class="col-lg-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Message View</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="edit_data" method="post" name="myEditForm" data-parsley-validate enctype="multipart/form-data">
									    <?php 
										$messagedata= json_decode($message_data);
										//pr($message_data);exit;
										?>
										<input type="hidden" name="edit_message_id" parsley-trigger="change"  class="form-control" id="edit_message_id" value="<?php echo $messagedata->id;?>" />
										<div class="form-group">
											<label for="edit_category_name">Message Subject</label>
											<input type="text" name="edit_subject" parsley-trigger="change"  class="form-control" id="edit_subject" value="<?php echo $messagedata->subject;?>"  readonly />
										</div>
										<div class="form-group">
											<label for="edit_message">Message Content</label>
											<textarea id="edit_message" name="edit_message" class="form-control" readonly><?php echo(strip_tags($messagedata->message));?></textarea>
										</div>
										<!--<div class="form-group text-right m-b-0">
											<button class="btn btn-primary waves-effect waves-light" type="submit" onclick="update_data()">
												Submit
											</button>
											<button type="reset" onclick="goBack()" class="btn btn-default waves-effect waves-light m-l-5">
												Cancel
											</button>
										</div>-->
									</form>
									<div id="reply_div">
                                    <h4 class="m-t-0 header-title"><b>Message  Reply List</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        List Replies
                                    </p>
									<?php echo $this->Flash->render();?>
                                    <table  class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Reply</th>
												<th>User Type</th>
                                                <th>User Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$message_data=json_decode($message_data);
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
                                                <td><?php if(!empty($reply_val->user)){echo $reply_val->user->fname." ".$reply_val->user->lname;}?></td>
                                            </tr>
												<?php }?>
                                        </tbody>
                                    </table>
									</div>
								    </div> 
							    </div>
								
<script>
function update_data(){
			document.getElementById("myEditForm").submit();
	  }
function goBack() {
    window.history.back();
}
function reply_edit_data(message_reply_id){
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/messages/reply_ajax_edit_data', true);  ?>',
				data: ({id:message_reply_id}),
				success: function (data){
				$('#reply_div').html(data);
				}
		    });
	  }	  
</script>
<?php exit;?>