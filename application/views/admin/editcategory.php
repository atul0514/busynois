
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <?php echo form_open_multipart('admin/blog/update_category');?>  
                <div class="row">
                  <div class="col-9">
                    <input type="hidden" class="form-control" name="cid" value="<?php echo $erow->c_id; ?>">
                    <input type="text" class="form-control" name="cname" value="<?php echo $erow->cname; ?>">
                  </div>
                  <div class="col-3">
                    <input type="submit" class="btn btn-primary text-white btn-block" value="Update Category">
                  </div>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Category Name</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                            $i=1;
                            foreach($cdata as $row)
                            {
                   ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row->cname; ?></td>
                      <td><?php echo $row->created; ?></td>
                      <td class='text-center'>
                        <span><input type="hidden" name="id" value="<?php echo $row->c_id; ?>"></span>
                        <a class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#myModal1-<?php echo $row->c_id; ?>"><i class=
                          "fa fa-eraser" aria-hidden="true"></i></a> 
                        <a class="btn btn-sm btn-success text-white" href="<?php echo base_url(); ?>admin/blog/edit_category?cid=<?php echo $row->c_id; ?>"><i class=
                          "fa fa-pencil" aria-hidden="true"></i></a> 

                      </tr>

                    <div id="myModal1-<?php echo $row->c_id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          
                          <span class="text-right px-2 py-1 text-secondary"><button type="button" class="close h3" data-dismiss="modal">&times;</button></span>
                          
                          <div class="modal-body py-4">
                          <p class="text-center h4 text-primary py-4">Are you sure want to delete? </p>
                          </div>
                          <div class="modal-footer">
                            <a  href='<?php echo base_url(); ?>admin/blog/deletecat?id=<?php echo $row->c_id; ?>' class="btn btn-danger"  >Yes</a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                          </div>
                        </div>

                        </div>
                    </div>

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
    