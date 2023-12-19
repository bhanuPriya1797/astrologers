<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/promo-code');?>">Back</a></li>
            </ol>
          </div>
        </div>
      </div>
      <?php if(!empty($this->session->flashdata('error'))){
          echo $this->session->flashdata('error');
      } ?>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Promo Code</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Coupon Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="coupon_name" placeholder="Coupon name">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Coupon Code</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="coupon_code" placeholder="Coupon Code">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Select Vendors</label>
                      <select name="vendors" id="vendors" class="form-control" onchange=getServices();>
                        <option value="">Select Vendor</option>
                        <?php  foreach($vendor_list as $key => $vendorVal) { ?>                           
                          <option value="<?php echo $vendorVal->id; ?>"><?php echo $vendorVal->first_name; ?> <?php echo $vendorVal->last_name; ?></option>                         
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Select Services</label>
                      <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="" placeholder="Services"> -->
                      <select name="services[]" id="services" multiple class="form-control">
                        <>
                      </select>
                    </div>
                  </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Select Vendors</label>
                      <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="coupon_name" 
                      placeholder="Coupon name"> -->
                      <?php // echo "<pre>"; print_r($vendor_list); die; ?>
                      <select name="vendors" class="form-control">
                        <option value="">Select Vendor</option>
                        <?php  foreach($vendor_list as $key => $vendorVal) { ?>                           
                          <option value="<?php echo $vendorVal->id; ?>"><?php echo $vendorVal->first_name; ?> <?php echo $vendorVal->last_name; ?></option>                         
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Select Services</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="coupon_code" placeholder="Coupon Code">
                    </div>
                  </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Discount Type</label>
                    <select class="form-control" name="type">
                      <option value="A">Euro(€)</option>
                      <option value="P">Percent(%)</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Coupon Value</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="coupon_value" placeholder="Coupon Value">
                  </div>                   
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Start Date</label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="start_date" placeholder="Start Date" min="<?php echo date('Y-m-d') ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">End Date</label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="end_date" placeholder="End Date" min="<?php echo date('Y-m-d') ;?>">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                </div>
              </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
    <script>
      function getServices(){
        
        var vendorId = $("#vendors").val();
        $.ajax({
            url:'<?php echo base_url('admin/promo-code/services'); ?>',  
            data:{vendorId : vendorId} ,
            type:'POST',
            success:function(data){ 
              $('#services').html(data);
              console.log(data);
            }
            
          });
      }
    </script>
