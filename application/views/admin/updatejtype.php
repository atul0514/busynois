      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Update Job Type</h3>
            <div class="tile-body">
              <?php echo form_open_multipart('admin/jobtype/update');?>  
                <div class="form-group row">
                  <div class="col-md-8">
                      <input type="text" name="job" class="form-control" value="<php <?php echo $rows->jtname; ?> " placeholder="Enter Job Type">
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
            <h3 class="tile-title">Listed Job Type</h3>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Job Type</th>
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
                      <td><?php echo $row->jtname ; ?></td>
                      <td>
                        <?php echo form_open('admin/jobtype/update_status'); ?>
                          <input type="hidden" name="id" value="<?php echo $row->jtid; ?>">
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
                      <td><a href="<?php echo base_url(); ?>admin/jobtype/edit/<?php echo $row->jtid; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?php echo base_url(); ?>admin/jobtype/delete/<?php echo $row->jtid; ?>" class="btn btn-danger btn-sm">Delete</a></td>
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
