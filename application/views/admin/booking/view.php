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
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin/booking-edit/');?><?php  echo $booking_id; ?>" class="btn btn-primary">Edit Booking</a></li>
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
              <h3 class="card-title">View Booking Details</h3>              
            </div>
            <?php //echo "<pre>"; print_r($vendor_booking); die; ?>
              <form action="<?php echo base_url('vendor/bank-info/add');?>" method="post" enctype="multipart/form-data">              
                <div class="card-body">
                  <hr><h3><b>Service Info<b></h3><hr>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Service Name :
                        <span class="font-normal"><?php echo ucwords($vendor_booking['dives_name']); ?></span> </label>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Service Price : <span class="font-normal">
                        <?php echo $vendor_booking['price_per_person']; ?> € </span></label>
                      </div>
                    </div>    
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Rental Product Name :  <span class="font-normal">
                        <?php echo ucwords($vendor_booking['product_name']); ?></span></label>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Rental Product Price :  <span class="font-normal">
                        <?php echo $vendor_booking['product_price']; ?> €  </span></label> 
                      </div>
                    </div> 
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Vendor Name : <span class="font-normal">
                        <?php echo $vendor_booking['first_name']; ?> <?php echo $vendor_booking['last_name']; ?></span></label> 
                      </div>
                      <div class="form-group col-md-6">
                        <label>Vendor Address : <span class="font-normal">
                        <?php  echo $vendor_booking['address'].', '. $vendor_booking['city']. ', '. $vendor_booking['state'].' - '. $vendor_booking['zip_code']  ; ?>   </span></label> 
                      </div>
                      </div>
                    <hr><h3><b>Booking Info<b></h3><hr>                 
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label>Booking Date  : <span class="font-normal">
                        <?php echo date('d-m-Y',strtotime($vendor_booking['booking_date'])); ?>  </span></label> 
                      
                      </div>
                      <div class="form-group col-md-3">
                        <label>Slots : <span class="font-normal">
                        <?php  echo $vendor_booking['slots']; ?> </span></label> 
                        
                      </div>     
                      <div class="form-group col-md-3">
                        <label>No. of Persons  : <span class="font-normal">
                        <?php  echo $vendor_booking['no_of_persons']; ?> </span></label> 
                      
                      </div>   
                      <div class="form-group col-md-3">
                        <label>Booking Status  : <span class="font-normal">
                        <?php  echo $vendor_booking['status_name']; ?></span></label> 
                                        
                      </div>                       
                    </div>  
                 
                  <hr><h3><b>Payment Info<b></h3><hr>
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Payment Date : <span class="font-normal">
                      <?php echo date('d-m-Y',strtotime($vendor_booking['created_at'])); ?></span></label> 
                    </div>  
                    <div class="form-group col-md-3">
                      <label>Paid Amount : <span class="font-normal">
                      <?php echo $vendor_booking['paid_amount']; ?> €</span></label> 
                    </div>    
                    <div class="form-group col-md-6">
                      <label>Transaction ID :<span class="font-normal">
                      <?php echo $vendor_booking['txn_id']; ?></span></label> 
                    </div>     
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Payment Status :<span class="font-normal">
                      <?php echo ucwords($vendor_booking['payment_status']); ?></span></label> 
                    </div>
                  </div>
                    
                  <hr><h3><b>User Info<b></h3><hr>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>User Name : <span class="font-normal">
                      <?php echo ucwords($vendor_booking['user_name']); ?></span></label> 
                    </div>
                    <div class="form-group col-md-6">
                      <label>User Email : <span class="font-normal">
                      <?php echo $vendor_booking['user_email']; ?></span></label> 
                    </div>
                  </div>               
                </div>
              </form>             
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>