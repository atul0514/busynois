<section  class="py-4">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<div class="section-heading mb-3 text-center">
							<h1><?php echo $row->name; ?></h1>
						</div>						
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="p-2" style="margin: auto;">
							<img id="image-gallery-image" class="img-fluid" src="<?php echo base_url(); ?>assets/uploads/Jobs/<?php echo $row->jupload; ?>" onerror="this.src='<?php echo base_url(); ?>assets/uploads/Jobs/default-image.png';" class="img-fluid jimg" > 						
						</div>						
					</div>
					<div class="col-md-6">
						<div class="job-desc p-2 text-justify ">
							<p><?php echo $row->Details; ?></p>
						</div>						
					</div>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-1text-justify">
				
			</div>
		</div>
	</div>
</section>