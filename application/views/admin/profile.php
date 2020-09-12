

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <?php
                
                foreach($data as $row)
                {
               ?>
               <?php echo form_open('admin/dashboard/updateprofile', 'class="form-horizontal" id="myform"'); ?>
                <div class="form-group row">
                  <label class="control-label col-md-3">Administrator Name</label>
                  <div class="col-md-9">
                    <input class="form-control" name="adminname" type="text" value="<?php echo $row->name; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Administrator Email/Username</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="adminemail" value="<?php echo $row->username; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-9">
                     <input class="form-control" type="password" name="adminpass" value="<?php echo $row->password; ?>">
                  </div>
                </div>
                <div class="tile-footer">
                  <div class="row">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="Update Profile" class="btn btn-primary btn-block">
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