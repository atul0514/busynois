

      <div class="row">
        <div class="col-md-12">
           <div ><span class="pull-right"><a href="<?php echo base_url(); ?>admin/jobs/resume" class="btn btn-danger btn-sm"><i class="fa fa-server" aria-hidden="true"></i> All Jobs Application</a> </span></div>
            
        </div>
        <div class="col-md-12">

          <div class="tile">
            <div class="tile-body">
                    <input class="form-control-plaintext" type="hidden" name="title" type="text" value="<?php echo $row->jid; ?>" readonly>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3 ht"><strong>Applicant Name</strong></label>
                  <div class="col-md-8">
                    <input class="form-control-plaintext" type="text" name="webphone" value="<?php echo $row->name; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><strong>Applicant Email </strong></label>
                  <div class="col-md-8">
                    <input class="form-control-plaintext" type="email" value="<?php echo $row->email; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><strong>Applicant Mobile</strong></label>
                  <div class="col-md-8">
                    <input class="form-control-plaintext" type="text" value="<?php echo $row->mobile; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><strong>Download Applicant Resume</strong></label>
                  <div class="col-md-8">
                    <a href="<?php echo base_url(); ?>uploads/resumes/<?php echo $row->resume; ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Resume</a>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><strong>Created at</strong></label>
                  <div class="col-md-8">
                    <input class="form-control-plaintext" type="text" name="insta" value="<?php echo $row->created; ?>" readonly>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>