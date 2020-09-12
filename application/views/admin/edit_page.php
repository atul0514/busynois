
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Update Pages<span class="pull-right text-white"><a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>admin/pages">Pages's List</a></span></h3>
            <div class="tile-bodytext-center py-4">
              <div style="color:red">
                <?php echo validation_errors(); ?>
                <?php if(isset($error)){print $error;}?>
              </div>
                <?php echo form_open_multipart('admin/pages/update');?>  
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row->pid; ?>">
                    <label class="control-label h6">Pages Title</label>
                    <input type="text" class="form-control" name="pages_title" value="<?php echo $row->p_title; ?>" id="pic_title">
                  </div>
                  <div class="form-group">
                    <label class="control-label h6">Pages Description</label>
                    <textarea type="text" class="form-control" name="pages_desc" id="editor" cols="30" rows="10"><?php echo $row->p_description; ?></textarea>
                  </div>
                  <div class="form-group row bg-light py-2" >
                    <div class="col-md-4 text-center">
                      <label class="control-label mb-3 h6">Uploaded Image</label><br>
                      <img src="<?php echo base_url(); ?>assets/uploads/pages/<?php echo $row->banner_image; ?>" class="img-fluid" style="width:200px; height:auto;">
                      <input type="hidden" name="bnold" value="<?php echo $row->banner_image; ?>">
                    </div>
                    
                    <div class="col-md-8 text-center">
                      <label class="control-label h6">Update Image</label>
                      <div class="upload" style="padding:40px 0;">
                        <input type="file" name="banner" class="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label h6">Meta Title</label>
                    <input type="text" class="form-control" name="mtitle" value="<?php echo $row->p_meta_title; ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label h6">Meta Description</label>
                    <input type="text" class="form-control" name="mdesc" value="<?php echo $row->p_meta_desc; ?>" id="pic_title">
                  </div>
                  <div class="form-group">
                    <label class="control-label h6">Meta Keywords</label>
                    <input type="text" class="form-control" name="mkeywords" value="<?php echo $row->p_meta_keywords; ?>" id="pic_title">
                  </div>
                  <div class="form-group">
                      <input type="submit" name="upload" value="Update Pages" class="btn btn-primary btn-block">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    