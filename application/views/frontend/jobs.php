
  <!-- Search Section Starts -->
<section  class="py-2">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-jobs" role="tab" aria-controls="nav-jobs" aria-selected="true">Search Jobs</a>
				    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-resume" role="tab" aria-controls="nav-resume" aria-selected="false">Search Resume</a>
				  </div>
				</nav>
				<div class="tab-content py-4" id="nav-tabContent">
				  <div class="tab-pane fade show active" id="nav-jobs" role="tabpanel" aria-labelledby="nav-jobs-tab">
				  	<form>
					  <div class="form-group row">
						<div class="col-md-3 mb-3">
							<input type="text" class="form-control" name="email" placeholder="Search">
						</div>
						<div class="col-md-3 mb-3">
							<select class="form-control" name="Jobtitle" placeholder="Job Title">
									<option>Job Title/ Applicant Expertise Title</option>
									<?php
				                        $i=1;
				                        foreach($jcat as $row)
				                        {
				                  ?>
				                  <option value="<?php echo $row->cname; ?>"><?php echo $row->cname; ?></option>
								 <?php
				                        $i++;
				                       }
				                 ?>
								</select>
						</div>
						<div class="col-md-3 mb-3">
							<select class="form-control" id="ptype" name="location" onchange="val()">
									<option>Choose location</option>
									<?php
				                        $i=1;
				                        foreach($ldata as $row)
				                        {
				                  ?>
				                  <option value="<?php echo $row->id; ?>"><?php echo $row->loc; ?></option>
								 <?php
				                        $i++;
				                       }
				                 ?>
								</select>
						</div>
						<div class="col-md-3 mb-3">
							<select class="form-control" name="comp" placeholder="Job Title/ Applicant Expertise Title">
									<option>Choose Job Type</option>
									<?php
				                        $i=1;
				                        foreach($jbdata as $row)
				                        {
				                  ?>
				                  <option value="<?php echo $row->jtname; ?>"><?php echo $row->jtname; ?></option>
								 <?php
				                        $i++;
				                       }
				                 ?>
								</select>
						</div>
					  </div>       
						<p><i class="fa fa-crosshairs"></i><a href="#" class="bold"> Click here </a>to find nearbuy Jobs</p>				  
					  <button type="submit" class="btn btn-secondary">Submit</button>
					</form>
				  </div>
				  <div class="tab-pane fade" id="nav-resume" role="tabpanel" aria-labelledby="nav-resume-tab">
				  	<form>
					  <div class="form-group row">
						<div class="col-md-3 mb-3">
							<input type="text" class="form-control" name="email" placeholder="Search">
						</div>
						<div class="col-md-3 mb-3">
							<select class="form-control" name="Jobtitle" placeholder="Job Title">
									<option>Job Title/ Applicant Expertise Title</option>
									<?php
				                        $i=1;
				                        foreach($jcat as $row)
				                        {
				                  ?>
				                  <option value="<?php echo $row->cname; ?>"><?php echo $row->cname; ?></option>
								 <?php
				                        $i++;
				                       }
				                 ?>
								</select>
						</div>
						<div class="col-md-3 mb-3">
							<select class="form-control" id="ptype" name="location" onchange="val()">
									<option>Choose location</option>
									<?php
				                        $i=1;
				                        foreach($ldata as $row)
				                        {
				                  ?>
				                  <option value="<?php echo $row->id; ?>"><?php echo $row->loc; ?></option>
								 <?php
				                        $i++;
				                       }
				                 ?>
								</select>
						</div>
						<div class="col-md-3 mb-3">
							<select class="form-control" name="comp" placeholder="Job Title/ Applicant Expertise Title">
									<option>Choose Job Type</option>
									<?php
				                        $i=1;
				                        foreach($jbdata as $row)
				                        {
				                  ?>
				                  <option value="<?php echo $row->jtname; ?>"><?php echo $row->jtname; ?></option>
								 <?php
				                        $i++;
				                       }
				                 ?>
								</select>
						</div>
					  </div>       
						<p><i class="fa fa-crosshairs"></i><a href="#" class="bold"> Click here </a>to find nearbuy Jobs</p>				  
					  <button type="submit" class="btn btn-secondary">Submit</button>
					</form>
				  </div>
				 
				</div>
			</div>
		</div>
	</div>
</section>
<section  class="py-4">
	<div class="container">
		<div class="row d-flex justify-content-center py-4">
			<div class="col-md-10">
				<div class="row">
				<?php
                    $i=1;
                        foreach($data as $row)
                    {
                  ?>
					<div class="col-md-4 p-2">
						<div class="jbox p-2 text-center">
							<a href="<?php echo base_url(); ?>pages/jobinfo/<?php echo $row->jslug; ?>" data-image="<?php base_url(); ?>assets/img/15.jpg" data-target="#image-gallery"><img src="<?php echo base_url(); ?>assets/uploads/Jobs/<?php echo $row->jupload; ?>" class="rounded img-fluid" onerror="this.src='<?php echo base_url(); ?>assets/uploads/Jobs/default-image.png';" style="height: 220px; min-height: 220px;"></a>
							<div class="text-box text-center pt-3" style="margin: auto;">
								<a href="<?php echo base_url(); ?>pages/jobinfo/<?php echo $row->jslug; ?>"  data-image-id="" data-toggle="modal" data-image="<?php echo base_url(); ?>assets/uploads/Jobs/<?php echo $row->jupload; ?>" data-target="#image-gallery">
									<h3><?php echo $row->name; ?> </h3>
								</a>
							</div>
						</div>
					</div>
					<!----- Start Modal gallery
						<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<button type="button" class="close btnclose" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						    <div class="modal-dialog modal-dialog-centered">
						        <div class="modal-content">
						        	<div class="modal-body row">
						        		<div class="col-md-8">
						        			 <img id="image-gallery-image" class="img-fluid" src="<?php echo base_url(); ?>assets/uploads/Jobs/<?php echo $row->jupload; ?>" onerror="this.src='<?php echo base_url(); ?>assets/uploads/Jobs/default-image.png';">
						        		</div>
						        		<div class="col-md-4">
						        			<h3><?php echo $row->name; ?></h3>
						        			<p class="text-jutify">
						        				<?php echo $row->Details; ?>
						        			</p>
						        		</div>
						        		<div class="col-md-12 mdbtn">
						                    <a  type="button" class="float-left btn btn-default" id="show-previous-image">Previous</a>
						                    <a  type="button" id="show-next-image" class="float-right btn btn-default">Next</a>
									</div>
						        	</div>
									
						        </div>
						    </div>
						</div>---->
					<?php
                        $i++;
                       }
                     ?>
					
				</div>
			</div>
		</div>
	</div>
</section>