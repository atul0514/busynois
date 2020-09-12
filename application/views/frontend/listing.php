<section  class="py-4">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section-heading mb-3">
					<h1>ABOUT US</h1>
				</div>
			</div>			
		</div>
		<div class="row d-flex justify-content-center py-4">
			<div class="col-md-8">
				<div class="row info">
					<div class="col-md-4">
						<p>Tel: +91 9899382456<br>busynois@gmail.com</p>
					</div>
					<div class="col-md-4">
						<p>Head Office - Delhi</p>
					</div>
					<div class="col-md-4 social">
						<ul class="py-2">
							<li><a><i class="fa fa-facebook"></i></a></li>
							<li><a><i class="fa fa-twitter"></i></a></li>
							<li><a><i class="fa fa-instagram"></i></a></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<div class="col-md-10">
				 <?php echo form_open_multipart('get_listed/insert');?> 
					<div class="row">
						<div class="col-md-6">
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
						<div class="col-md-6">
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
</section>
<script>
function val() {
  var id = document.getElementById("ptype").value;
  
    
    	        $.ajax({
                    url : "../get_listed/fetchcity",
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