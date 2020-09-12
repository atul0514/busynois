
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">All Posts <span class="pull-right"><a class="btn btn-primary btn-sm text-white" href="<?php echo base_url(); ?>admin/blog/add_post">Add New Post</a></span></h3>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Post Banner</th>
                      <th>Post Title</th>
                      <th>Category</th>
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
                      <td><img src="<?php echo base_url(); ?>assets/uploads/blog/<?php echo $row->p_img; ?>" style="width:80px; height:40px;"></td>
                      <td><?php echo $row->p_title; ?></td>
                      <td><?php echo $row->cname; ?></td>
                      <td><?php echo $row->created; ?></td>
                      <td class='text-center'>
                        <span><input type="hidden" name="id" value="<?php echo $row->pid; ?>"></span>
                        <a href="<?php echo base_url(); ?>admin/blog/edit?pid=<?php echo $row->pid; ?>" class="btn btn-sm btn-success text-white"><i class=
                          "fa fa-pencil"></i></a> 
                        <a class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#myModal1-<?php echo $row->pid; ?>"><i class=
                          "fa fa-eraser" aria-hidden="true"></i></a> 

                      </tr>

                    <div id="myModal1-<?php echo $row->pid; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          
                          <span class="text-right px-2 py-1 text-secondary"><button type="button" class="close h3" data-dismiss="modal">&times;</button></span>
                          
                          <div class="modal-body py-4">
                          <p class="text-center h4 text-primary py-4">Are you sure want to delete? </p>
                          </div>
                          <div class="modal-footer">
                            <a  href='<?php echo base_url(); ?>admin/blog/delete?id=<?php echo $row->pid; ?>' class="btn btn-danger"  >Yes</a>
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
    