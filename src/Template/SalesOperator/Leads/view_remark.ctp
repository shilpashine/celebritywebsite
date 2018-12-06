      
 <table class="table table-striped table-hover table-bordered" id="sample_editable_2">
                                            <thead>
                                                <tr>
													<th> Reminder</th>
													<th> Met On</th>
													<th>Remark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php 
												
												//pr($lead_remark_data);
												if(isset($lead_remark_data)){
												$lead_remark_data=json_decode($lead_remark_data);
												//pr($lead_remark_data);exit;
												if(!empty($lead_remark_data)){
												foreach($lead_remark_data as $lead_remark_val){
												?>
                                                <tr>
                                                    <td> <?php echo strtoupper($lead_remark_val->reminder);?></td>
                                                    <td><?php echo(date("d/m/Y", strtotime($lead_remark_val->met_on)));?></td>
                                                    <td> <?php echo strtoupper($lead_remark_val->remark);?></td>
                                                </tr>
												<?php }}}?>
                                            </tbody>
                                        </table>
<?php exit();?>