
    <!-- Blog Area Start -->
	<section class="blog py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
				    <div class="row">
					<?php
	                            $i=1;
	                            foreach($data as $row)
	                            {
	                  ?>
						<div class="col-lg-4 col-md-6 col-xs-12 mb-3">
							<div class=" card blog-block pt-2">
								<a href="<?php echo base_url(); ?>blog/post/<?php echo $row->slug; ?>"><img src="<?php echo base_url(); ?>assets/uploads/blog/<?php echo $row->p_img; ?>" onerror="this.src='<?php echo base_url(); ?>assets/uploads/blog/default-image.png';" class=" img-fluid card-img-top" style="height: 220px; min-height: 220px;"></a>
								<div class="card-block blog-content mt-2 py-2 text-center">
									<h5 class="heading card-title"><a href="<?php echo base_url(); ?>blog/post?pid=<?php echo $row->slug; ?>"><?php echo $row->p_title; ?></a></h5>
									
								</div>
								
								<div class="card-footer bg-white">
		                            <small><i class="fa fa-clock"></i> <?php echo $row->created; ?></small>
		                            <a href="<?php echo base_url(); ?>blog/post?pid=<?php echo $row->slug; ?>" class="pull-right">More Info</a>
		                        </div>
								<!--<p ><span><i class="fa fa-clock">12-10-2019</i></span><span style="bottom: 20px;position: absolute; right:30px;"><a href="<?php echo base_url(); ?>blog/post?pid=<?php echo $row->pid; ?>" class="text-center"><strong>Read More >></strong></a></span></p> -->
							</div>

						</div>
					<?php
	                        $i++;
	                       }
	                ?>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-end">
							  <ul class="pagination"><?php echo $links; ?></ul>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 px-2">
					<div class="row">
						<div class="col-md-12 blog-category mb-3">
							<h3>Categories</h3>
							<ul>
							<?php
	                            $i=1;
	                            foreach($catdata as $row)
	                            {
		                    ?>
								<li><a href="<?php echo base_url(); ?>blog/category/<?php echo $row->cname; ?>"><?php echo $row->cname; ?></a></li>
							<?php
		                        $i++;
		                       }
		                    ?>
							</ul>
						</div>
						<div class="col-md-12 blog-category mb-3">
							<h3>Recent Posts</h3>
							<ul>
							<?php
	                            $i=1;
	                            foreach($postdata as $row)
	                            {
		                    ?>
								<li class="text-justify"><a href="<?php echo base_url(); ?>blog/post/<?php echo $row->slug; ?>"><?php echo $row->p_title; ?></a></li>
							<?php
		                        $i++;
		                       }
		                    ?>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>

    <!-- blog Area End -->



