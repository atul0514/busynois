    <!-- Breadcrumb Area Start -->
    <section class="py-3 breadcrumb bg-mindit">
    	<div class="container">
        	<div class="row">
        		<div class="col-md-12">
        			<h3 class="text-center text-white">CONTACT</h3>
        		</div>
        	</div>
        </div>
    </section>
    <!-- Content Area Start -->
    <section id="contact" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-xs-12">
            <h3 class="title-head text-center heading">Get in touch</h3>
            <p class="text-center mb-5">If you are experiencing a behavioral or emotional issues which is impacting your day to day life, do not hesitate to seek help now and re-vive your life condition.</p>
              <?php echo form_open('pages/contactform', 'class="contact-form" id="myform"'); ?>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>"  placeholder="Full Name" >
                    <div class="help-block with-errors"><?php echo form_error('name'); ?></div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                    <div class="help-block with-errors"><?php echo form_error('email'); ?></div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <input type="phone" class="form-control" name="mobile" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>">
                    <div class="help-block with-errors"><?php echo form_error('mobile'); ?></div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <textarea name="message" placeholder="Message"><?php echo set_value('message'); ?></textarea>
                    <div class="help-block with-errors"><?php echo form_error('message'); ?></div>
                  </div>
                  <button type="submit" class="btn btn-block btn-info-filled">Send Message</button>
                  <div id="msgSubmit" class="h3 text-center hidden"></div>
                  <div class="clearfix"></div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>

          <div class="col-lg-4 col-md-4 col-xs-12">
            <h4 class="contact-info-title heading">Contact Information</h4>
            <?php
                            $i=1;
                            foreach($webdata as $row)
                            {
                  ?>
            <div class="contact-info">
              <address>
							<i class="fa fa-map-marker icons cyan-color contact-info-icon"></i>
							<?php echo $row->webaddress; ?>
						</address>
              <div class="tel-info">
                <a href="tel:<?php echo $row->phone; ?>"><i class="fa fa-phone icons cyan-color contact-info-icon"></i><?php echo $row->phone; ?></a>
                <a href="tel:<?php echo $row->webphone; ?>"><i class="fa fa-mobile icons cyan-color contact-info-icon"></i><?php echo $row->webphone; ?></a>
              </div>
              <a href="mailto:<?php echo $row->webemail; ?>"><i class="fa fa-envelope-o icons cyan-color contact-info-icon"></i> <?php echo $row->webemail; ?>,<?php echo $row->email; ?> </a>
              <a href="<?php echo $row->website ?>" target="_blank"><i class="fa fa-globe icons cyan-color contact-info-icon"></i> <?php echo $row->website; ?></a>
              <ul class="social-links">
                <li>
                  <a href="<?php echo $row->facebook; ?>" class="fa fa-facebook"></a>
                </li>
                
                <li>
                  <a href="<?php echo $row->twitter; ?>" class="fa fa-twitter"></a>
                </li>
                <li>
                  <a href="<?php echo $row->linkedin; ?>" class="fa fa-linkedin"></a>
                </li>
                <li>
                  <a href="<?php echo $row->youtube; ?>" class="fa fa-youtube"></a>
                </li>
              </ul>
            </div>
            <?php
                        $i++;
                       }
                     ?>
          </div>
        </div>


      </div>
    </section>

    <!-- Content Area End -->