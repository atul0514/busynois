
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add Page<span class="pull-right text-white"><a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>admin/pages">Page List</a></span></h3>
            <div class="tile-bodytext-center py-4">
              <div style="color:red">
                <?php echo validation_errors(); ?>
                <?php if(isset($error)){print $error;}?>
              </div>
                <?php echo form_open_multipart('admin/pages/insert');?>  
                  <div class="form-group">
                    <label class="control-label h6">Page Title</label>
                    <input type="text" class="form-control" name="page_title" value="<?= set_value('page_title'); ?>" id="pic_title">
                  </div>
                  <div class="form-group">
                    <label class="control-label h6">Page Description</label>
                  <textarea type="text" class="form-control" name="page_desc" rows="7"><?= set_value('page_desc'); ?></textarea>
                  </div>
                  <div class="form-group" >
                    <label class="control-label h6">Upload Image</label>
                    <div class="upload" style="padding:40px 0;">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="banner" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label h6">Meta Title</label>
                    <input type="text" class="form-control" name="mtitle" value="<?= set_value('mtitle'); ?>" id="pic_title">
                  </div>
                  <div class="form-group">
                    <label class="control-label h6">Meta Description</label>
                    <input type="text" class="form-control" name="mdesc" value="<?= set_value('mdesc'); ?>" id="pic_title">
                  </div>
                  <div class="form-group">
                    <label class="control-label h6">Meta Keywords</label>
                    <input type="text" class="form-control" name="mkeywords" value="<?= set_value('mkeywords'); ?>" id="pic_title">
                  </div>
                  <div class="form-group">
                      <input type="submit" name="upload" value="Add Page" class="btn btn-primary btn-block">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    