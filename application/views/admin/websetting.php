

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Website Details</h3>
            <div class="tile-body">
              <?php
                
                foreach($data as $row)
                {
               ?>
               <?php echo form_open('admin/dashboard/updatewebsiteinfo', 'class="form-horizontal" id="myform"'); ?>
                <div class="form-group row">
                  <label class="control-label col-md-3">Wesbite Title</label>
                  <div class="col-md-8">
                    <input class="form-control" name="title" type="text" value="<?php echo $row->webtitle; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Footer About Me</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="4" name="footertext"><?php echo $row->footerabout; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Website Phone</label>
                  <div class="col-md-8">
                    <input class="form-control" type="phone" name="phone" value="<?php echo $row->phone; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Website Mobile</label>
                  <div class="col-md-8">
                    <input class="form-control" type="phone" name="webphone" value="<?php echo $row->webphone; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Website Email</label>
                  <div class="col-md-8">
                    <input class="form-control" type="email" name="webemail" value="<?php echo $row->webemail; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Website Secondary Email</label>
                  <div class="col-md-8">
                    <input class="form-control" type="email" name="email" value="<?php echo $row->email; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Business Address</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="webaddress" value="<?php echo $row->webaddress; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Other Website</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="website" value="<?php echo $row->website; ?>">
                  </div>
                </div>
                <h3 class="tile-title">Wesbite Social Details</h3>
                <div class="form-group row">
                  <label class="control-label col-md-3">facebook</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="fb" value="<?php echo $row->facebook; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Twitter</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="twitter" value="<?php echo $row->twitter; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Linkedin</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="linkedin" value="<?php echo $row->linkedin; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Youtube</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="youtube" value="<?php echo $row->youtube; ?>">
                  </div>
                </div>
                <div class="tile-footer">
                  <div class="row">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="Update Website Info" class="btn btn-primary btn-block">
                    </div>
                  </div>
                </div>
              <?php echo form_close(); ?>
              <?php } ?>
            </div>

          </div>
        </div>
      </div>
    </main>