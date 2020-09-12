
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Testimonial List <span class="pull-right"><a class="btn btn-primary btn-sm text-white" href="<?php echo base_url(); ?>admin/events/add_event">Add New event</a></span></h3>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Event Banner</th>
                      <th>Event Name</th>
                      <th>Event Location</th>
                      <th>Event Date</th>
                      <th>Created</th>
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
                      <td><img src="<?php echo base_url(); ?>assets/uploads/events/<?php echo $row->evimage; ?>" style="width:80px; height:40px;"></td>
                      <td><?php echo $row->evname; ?></td>
                      <td><?php echo $row->evcity; ?></td>
                      <td><?php echo $row->edate; ?></td>
                      <td><?php echo $row->created; ?></td>
                      <td class='text-center'>
                        <span><input type="hidden" name="id" value="<?php echo $row->eid; ?>"></span>
                        <a href="<?php echo base_url(); ?>admin/events/edit?eid=<?php echo $row->eid; ?>" class="btn btn-sm btn-success text-white"><i class=
                          "fa fa-pencil"></i></a> 
                        <a class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#myModal1-<?php echo $row->eid; ?>"><i class=
                          "fa fa-eraser" aria-hidden="true"></i></a> 

                      </tr>

                    <div id="myModal1-<?php echo $row->eid; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          
                          <span class="text-right px-2 py-1 text-secondary"><button type="button" class="close h3" data-dismiss="modal">&times;</button></span>
                          
                          <div class="modal-body py-4">
                          <p class="text-center h4 text-primary py-4">Are you sure want to delete? </p>
                          </div>
                          <div class="modal-footer">
                            <a  href='<?php echo base_url(); ?>admin/events/delete?id=<?php echo $row->eid; ?>' class="btn btn-danger"  >Yes</a>
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
    