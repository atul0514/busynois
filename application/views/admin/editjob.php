
	<div class="row">
		<div class="col-md-12">
          <div class="tile">
            <p class="py-2 px-1"><span class="h3 tile-title">Update Job</span><span class="float-right"><a href="<?php echo base_url(); ?>admin/jobs" class="btn btn-sm btn-primary text-white"><i class="fa fa-list"></i>All Jobs</a></span></p>
              
			  <?php echo form_open('admin/jobs/update', 'class="form-horizontal" id="myform"'); ?>
			  	<input class="form-control" type="hidden" name="id" value="<?php echo $erow->jid; ?>">
			   <div class="row">
						<div class="col-md-12">
							<div class="form-group">
								 <label for="exampleFormControlInput1">Enter Your Name*</label>
								<input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="<?php echo $erow->name; ?>">
							</div>
							<div class="form-group">
								 <label for="exampleFormControlInput1">Enter Your Email*</label>
								<input type="email" class="form-control" name="email" placeholder="Enter Your Email*" value="<?php echo $erow->email; ?>">
							</div>
							<div class="form-group">
								 <label for="exampleFormControlInput1">Job Title/ Applicant Expertise Title*</label>
								<select class="form-control" name="Jobtitle" placeholder="Job Title/ Applicant Expertise Title">
									<option>Job Title/ Applicant Expertise Title</option>
									<?php
				                        $i=1;
				                        foreach($jcat as $row)
				                        {
				                  ?>
				                  <option value="<?php echo $row->cname; ?>" <?php if($row->cname== $erow->Jtitle){echo "selected";} ?>><?php echo $row->cname; ?></option>
								 <?php
				                        $i++;
				                       }
				                 ?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								 <label for="exampleFormControlInput1">Description (Copy paste resume or Job vacancy)</label>
								<textarea class="form-control" rows="8" name="desc"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">Upload Resume or Company Logo </label>
								<div class="py-5 text-center jbtn" onclick="myFunction()">
									<p class="d-none">Upload Resume or Company Logo </p>
									<input type="file" class="file-control jfile" id="customFile" name="jupload">
								</div>
							</div>
						</div>
					</div>
<script>
function myFunction() {
      $('#customFile').trigger('click'); 
    }

</script>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlInput1">Job Type</label>
								<select class="form-control" name="comp" placeholder="Job Title/ Applicant Expertise Title">
									<option>Choose Job Type</option>
									<?php
				                        $i=1;
				                        foreach($jbdata as $row)
				                        {
				                  ?>
				                  <option value="<?php echo $row->jtname; ?>"  <?php if($row->cname== $erow->Jtitle){echo "selected";} ?>><?php echo $row->jtname; ?></option>
								 <?php
				                        $i++;
				                       }
				                 ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlInput1">Are you an employer or Job Seeker*</label>
								<select class="form-control" name="jtype" placeholder="Job Title/ Applicant Expertise Title">
									<option>Choose Job Type</option>
									
				                  <option value="employer"  <?php if(employer== $erow->Jrole){echo "selected";} ?>>Employer</option>
				                  <option value="job Seeker"  <?php if($row->cname== $erow->Jtitle){echo "selected";} ?>>Job Seeker</option>		 
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlInput1">Location*</label>
								<select class="form-control" id="ptype" name="location" onchange="val()">
									<option>Choose location</option>
									<?php
				                        $i=1;
				                        foreach($ldata as $row)
				                        {
				                  ?>
				                  <option value="<?php echo $row->id; ?>" <?php if($row->loc== $erow->loc){echo "selected";} ?>><?php echo $row->loc; ?></option>
								 <?php
				                        $i++;
				                       }
				                 ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlInput1">City*</label>
								<select class="form-control" name="City" id="city" placeholder="Job City/">
									<option>Choose location</option>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">Address*</label>
								<input type="text" class="form-control" name="address" placeholder="Address">
							</div>
						</div>						
						<div class="col-md-12">
							<div class="form-group text-right">
								<input type="submit" class="btn btn-secondary" value="Submit">
							</div>
						</div>
					</div>
                
             <?php echo form_close(); ?>
          </div>
        </div>
	</div>