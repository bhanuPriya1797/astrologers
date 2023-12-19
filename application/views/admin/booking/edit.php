<style>
  .select2-results__option[aria-selected] {
    color: #000;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: 22px;
  }
</style>
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>" class="btn btn-primary">Back</a></li>
            </ol>
          </div>
        <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin/booking-view/');?><?php  echo $booking_id; ?>"  class="btn btn-primary">View Booking</a></li>
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
              <h3 class="card-title">Edit Booking Details</h3>              
            </div>
            <?php //echo "<pre>"; print_r($vendor_booking); die; ?>
              <form action="<?php echo base_url('vendor/bank-info/add');?>" method="post" enctype="multipart/form-data">              
                <div class="card-body">
                  <hr><h3><b>Service Info<b></h3><hr>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Service Name  </label>
                      <?php // echo ucwords($vendor_booking['dives_name']); ?>
                      <div class="custom-file">
                        <input type="text"  name="service_name" id="service_name" class="form-control" value="<?php echo $vendor_booking['dives_name']; ?> ">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Service Price  (€) </label>
                      <?php // echo ucwords($vendor_booking['price_per_person']); ?>  
                      <div class="custom-file">
                        <input type="text"  name="service_price" id="service_price" class="form-control" value="<?php echo $vendor_booking['price_per_person']; ?> ">
                      </div>
                    </div>
                  </div>    
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Rental Product Name  </label>
                      <?php echo ucwords($vendor_booking['product_name']); ?>
                      <div class="custom-file">
                        <input type="text"  name="product_name" id="product_name" class="form-control" value="<?php echo $vendor_booking['product_name']; ?>  ">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Rental Product Price (€) </label>
                      <?php // echo $vendor_booking['product_price']; ?>
                      <div class="custom-file">
                        <input type="text"  name="product_price" id="product_price" class="form-control" value="<?php echo $vendor_booking['product_price']; ?> ">
                      </div>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Vendor Name  </label>
                      <?php //echo $vendor_booking['first_name']; ?> <?php // echo $vendor_booking['last_name']; ?>
                      <div class="custom-file">
                        <input type="text"  name="vendor_name" id="vendor_name" class="form-control" value="<?php echo $vendor_booking['first_name'].' '.  $vendor_booking['last_name']; ?> ">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Vendor Address  </label>
                      <?php  // echo $vendor_booking['address'].', '. $vendor_booking['city']. ', '. $vendor_booking['state'].' - '. $vendor_booking['zip_code']  ; ?>
                      <div class="custom-file">
                        <input type="text"  name="vendor_address" id="vendor_address" class="form-control" value=" <?php  echo $vendor_booking['address'].', '. $vendor_booking['city']. ', '. $vendor_booking['state'].' - '. $vendor_booking['zip_code']  ; ?> ">
                      </div>
                    </div>
                  </div>  
                    <?php //echo "<pre>"; print_r($statusList); die; ?>
                  <hr><h3><b>Booking Info<b></h3><hr>                 
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Booking Date  </label>
                      <?php // echo date('d-m-Y',strtotime($vendor_booking['booking_date'])); ?>
                      <div class="custom-file">
                        <input type="text"  name="booking_date" id="booking_date" class="form-control" value=" <?php echo date('d-m-Y',strtotime($vendor_booking['booking_date'])); ?> ">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Slots  </label>
                      <?php // echo $vendor_booking['slots']; ?>
                      <div class="custom-file">
                        <input type="text"  name="slots" id="slots" class="form-control" value=" <?php  echo $vendor_booking['slots']; ?> ">
                      </div>
                    </div>     
                    <div class="form-group col-md-3">
                      <label>No. of Persons  </label>
                      <?php//  echo $vendor_booking['no_of_persons']; ?>
                      <div class="custom-file">
                        <input type="text"  name="no_of_persons" id="no_of_persons" class="form-control" value=" <?php  echo $vendor_booking['no_of_persons']; ?> ">
                      </div>
                    </div>   
                    <div class="form-group col-md-3">
                      <label>Booking Status  </label>
                      <?php // echo $vendor_booking['status_name']; ?>
                      <div class="custom-file">
                        <select name="booking_status" id="booking_status" class="form-control">
                          <option value="">Select Status</option>
                          <?php foreach ($statusList as $key => $statusvalue) { ?>

                            <option value="<?php echo $statusvalue->id; ?>" <?php if($statusvalue->id ==  $vendor_booking['booking_status']){ echo "selected"; }?>>  <?php echo $statusvalue->status_name; ?></option>
                           
                          <?php } ?>
                          <input type="hidden" id="booking_id" value="<?php echo $booking_id; ?>">
                        </select>
                      </div>                      
                    </div>                       
                  </div>  
                  <hr><h3><b>Payment Info<b></h3><hr>
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Payment Date  </label>
                      <?php //echo date('d-m-Y',strtotime($vendor_booking['created_at'])); ?>
                      <div class="custom-file">
                        <input type="text"  name="payment_date" id="payment_date" class="form-control" value="  <?php echo date('d-m-Y',strtotime($vendor_booking['created_at'])); ?>">
                      </div>
                    </div>  
                    <div class="form-group col-md-3">
                      <label>Paid Amount  (€)</label>
                      <?php // echo $vendor_booking['paid_amount']; ?> 
                      <div class="custom-file">
                        <input type="text"  name="paid_amount" id="paid_amount" class="form-control" value="<?php  echo $vendor_booking['paid_amount']; ?>  ">
                      </div>
                    </div>    
                    <div class="form-group col-md-6">
                      <label>Transaction ID  </label>
                      <?php // echo $vendor_booking['txn_id']; ?>
                      <div class="custom-file">
                        <input type="text"  name="txn_id" id="txn_id" class="form-control" value="<?php  echo $vendor_booking['txn_id']; ?> ">
                      </div>
                    </div>     
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Payment Status  </label>
                      <?php // echo ucwords($vendor_booking['payment_status']); ?>
                      <div class="custom-file">
                        <input type="text"  name="txn_id" id="txn_id" class="form-control" value="<?php  echo $vendor_booking['payment_status']; ?> ">
                      </div>
                    </div>
                  </div>
                    
                  <hr><h3><b>User Info<b></h3><hr>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>User Name  </label>
                      <?php // echo ucwords($vendor_booking['user_name']); ?>
                      <div class="custom-file">
                        <input type="text"  name="user_name" id="user_name" class="form-control" value="<?php  echo $vendor_booking['user_name']; ?> ">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>User Email  </label>
                      <?php // echo $vendor_booking['user_email']; ?>
                      <div class="custom-file">
                        <input type="text"  name="user_email" id="user_email" class="form-control" value="<?php  echo $vendor_booking['user_email']; ?> ">
                      </div>
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
    <div class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Please give reason</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <form id="my-form" method="POST" action="<?php echo base_url(''); ?>">
            <div class="modal-body">
              <input name="reason" id="reason" placeholder="Reason" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="btn-submit" onclick="updateStatus()">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>

      $('#booking_status').change(function(){

        var bookingStatusId = $("#booking_status").val();
        if(bookingStatusId==3 || bookingStatusId==4){

          var title = $(this).val();
          $('.modal').modal('show');

        }else{

        updateStatus();
        }

       

      });

      // function updateStatus(){

      //   var bookingStatusId = $("#booking_status").val();
      //   var bookingId =  $("#booking_id").val();          

      //   $.ajax({
      //         url:'<?php // echo base_url(); ?>/admin/booking/updateStatus',  
      //         type:'POST',
      //         data:{bookingStatusId:bookingStatusId,bookingId:bookingId} ,
      //         success:function(data){            

      //           if(data=='success'){

      //            location.reload();

      //           }else{

      //             location.reload();
      //           }

      //         }
              
      //       });

      // }

        // $(document).ready(function () {
        //     $( "#btn-submit" ).click(function() {
        //         $( "#my-form" ).submit();
        //     });
        // });


        function updateStatus(){

          var reason=$('#reason').val();
          var bookingStatusId = $("#booking_status").val();
          var bookingId =  $("#booking_id").val(); 


          $.ajax({
              type: "POST",
              url:'<?php echo base_url(); ?>/admin/booking/updateStatus',  
              data: {"reason": reason,"bookingStatusID":bookingStatusId,"bookingId": bookingId},
              cache: false,
              success: function(result){

                // console.log(result);

                  // var result=trim(result);
                  if(result==1){
                     alert("status update successfully!");
                    location.reload();
                  }else{
                      // $("#loginerror").html(result);
                      alert("No update!");
                      location.reload();
                  }
              }
          });
        }

    </script>