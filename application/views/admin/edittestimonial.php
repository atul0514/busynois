
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add New Testimonial<span class="pull-right text-white"><a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>admin/testimonials">Testimonial's List</a></span></h3>
            <div class="tile-bodytext-center py-4">
              <div style="color:red">
                <?php echo validation_errors(); ?>
                <?php if(isset($error)){print $error;}?>
              </div>
                <?php echo form_open_multipart('admin/testimonials/update');?> 
                <input type="hidden" name="id" value="<?php echo $row->id; ?>"> 
                  <div class="form-group">
                    <label class="control-label">Client Name</label>
                    <input type="text" class="form-control" name="tname" value="<?php echo $row->name; ?>" id="pic_title">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Testimonial</label>
                    <textarea type="text" class="form-control" name="testi" rows="7"><?php echo $row->testimonial; ?></textarea>
                  </div>
                  <div class="form-group row bg-light py-2" >
                    <div class="col-md-4 text-center">
                      <label class="control-label mb-3 h5">Uploaded Client Image</label><br>
                      <img src="<?php echo base_url(); ?>assets/uploads/testimonial/<?php echo $row->image; ?>" class="img-fluid" style="width:200px; height:auto;">
                      <input type="hidden" name="bnold" value="<?php echo $row->image; ?>">
                    </div>
                    
                    <div class="col-md-8 text-center">
                      <label class="control-label h5">Update Image</label>
                      <div class="upload" style="padding:40px 0;">
                        <input type="file" name="banner" class="">
                      </div>
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
    