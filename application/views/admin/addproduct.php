
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-bodytext-center">
                  <?php echo form_open_multipart('admin/services/new_product');?>  
                    <h3 class="tile-title px-2">Add Product</h3>
                  <div class="form-group row py-2">
                    <div class="col-md-3">
                      <input type="text" class="form-control" name="proname" placeholder="Enter Product Title" id="service_title">
                    </div>
                    <div class="col-md-3">
                      <select class="form-control" name="sname" >
                        <option selected="">Choose Service</option>
                        <?php
                            $i=1;
                            foreach($data as $row)
                            {
                        ?>
                        <option value="<?php echo $row->sid; ?>"><?php echo $row->sname; ?></option>
                        <?php
                          $i++;
                           }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="pro_img" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <input type="submit" name="submit" value="Add " class="btn btn-primary btn-block">
                    </div>
                  </div>                  
                  </form>

                  <div class="row">
                    <h3 class="tile-title px-3">Product List</h3>
                      <div class="col-md-12">
                        <div class="table-responsive">
                          <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                              <tr>
                                <th>S.No.</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Parent Service</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=1;
                                foreach($prodata as $row)
                                {
                            ?>
                              <tr>
                            
                                <td><?php echo $i; ?></td>
                                <td><img src="<?php echo base_url(); ?>assets/uploads/services/products/<?php echo $row->prop_img; ?>" style="width:75px; height:40px;"></td>
                                <td><?php echo $row->proname; ?></td>
                                <td><?php echo $row->sname; ?></td>
                                <td><input type="hidden" name="pid" value="<?php echo $row->p_id; ?>"><a href="<?php echo base_url(); ?>admin/services/deleteproduct?pid=<?php echo $row->p_id; ?>" class="btn btn-sm btn-danger"><i class=
                          "fa fa-eraser" aria-hidden="true"></i> Delete</a></td>
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
        </div>
      </div>