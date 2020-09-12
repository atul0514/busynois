
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">List a Job<span class="pull-right text-white"><a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>admin/jobs">Jobs List</a></span></h3>
            <div class="tile-bodytext-center py-4">
              <div style="color:red">
                <?php echo validation_errors(); ?>
                <?php if(isset($error)){print $error;}?>
              </div>
				 <?php echo form_open_multipart('admin/jobs/insert');?> 
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								 <label for="exampleFormControlInput1">Enter Your Name*</label>
								<input type="text" class="form-control" name="name" placeholder="Enter Your Name">
							</div>
							<div class="form-group">
								 <label for="exampleFormControlInput1">Enter Your Email*</label>
								<input type="email" class="form-control" name="email" placeholder="Enter Your Email*">
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
				                  <option value="<?php echo $row->cid; ?>"><?php echo $row->cname; ?></option>
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
				                  <option value="<?php echo $row->jtid; ?>"><?php echo $row->jtname; ?></option>
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
									
				                  <option value="employer">Employer</option>
				                  <option value="job Seeker">Job Seeker</option>		 
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
				                  <option value="<?php echo $row->id; ?>"><?php echo $row->loc; ?></option>
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
				 <?php echo form_close() ;?> 
            </div>
          </div>
        </div>
      </div>

<script>
function val() {
  var id = document.getElementById("ptype").value;
  
    
    	        $.ajax({
                    url : "fetchcity",
                    method : "POST",
                    data : {pid: id},
                    async : true,
                    dataType : 'json',
                    success: function(data)
            {   
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].ctid+'>'+data[i].ctame+'</option>';
                        }
                        $('#city').html(html);
 
                    
                    }
                    
                });
                

}
</script>