
    <?php
      if($login=$this->session->userdata('login')){
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $login; ?> <strong><?php echo $this->session->userdata('name'); ?>...!</strong> .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
      }
    ?>
      <div class="row">
        <div class="col-md-4 col-lg-4 py-4">
          <a href="<?php echo base_url(); ?>admin/dashboard/contact_form_quries"><div class="widget-small warning coloured-icon"><i class="icon fa fa-bolt fa-3x"></i>
            <div class="info">
              <h4>Form Queries</h4>
            </div>
          </div></a>
        </div>
        <div class="col-md-4 col-lg-4 py-4">
          <a href="<?php echo base_url(); ?>admin/dashboard/websiteinfo"><div class="widget-small danger coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Web Setting</h4>
            </div>
          </div>
        </div></a>
        <div class="col-md-4 col-lg-4 py-4">
          <a href="<?php echo base_url(); ?>admin/dashboard/profile"><div class="widget-small primary coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Profile</h4>
              
            </div>
          </div>
        </div></a>
      </div>
