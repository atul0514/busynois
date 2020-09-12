
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Job S.No.</th>
                      <th>Job Title</th>
                      <th>Job Name</th>
                      <th>Job Type</th>
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
                      <td><?php echo $row->Jtitle; ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->comp; ?></td>
                      <td><?php echo $row->created; ?></td>
                      <td class="text-center">
                        <a href="jobs/edit/<?php echo $row->jid;?>" class="btn btn-success btn-sm"><i class="icon fa fa-pencil"></i> Edit</a>
                        <a href="jobs/delete/<?php echo $row->jid;?>" class="btn btn-danger btn-sm"><i class="icon fa fa-eraser"></i> Delete</a></td>
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
    