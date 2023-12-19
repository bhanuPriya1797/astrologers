<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Booking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('vendor/dashboard');?>">Back</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
      <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php  echo $total_amount; ?> € </h3>
            <p>Total Amount</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <!-- <a href="<?php // echo base_url('admin/manage-booking');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php  echo $pending_amunt; ?> € </h3>

            <p>Pending Amount</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <!-- <a href="<?php // echo base_url('admin/manage-booking');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php  echo $paid_amount; ?> € </h3>

            <p>Paid Amount</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <!-- <a href="<?php // echo base_url('admin/manage-booking');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      
    </div>
    <!-- Main content -->
    <section class="content">
      <?php if(!empty($this->session->flashdata('success'))){
          echo $this->session->flashdata('success');
      } ?>
      <div></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <a href="rental-products/add"><button class="btn btn-primary" style="float:right;">Add Product</button></a>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User Name</th>
                    <th>Vendor Name</th>
                    <th>Service Name</th>
                    <th>Paid Amount</th>
                    <th>Status</th>
                    <th>Booking Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i =1;
                    foreach ($vendor_booking as $key => $value) { ?>
                    <tr>
                      <td><?php echo $i ;?></td>
                      <td><?php echo $value->first_name." ".$value->last_name;?></td>
                      <td><?php echo $value->vendor_fname." ".$value->vendor_lname;?></td>
                      <td><?php echo ucwords($value->dives_name);?></td>
                      <td><?php echo $value->paid_amount ;?> €</td> 
                      <?php if($value->status_name == 'Completed'){ ?><td style="background-color:#00FF00;"><?php echo $value->status_name;?></td><?php } ?>
                      <?php if($value->status_name == 'Booked'){ ?><td style="background-color:#28a745;"><?php echo $value->status_name;?></td><?php } ?>
                      <?php if($value->status_name == 'Pending'){ ?><td style="background-color:#FFFF00;"><?php echo $value->status_name;?></td><?php } ?>
                      <?php if($value->status_name == 'Cancelled'){ ?><td style="background-color:#ff0000;"><?php echo $value->status_name;?></td><?php } ?>
                      <?php if($value->status_name == 'Cancelled & Refund'){ ?><td style="background-color:#Ffa500;"><?php echo $value->status_name;?></td><?php } ?>
                      <td><?php echo date("d-m-Y",strtotime($value->booking_date)) ;?></td>
                      <td><a href="<?php echo base_url('admin/booking-view/'.$value->id);?>"><i class="fas fa-eye"></i></a>
                       </td>
                    </tr>
                    <?php  $i++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script>

    function del(id){
      var result = confirm("Do you want to delete this booking ?");
      if (result) {
        $.post('<?=base_url("admin/booking/delete_booking")?>',
        {
          id : id,
        },
        function(data){
          location.reload();
        });
      }
    }
    
    $("body").on("change",".tgl_checkbox",function(){
    $.post('<?=base_url("admin/booking/change_status")?>',
    {
      id : $(this).data('id'),
      status : $(this).is(':checked')==true?1:0
    },
    function(data){
      alert("Your status has been successfully updated");
    });
  });

  </script>
  