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

        <!-- <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin/booking-view/');?><?php  echo $booking_id; ?>"  class="btn btn-primary">View Booking</a></li>
        </ol> -->

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
              <h3 class="card-title">Payment Distribution</h3>              
            </div>
            <?php //echo "<pre>"; print_r($vendor_booking); die; ?>
              <form action="<?php echo base_url('admin/payment-history/send_payment');?>" method="post" enctype="multipart/form-data">              
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Commission (in %)</label>
                      <div class="custom-file">
                        <input type="text"  name="service_name" id="service_name" class="form-control">
                      </div>
                    </div>
                  </div>                 
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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