
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add Post<span class="pull-right text-white"><a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>admin/blog">Post's List</a></span></h3>
            <div class="tile-bodytext-center py-4">
              <div style="color:red">
                <?php echo validation_errors(); ?>
                <?php if(isset($error)){print $error;}?>
              </div>
                <?php echo form_open_multipart('admin/blog/insert_post');?>  
                  <div class="form-group">
                    <label class="control-label h6">Post Title</label>
                    <input type="text" class="form-control" name="post_title" value="<?= set_value('post_title'); ?>" id="pic_title">
                  </div>
                  <div class="form-group row py-3">
                    <div class="col-md-4 h6"><label class="control-label">Post Category</label></div>
                    <div class="col-md-8">
                      <select class="form-control" name="cat">
                        <option value="">Select Category</option>
                         <?php
                            $i=1;
                            foreach($data as $row)
                            {
                          ?>
                        <option value="<?php echo $row->c_id; ?>"><?php echo $row->cname; ?></option>
                        <?php
                        $i++;
                       }
                     ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label h6">Post Description</label>
                    <textarea type="text" class="form-control" name="post_desc" rows="7"><?= set_value('post_desc'); ?></textarea>
                  </div>
                  <div class="form-group row py-5">
                    <div class="col-md-4"><label class="control-label h6">Upload Image</label></div>
                    <div class="col-md-8 custom-file">
                        <input type="file" class="custom-file-input" name="banner" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
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
                      <input type="submit" name="upload" value="Add Post" class="btn btn-primary btn-block">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    