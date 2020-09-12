<section  class="py-4">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-heading mb-3">
					<h1><?php echo $brow->p_title; ?></h1>
				</div>
			</div>
			<div class="col-md-12">
				<div class=" mb-3">
					<h3 class="text-right"><a href="<?php echo base_url(); ?>">Home</a> / <a href="<?php echo base_url(); ?>/blog">Blog</a> / <?php echo $brow->p_title; ?></h3>
				</div>
			</div>			
		</div>
		<div class="row d-flex justify-content-center">
			<div class="col-md-12 text-justify">
				<p><?php echo $brow->p_description; ?></p>
			</div>
			<div class="col-md-12">
				<span>Category: <a href="<?php echo base_url(); ?>/blog/categor/<?php echo $brow->cname; ?>"><?php echo $brow->cname; ?></a></span>
				<span class="pull-right"><i class="fa fa-clock-o"></i><?php echo $brow->created; ?></span>
			</div>
		</div>
	</div>
</section>