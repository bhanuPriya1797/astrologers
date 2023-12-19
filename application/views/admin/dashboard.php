<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php // echo $vendors;?></h3>

                <p>Vendors</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php // echo base_url('admin/vendors');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php // echo $customers;?></h3>

                <p>Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php // echo base_url('admin/customers');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php // echo $subadmin ;?></h3>

                <p>Subadmin</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php // echo base_url('admin/manage-subadmin');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php // echo $dives_center ;?></h3>

                <p>Dives Center</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php // echo base_url('admin/manage-dives');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info" style="background-color: orange !important;">
              <div class="inner">
                <h3><?php // echo $rental_products;?></h3>

                <p>Rental Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php // echo base_url('admin/rental-products');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success" style="background-color: pink !important;">
              <div class="inner">
                <h3><?php // echo $service_booking;?></h3>

                <p>Bookings</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php // echo base_url('admin/manage-booking');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning" style="background-color: grey !important;">
              <div class="inner">
                <h3><?php // echo $blog_posting ;?></h3>

                <p>Blog</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php // echo base_url('admin/manage-blog');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger" style="background-color: blue !important;">
              <div class="inner">
                <h3><?php // echo $activity ;?></h3>

                <p>Activity</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php // echo base_url('admin/activity');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
        </div>
      </div>
    </section> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    
    setInterval(function(){
      $.ajax({
        url:"<?php echo base_url(); ?>admin/dashboard/getNotification",
        method:"POST",
        data:{xyz:1},
        beforeSend:function(){
        },
        success:function(data){
          var iNum = parseInt(data)
          $('#changeOnRequest').text(iNum);
          /*if(iNum > 0){
            $('#changeOnRequest').text(iNum);
          }
          else{
            $('#changeOnRequest').text("");
          }*/
          
          
        }
      });
  }, 700);

  </script>