<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Promo Code</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="hidden" name="id" value="<?php echo $promo_code[0]->id ;?>">
                      <label for="exampleInputEmail1">Coupon Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="coupon_name" placeholder="Coupon name" value="<?php echo $promo_code[0]->coupon_name ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Coupon Code</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="coupon_code" placeholder="Coupon Code" value="<?php echo $promo_code[0]->coupon_code ;?>">
                    </div>
                  </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label>Discount Type</label>
                      <select class="form-control" name="type">
                        <option value="A" <?php echo $promo_code[0]->type == 'A' ? "selected": "";?>>Euro(€)</option>
                        <option value="P" <?php echo $promo_code[0]->type == 'P' ? "selected": "";?>>Percent(%)</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Coupon Value</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="coupon_value" placeholder="Coupon Value" value="<?php echo $promo_code[0]->coupon_value ;?>">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Start Date</label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="start_date" placeholder="Start Date" min="<?php echo date('Y-m-d') ;?>" value="<?php echo $promo_code[0]->start_date ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">End Date</label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="end_date" placeholder="End Date" min="<?php echo date('Y-m-d') ;?>" value="<?php echo $promo_code[0]->end_date ;?>">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="1" <?php echo $promo_code[0]->status == 1 ? "selected": "";?>>Active</option>
                        <option value="0" <?php echo $promo_code[0]->status == 0 ? "selected": "";?>>Inactive</option>
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
