
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add New Testimonial<span class="pull-right text-white"><a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>admin/testimonials">Testimonial's List</a></span></h3>
            <div class="tile-bodytext-center py-4">
              <div style="color:red">
                <?php echo validation_errors(); ?>
                <?php if(isset($error)){print $error;}?>
              </div>
                <?php echo form_open_multipart('admin/testimonials/insert_testimonial');?>  
                  <div class="form-group">
                    <label class="control-label">Client Name</label>
                    <input type="text" class="form-control" name="tname" value="<?= set_value('tname'); ?>" id="pic_title">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Testimonial</label>
                    <textarea type="text" class="form-control" name="testi" rows="7">
                      <?= set_value('post_desc'); ?>
                    </textarea>
                  </div>
                  <div class="form-group" >
                    <label class="control-label">Upload Client Image</label>
                    <div class="upload" style="padding:40px 0;">
                      <input type="file" name="banner" class="">
                    </div>
                  </div>
                  <div class="form-group">
                      <input type="submit" name="upload" value="Add Testimonial" class="btn btn-primary btn-block">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    