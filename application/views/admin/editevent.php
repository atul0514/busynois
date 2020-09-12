
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Update Event<span class="pull-right text-white"><a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>admin/events">Event List</a></span></h3>
            <div class="tile-bodytext-center py-4">
              <div style="color:red">
                <?php echo validation_errors(); ?>
                <?php if(isset($error)){print $error;}?>
              </div>
                <?php echo form_open_multipart('admin/events/update');?>  
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row->eid; ?>">
                    <label class="control-label"><strong>Event Name</strong></label>
                    <input type="text" class="form-control" name="ename" value="<?php echo $row->evname; ?>" id="event_title">
                  </div>
                  <div class="form-group">
                    <label class="control-label"><strong>Event Details</strong></label>
                    <textarea type="text" class="form-control" name="edetails" rows="7"><?php echo $row->evdetails; ?></textarea>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label class="control-label"><strong>Event Date<?php echo $row->edate; ?></strong></label>
                      <input class="form-control" type="date"  value="<?php echo $row->edate; ?>" name="edate" >
                    </div>
                    <div class="col">
                      <label class="control-label"><strong>Event Time</strong></label>
                      <input type="time" class="form-control" name="etime" value="<?php echo $row->etime; ?>">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col">
                      <label class="control-label"><strong>Event Type</strong></label>
                      <select class="form-control" name="etype">
                         <?php if($row->etype == Online){ ?>
                         <option value="Online" selected>Online</option>
                          <option value="Offline">Offline</option>
                        <?php } else { ?>
                            <option value="Online">Online</option>
                            <option value="Offline" selected>Offline</option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="col">
                      <label class="control-label"><strong>Event Venue</strong></label>
                      <input type="text" class="form-control" name="evenue" value="<?php echo $row->elocation; ?>">
                    </div>
                    <div class="col">
                      <label class="control-label"><strong>Event City</strong></label>
                      <input type="text" class="form-control" name="ecity" value="<?php echo $row->evcity; ?>">
                    </div>
                  </div>
                  <div class="form-group row bg-light py-2" >
                    <div class="col-md-4 text-center">
                      <label class="control-label mb-3 h5">Uploaded Event Image</label><br>
                      <img src="<?php echo base_url(); ?>assets/uploads/events/<?php echo $row->evimage; ?>" class="img-fluid" style="width:200px; height:auto;">
                      <input type="hidden" name="bnold" value="<?php echo $row->evimage; ?>">
                    </div>
                    
                    <div class="col-md-8 text-center">
                      <label class="control-label h5">Update Image</label>
                      <div class="upload" style="padding:40px 0;">
                        <input type="file" name="banner" class="">
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                      <input type="submit" name="upload" value="Update Event" class="btn btn-primary btn-block">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
<script>

var date = new Date();
date.setDate(date.getDate());

$('#date').datepicker({ 
    startDate: date
});

</script>