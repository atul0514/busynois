<section  class="py-4">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="section-heading mb-3">
					<h1><?php echo $row->p_title; ?></h1>
				</div>
			</div>
			<div class="col-md-3">
				<div class=" mb-3">
					<h3 class="text-right"><a href="<?php echo base_url(); ?>">Home</a> / <?php echo $row->p_title; ?></h3>
				</div>
			</div>			
		</div>
		<div class="row d-flex justify-content-center">
			<div class="col-md-12 text-justify">
				<p><?php echo $row->p_description; ?></p>
			</div>
		</div>
	</div>
</section>