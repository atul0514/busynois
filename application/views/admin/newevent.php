
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add New Event<span class="pull-right text-white"><a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>admin/events">Event List</a></span></h3>
            <div class="tile-bodytext-center py-4">
              <div style="color:red">
                <?php echo validation_errors(); ?>
                <?php if(isset($error)){print $error;}?>
              </div>
                <?php echo form_open_multipart('admin/events/insert_event');?>  
                  <div class="form-group">
                    <label class="control-label"><strong>Event Name</strong></label>
                    <input type="text" class="form-control" name="ename" value="<?= set_value('ename'); ?>" id="pic_title">
                  </div>
                  <div class="form-group">
                    <label class="control-label"><strong>Event Details</strong></label>
                    <textarea type="text" class="form-control" name="edetails" rows="7"><?= set_value('edetails'); ?></textarea>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label class="control-label"><strong>Event Type</strong></label>
                      <select class="form-control" name="etype">
                          <option value="Online">Online</option>
                          <option value="Offline">Offline</option>
                      </select>
                    </div>
                    <div class="col">
                      <label class="control-label"><strong>Event Date</strong></label>
                      <input type="date" class="form-control" name="edate">
                    </div>
                    <div class="col">
                      <label class="control-label"><strong>Event Time</strong></label>
                      <input type="time" class="form-control" name="etime" value="<?php echo time('hh-mm'); ?>" id="pic_title">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col">
                      <label class="control-label"><strong>Event Venue</strong></label>
                      <input type="text" class="form-control" name="evenue" value="<?= set_value('evenue'); ?>" id="pic_title">
                    </div>
                    <div class="col">
                      <label class="control-label"><strong>Event City</strong></label>
                      <input type="text" class="form-control" name="ecity" value="<?= set_value('ecity'); ?>" id="pic_title">
                    </div>
                  </div>
                  <div class="form-group mt-3" >
                    <label class="control-label"><strong>Upload Event Image</strong></label>
                    <div class="upload" style="padding:40px 0;">
                      <input type="file" name="banner" class="">
                    </div>
                  </div>
                  <div class="form-group">
                      <input type="submit" name="upload" value="Add Event" class="btn btn-primary btn-block">
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