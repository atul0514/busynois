
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Job S.No.</th>
                      <th>Applicant Name</th>
                      <th>Job Title</th>
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
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->jtitle; ?></td>
                      <td><?php echo $row->created; ?></td>
                      <td class="text-center">
                        <input type="hidden" name="<?php echo $row->jid; ?>">
                        <a href="<?php echo base_url(); ?>admin/jobs/viewresume?jid=<?php echo $row->jid;?>" class="btn btn-success btn-sm"><i class="icon fa fa-eye"></i> View</a>
                        <a href="<?php echo base_url(); ?>admin/jobs/deleteresume?jid=<?php echo $row->jid;?>" class="btn btn-danger btn-sm"><i class="icon fa fa-eraser"></i> Delete</a></td>
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
    