      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add City</h3>
            <div class="tile-body">
              <?php echo form_open_multipart('admin/city/insert');?>  
                <div class="form-group row">
                  <div class="col-md-6">
                      
                      <select name="loc" class="form-control">
                        <option >Choose Country</option>
                        <?php
                            $i=1;
                            foreach($lcdata as $row)
                            {
                            ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->loc; ?></option>
                             <?php
                                $i++;
                               }
                         ?>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <input type="text" name="city" class="form-control" placeholder="Enter City">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                      <input type="text" name="lat" class="form-control" placeholder="Enter latitude">
                  </div>
                  <div class="col-md-4">
                      <input type="text" name="lang" class="form-control" placeholder="Enter longitude">
                  </div>
                  <div class="col-md-4">
                      <input type="submit" name="submit" class="btn btn-danger btn-block">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">City List</h3>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>City</th>
                      <th>Country</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                            $i=1;
                            foreach($data as $row)
                            {
                  ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row->ctame; ?></td>
                      <td><?php echo $row->loc; ?></td>
                      <td>
                        <?php echo form_open('admin/city/update_status'); ?>
                          <input type="hidden" name="id" value="<?php echo $row->ctid; ?>">
                          <select class="btn btn-default" id="exampleFormControlSelect1" name="status" onchange="if(this.value != 2) { this.form.submit(); }">
                            <option selected>
                              <?php if ($row->status == 0 ){ echo 'Disable';
                              }else {
                                echo 'Active';
                              }
                              ?>
                            </option>
                            <?php if($row->status == 0){
                              echo '<option value="1">Active</option>';
                            } else {
                              echo '<option value="0">Disable</option>';
                            }
                            ?>
                          </select>
                        <?php echo form_close(); ?>
                      </td>
                      <td><a href="<?php echo base_url(); ?>admin/city/edit/<?php echo $row->ctid; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?php echo base_url(); ?>admin/city/delete/<?php echo $row->ctid; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                      </tr>
                    <?php
                        $i++;
                       }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
