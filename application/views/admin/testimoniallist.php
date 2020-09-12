
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Testimonial List <span class="pull-right"><a class="btn btn-primary btn-sm text-white" href="<?php echo base_url(); ?>admin/testimonials/add_testimonial">Add New Testimonial</a></span></h3>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Client Image</th>
                      <th>Client Name</th>
                      <th>Testimonials</th>
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
                      <td style="margin:auto;"><img src="<?php echo base_url(); ?>assets/uploads/testimonial/<?php echo $row->image; ?>" style="width:80px; height:auto;"></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->testimonial; ?></td>
                      <td><?php echo $row->created; ?></td>
                      <td class='text-center'>
                        <span><input type="hidden" name="id" value="<?php echo $row->id; ?>"></span>
                        <a class="btn btn-sm btn-success text-white mb-3" href="<?php echo base_url(); ?>admin/testimonials/edit?id=<?php echo $row->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                        <a class="btn btn-sm btn-danger text-white mb-3" data-toggle="modal" data-target="#myModal1-<?php echo $row->id; ?>"><i class=
                          "fa fa-eraser" aria-hidden="true"></i></a> 

                      </tr>

                    <div id="myModal1-<?php echo $row->id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          
                          <span class="text-right px-2 py-1 text-secondary"><button type="button" class="close h3" data-dismiss="modal">&times;</button></span>
                          
                          <div class="modal-body py-4">
                          <p class="text-center h4 text-primary py-4">Are you sure want to delete? </p>
                          </div>
                          <div class="modal-footer">
                            <a  href='<?php echo base_url(); ?>admin/testimonials/delete?id=<?php echo $row->id; ?>' class="btn btn-danger"  >Yes</a>
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
    