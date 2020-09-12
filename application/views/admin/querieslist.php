
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Created at</th>
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
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->mobile; ?></td>
                      <td><?php echo $row->email; ?></td>
                      <td><?php echo $row->created; ?></td>
                      <td class='text-center'>
                        <span><input type="hidden" name="id" value="<?php echo $row->contact_id; ?>"></span>
                        <a class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#myModal1-<?php echo $row->contact_id; ?>"><i class=
                          "fa fa-eraser" aria-hidden="true"></i></a> 

                      </tr>

                    <div id="myModal1-<?php echo $row->contact_id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          
                          <span class="text-right px-2 py-1 text-secondary"><button type="button" class="close h3" data-dismiss="modal">&times;</button></span>
                          
                          <div class="modal-body py-4">
                          <p class="text-center h4 text-primary py-4">Are you sure want to delete? </p>
                          </div>
                          <div class="modal-footer">
                            <a  href='<?php echo base_url(); ?>admin/dashboard/deletequery?id=<?php echo $row->contact_id; ?>' class="btn btn-danger"  >Yes</a>
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
    