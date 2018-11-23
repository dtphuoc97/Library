<div>
	<button type="button" data-toggle="modal" data-target="#new_book" class="btn btn-outline-success float-right mt-2 mb-2">Thêm Book</button>

	<div class="clearfix"></div>
	
	<div id="new_book" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">New Book</h5>
		      </div>
		      	<div class="modal-body">
				   	<form action="<?php echo base_url('admin/book/add'); ?>" method="post">
					  <div class="form-row">
					  	<div class="form-group col-md-6">
						    <input type="text" class="form-control" name="name" id="name" placeholder="Primary name">
						  </div>
						  <div class="form-group col-md-6">
						    <input type="text" class="form-control" name="subname" id="subname" placeholder="Sub name">
						  </div>
					  </div>


					  <div class="form-row">
					  	<div class="form-group col-md-6">
					  		<input type="number" class="form-control" name="total" id="total" placeholder="Total available">
					    </div>
					    <div class="form-group col-md-6">
						    <input type="bumber" class="form-control" name="page" id="page" placeholder="Number of page">
						  </div>
					  </div>

					  <div class="form-row">
					  	<div class="form-group col-md-6">
						    <label class="labeltext">Have ebook</label><br>
					          <div class="form-check-inline">
								<label class="customradio"><span class="radiotextsty">Yes</span>
								  <input type="radio" checked="checked" name="radio">
								  <span class="checkmark"></span>
								</label>        
								<label class="customradio"><span class="radiotextsty">No</span>
								  <input type="radio" name="radio">
								  <span class="checkmark"></span>
								</label>
							</div>
						</div>
						<div class="form-group col-md-6">
						    <label class="labeltext">Read online</label><br>
					          <div class="form-check-inline">
								<label class="customradio"><span class="radiotextsty">Yes</span>
								  <input type="radio" checked="checked" name="radio">
								  <span class="checkmark"></span>
								</label>        
								<label class="customradio"><span class="radiotextsty">No</span>
								  <input type="radio" name="radio">
								  <span class="checkmark"></span>
								</label>
							</div>
						</div>
					  </div>

					 
					  
					  <button type="submit" id="sub-new-book" class="btn btn-primary float-right">Submit</button>
					  <button type="button" class="btn btn-default float-right mr-3" data-dismiss="modal">Close</button>
					  <div class="clearfix"></div>

					</form>
				</div>
			</div>
		</div>
	</div>

	<table class="table table-bordered display" id="table_id">
	  <!-- <thead class="thead-dark">
	    <tr>
	      <th scope="col">Name</th>
	      <th scope="col">Email</th>
	      <th scope="col">Level</th>
	      <th scope="col">Status</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody id="list-content">
	  	<?php 
		 //  	$i=0;
		 //  	foreach($data as $user) 
	  // 		{
	  // 			$i++;
		 //  		echo 
			//   	'<tr>
			//       <td>'.ucwords($user['first_name'].' '.$user['last_name']).'</td>
			//       <td>'.$user['email'].'</td>
			//       <td>'.$user['level'].'</td>
			//       <td>'.$user['active'].'</td>
			//       <td>
			// 	      <button type="button" class="btn btn-outline-secondary btndel mr-3" u_id="'.$user['user_id'].'">Delete</button>
			// 	      <button type="button" class="btn btn-outline-success btndetail" data-toggle="modal" u_id="'.$user['user_id'].'" data-target="#myModal">Detail</button>
			//       </td>
			//     </tr>' ;
			// }
	    ?>  
	  </tbody> -->
	</table>
	

	<div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Detail Book</h5>
	      </div>
	      <div class="modal-body">
	      	<form>
		        <!-- <div class="form-row">
					  	<div class="form-group col-md-6">
						    <input type="text" class="form-control" name="e-firstname" id="e-firstname" placeholder="First name">
						  </div>
						  <div class="form-group col-md-6">
						    <input type="text" class="form-control" name="e-lastname" id="e-lastname" placeholder="Last name">
						  </div>
					  </div>
					  <div class="form-row">
					  	<div  class="form-group col-md-6">
						    <input type="text" class="form-control" name="e-email" id="e-email" placeholder="Email">
						  </div>
					  </div>

					  
							<div class="form-row">
								<div class="col-md-6 level-str"></div>
								<div class="col-md-6 date-create"></div>
							</div>
					  <div class="form-row mt-3">
					  	<button type="button" class="btn btn-outline-success ml-1 mr-2">Active</button>
						  <button type="button" class="btn btn-outline-info mr-2">Change password</button>
						  <button type="button" class="btn btn-outline-info">Change level</button> 
					  </div> -->
			</form>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<!----------->
</div> 