

 <!-- newsletter Popup-->
<div class="modal searchModal" id="searchModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content text-center">
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		<h2 class="modal-title">Join Our Newsletter</h2><br>
		<p>Be the first to know about new products, local events and special promotions.</p>
        <?php echo form_open('pages/subscribe');?> 
          <div class="form-group">
            <input type="email" class="form-control" name="semail" placeholder="Your Email">
          </div>          
          <button type="submit" class="btn btn-secondary">Submit</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

 <!-- Search Popup End-->
  <!-- Search Section Starts -->
<section  class="py-2" id="loc">
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
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section-heading mb-3">
					<h1>ABOUT US</h1>
				</div>
				<p>We are a team of Busynoi's who aim to connect the best jobs to Jobseekers. This is a platform that helps connect the jobs to the applicants and vis-a versa. Our technology focuses on providing you a job near your vicinity. You can easily make use of <a href="#">POST</a> feature to reach desired Job applicants & employers!</p>
			</div>			
		</div>
		<div class="row py-4 about">
			
				<?php
				    $i=1;
	                    foreach($ldata as $row)
				                        {
	            ?>
	            <div class="col-md-3">
					<h1><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="<?php echo base_url(); ?>pages/jobs/<?php echo $row->slug; ?>"><?php echo $row->loc; ?> jobs</a></h1>
				</div>	
				<?php
                        $i++;
                       }
                ?>
					
		</div>
		<div class="row py-4 about">			
				<?php
				    $i=1;
	                    foreach($ldata as $row)
				                        {
	            ?>
	            <div class="col-md-3">
					<h1><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="<?php echo base_url(); ?>pages/resumes/<?php echo $row->slug; ?>"><?php echo $row->loc; ?> CV's</a></h1>
				</div>	
				<?php
                        $i++;
                       }
                ?>
		</div>
	</div>
</section>
<section class="py-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section-heading mb-3">
					<h1>SERVICES</h1>
				</div>
				<p>We are a team of Busynoi's who aim to connect the best jobs to Jobseekers. This is a platform that helps connect the jobs to the applicants and vis-a versa. Our technology focuses on providing you a job near your vicinity. You can easily make use of POST feature to reach desired Job applicants & employers!</p>
			</div>
		</div>
		<div class="serv row py-4">
			<div class="col-md-4">
                <a href="<?php echo base_url(); ?>get_listed"><div class="single-service">
                     <i class="fa fa-pencil"></i>
                     <h3>Employers,Post a Job</h3>
                     <div class="service-details">
						<p>Hello employers,Looking to fill a job vacancy? Your posting will be highlighted to the desired job seekers and you will receive verified resumes relevant to your job posting</p>
                     </div>
				</div></a>
            </div>
			<div class="col-md-4">
                <a href="<?php echo base_url(); ?>get_listed"><div class="single-service">
                     <i class="fa fa-pencil"></i>
                     <h3>Job Applicants, Post Resume</h3>
                     <div class="service-details">
						<p>Hello Applicants,Looking for a job? You posting will be highlighted to the desired recruiters, job vacancies & employers directly and receive verified job vacancy information relevant to your expertise</p>
					</div>
				</div></a>
            </div>
			<div class="col-md-4">
                <a href="#loc"><div class="single-service">
                     <i class="fa fa-crosshairs"></i>
                     <h3>Location Feature</h3>
                     <p>Location filter helps you find jobs near you and helps employers find applicants near your company</p>
				</div> </a>
            </div>
		</div>
	</div>
</section>
<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form class="subsform">
					<div class="row mb-4">
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" placeholder="Name">
						</div>
						<div class="col-md-6">
							<input  type="email" class="form-control"name="email" placeholder="Email">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-6">
							<input type="text" class="form-control" name="usertype" placeholder="Are you an Employer or Job Seeker?">
						</div>
						<div class="col-md-6">
							<input  type="text" class="form-control"name="location" placeholder="Location - Country/State">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-12">
							<input type="text" class="form-control" name="usertype" placeholder="Looking for (Eg.: IT job, Graphic designer for your company etc)">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-9">
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
							  <label class="form-check-label" for="defaultCheck1">
								I accept terms & conditions, Therefore i want to recieve the latest jobs updates and emailers from busynoi.
							  </label>
							</div>
						</div>
						<div class="col-md-3">
							<input  type="submit" class="btn btn-light btn-block btn-submit" name="submit"  value="SUBMIT">
						</div>
					</div>
					
				</form>
			<div>
		</div>
	</div>
</section>
