    <!-- Blog Area Start -->
<section class=" parallax" id="parallax-static">
	<div class="jumbotron event-bg">
		<h3 class="display-5"><?php echo $brow->evname; ?></h3>
		<div class="ebg-foot">
			<div class="container">
				<div class="row d-none d-sm-block">
					<div class="col-md-6 text-white pull-left">
						<span><strong><i class="fa fa-map-marker" aria-hidden="true"></i> Event Venue :</strong><?php echo $brow->elocation; ?></span>
					</div>
					<div class="col-md-6 pull-right text-white">
						<span class="pull-right"><strong><i class="fa fa-clock-o" aria-hidden="true"></i> Event Time:</strong> <?php echo $brow->edate; ?>,  , <?php echo $brow->etime; ?></span>
					</div>
					</div>
				</div>
				<div class="row d-block d-sm-none text-center">
					<div class="col-md-6 text-white">
						<span><i class="fa fa-map-marker" aria-hidden="true"></i> Event Venue :</strong><?php echo $brow->elocation; ?></span>
					</div>
					<div class="col-md-6 text-white">
						<span><strong> <i class="fa fa-clock-o" aria-hidden="true"></i> Event Time:</strong> <?php echo $brow->edate; ?>,  , <?php echo $brow->etime; ?></span>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<style type="text/css">
#parallax-static {
    background-image: url("<?php echo base_url(); ?>assets/uploads/<?php echo $brow->evimage; ?>");
}
</style>
	<section class="blog py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="post-content-area">
						<div class="blog-post">
							<p class="text-justify mb-3"><?php echo $brow->evdetails; ?></p>
							<p><span class="pull-right">
								<span> <strong> <i class="fa fa-clock-o" aria-hidden="true"></i> Created:</strong> <?php echo $brow->created; ?></span></span></p>
							<p class="text-justify"> <strong>Share On :</strong>
							<span class="">
								<script async src="https://static.addtoany.com/menu/page.js"></script>
								<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
									<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
									<a class="a2a_button_facebook"></a>
									<a class="a2a_button_twitter"></a>
									<a class="a2a_button_google_plus"></a>
									<a class="a2a_button_linkedin"></a>
									<a class="a2a_button_pinterest"></a>
								</div>
							</span>
								</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- blog Area End -->

