<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/vendors');?>" class="btn btn-primary">Back</a></li>
            </ol>
          </div>      
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/vendor-booking/');?><?php echo $vendor_id; ?>" class="btn btn-primary">View Booking</a></li>
            </ol>
          </div>              
        </div>
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php  echo $totalBooking; ?> </h3>
                <p>Total Bookings</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('admin/manage-booking');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php  echo $totalAmount; ?> € </h3>

                <p>Total Buisness Amount</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('admin/manage-booking');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0<?php //echo $customers;?></h3>
                <p>Commissions</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('admin/payment-distribution');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <h3 class="card-title">Edit Vendor/Dive Center</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $user[0]->id ?>">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">First Name<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="first_name" placeholder="Enter first name" value="<?php echo $user[0]->first_name;?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Last Name<span style="color:red;">*</span></label>
                    <input type="text"  name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter last name" value="<?php echo $user[0]->last_name;?>">
                  </div>
                </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Email<span style="color:red;">*</span></label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="<?php echo $user[0]->email;?>">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Mobile<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter mobile" name="mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="8" maxlength="16" value="<?php echo $user[0]->mobile;?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description<span style="color:red;">*</span></label>
                      <textarea class="form-control" name="description"><?php echo $user[0]->description;?></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Password<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Zipcode<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter zipcode" name="zip_code" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="4" maxlength="6" value="<?php echo $user[0]->zip_code;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Gender</label>
                      <select class="form-control" name="gender">
                        <option value="1" <?php echo $user[0]->gender == 1 ? "selected": "";?>>Male</option>
                        <option value="2" <?php echo $user[0]->gender == 2 ? "selected": "";?>>Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label> What type of activities do you offer?</label>
                      <select class="form-control" placeholder="Name" name="activity_type" id="activity_type">
                        <option selected="selected">Select Activity</option>
                        <?php
                          foreach ($activity_type as $key => $value) { ?>
                            <option value="<?php echo $value->id;?>" <?php if($value->id == $user[0]->activity_type){ echo "selected"; }?>><?php echo $value->activity;?></option>
                        <?php } ?>
                     </select>
                    </div>
                  
                    <div class="form-group col-6 search-cities">
                       <label> Where do your activities take place?</label>
                       <input class="form-control" placeholder="Search cities or areas" name="activity_area" id="map-search" value="<?php echo $user[0]->activity_area;?>">
                    </div>
                  </div>
                  <?php 
                  if(!empty($user[0]->social_media)){ 
                    $explode_social_media = explode(",",$user[0]->social_media);
                  }else{
                    $explode_social_media =  [];
                  }  ?>
                  <?php 
                  $sp=1; 
                  $sp_count =count(@$explode_social_media);
                  if($sp_count > 0) {
                    foreach($explode_social_media as $vsocial){
                      if($vsocial == ""){
                        continue;
                      } ?> 
                    <div class="row addsocialmedia">
                      <div class="form-group col-12" id="customFields">
                          <label> Add your website and social media </label>
                            <?php $j=0;?>
                          <input class="form-control" placeholder="https//:www.example.com" name="social_media[]" 
                          value="<?php echo $vsocial; ?>">
                      </div>
                    </div>
                  <?php } 
                  }else{ ?>
                      <div class="row addsocialmedia">
                      <div class="form-group col-12" id="customFields">
                          <label> Add your website and social media </label>
                            <?php $j=0;?>
                          <input class="form-control" placeholder="https//:www.example.com" name="social_media[]">
                      </div>
                    </div>
                 <?php }  ?> 
                  
                  <a href="javascript:void(0);" class="add-more addCF" id="addsocialmedia"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Add more</a>
                  <div class="row" id="custom-director">
                        <div class="form-group col-6">
                           <label>Legal Status</label>
                           <p><input type="checkbox" <?php echo $user[0]->legal_status == "on" ? "checked": "";?> class="mr-2" name="legal_status" id="legal_status" /> Registered Company</p>
                        </div>
                        <div class="form-group col-6">
                           <label> Company name</label>
                           <input class="form-control" placeholder="Company name" name="company_name" id="company_name" value="<?php echo $user[0]->company_name;?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-subtitle col-12 mb-4 mt-4">
                           <h5>Managing Director(s) </h5>
                        </div>
                      </div>
                        <?php $i=0;?>
                        <?php 
                        $queryss =$this->db->get_where('tbl_managing_director', array("vendor_id"=>$user[0]->id));
                        $restss = $queryss->result_array(); ?>
                        <?php 
                        $sp=1; 
                        $sp_count =count(@$restss);
                        if($sp_count > 0) {
                          foreach($restss as $vsocial){ ?>
                        <div class="row">
                        <div class="form-group col-lg-5 col-12">
                           <label>First Name</label>
                           <input class="form-control" placeholder="first name" name="m_first_name[]" id="m_first_name" value="<?php echo $vsocial['first_name'];?>">
                           
                        </div>
                        <div class="form-group col-lg-5 col-12">
                           <label>Last Name</label>
                           <input class="form-control" placeholder="last name" name="m_last_name[]" id="m_last_name" value="<?php echo $vsocial['last_name'];?>">
                        </div>
                        <div class="form-group col-lg-2 col-12">
                            <a href="javascript:void(0);" style="color:red;" onclick="delete_management_name(<?php echo $vsocial['id']; ?>)"><u><i class="fa fa-plus-circle" aria-hidden="true"></i>Remove</u></a>
                        </div>
                        </div>
                        
                      <?php } }else{ ?>
                          <div class="row">
                            <div class="form-group col-lg-5 col-12">
                               <label>First Name</label>
                               <input class="form-control" placeholder="first name" name="m_first_name[]" id="m_first_name">
                               
                            </div>
                            <div class="form-group col-lg-5 col-12">
                               <label>Last Name</label>
                               <input class="form-control" placeholder="last name" name="m_last_name[]" id="m_last_name">
                            </div>
                          </div>
                      <?php } ?>
                        <a href="javascript:void(0);" class="add-more addMCF "><i class="fa fa-plus-circle" aria-hidden="true"></i>  Add More</a>
                        <div class="row addbeforeaddress">
                        <div class="form-group col-10">
                           <label>Company address</label>
                           <input class="form-control" placeholder="Company Address" name="address" id="address" value="<?php echo $user[0]->address;?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-lg-6 col-12">
                           <label>City</label>
                           <input class="form-control" placeholder="City" name="city" id="city" value="<?php echo $user[0]->city;?>">
                        </div>
                        <div class="form-group col-6">
                           <label>State / region (optional)</label>
                           <input class="form-control" placeholder="State" name="state" id="state" value="<?php echo $user[0]->state;?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-6">
                           <label>Country</label>
                           <select class="form-control" name="country" id="country">
                            <option>Select Country</option>
                              <?php
                                foreach ($countries as $key => $value) { ?>
                              <option value="<?php echo $value->geoId ;?>" <?php if($value->geoId == $user[0]->country){ echo "selected"; }?>><?php echo $value->geoName;?></option>
                              <?php 
                              } ?>

                           </select>
                        </div>
                        <div class="form-group col-6">
                           <label>Currency</label>
                           <select class="form-control" name="currency" id="currency">
                            <option>Select Currency</option>
                              <?php
                                foreach ($currency as $key => $value) { ?>
                              <option value="<?php echo $value->id ;?>" <?php if($value->id == $user[0]->currency){ echo "selected"; }?>><?php echo $value->code."(".$value->symbol.")";?></option>
                              <?php 
                              } ?>
                           </select>
                        </div>
                      </div>
                     </div>
                  <div class="row">
                  <div class="form-group col-6">
                    <label for="exampleInputFile">Profile Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this);" name="file">
                      </div>

                    </div>
                    <div style="margin-top: 10px;"><img style="height: 128px;width: 146px;" id="blah" src="<?php echo !empty($user[0]->profile_pic) ?base_url('assets/admin/image/'.$user[0]->profile_pic): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
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

    <script type="text/javascript">
      
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#blah').attr('src', e.target.result).width(146).height(128);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }

    </script>

    <script type="text/javascript">
  

  $(document).ready(function(){

    var k = <?php echo $j;?>;
    $(".addCF").click(function(){
      k=k+1;
      $('#addsocialmedia').before('<div class="row" style="margin-top:10px;"><div class="form-group col-11"><input class="form-control list_product" placeholder="https//:www.example.com" name="social_media[]"  id="social_media-'+k+'"></div><a href="javascript:void(0);" style="color:red;" class="add-more remCF"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Remove</a></div>');
    });

    $(".card-body").on('click','.remCF',function(){
      k=k-1;
      $(this).parent().remove();
    });

    var counter = <?php echo $i;?>;
    $(".addMCF").click(function(){
      counter = counter+1; 
      $('.addbeforeaddress').before('<div style="margin-top:15px;" class="row"><div class="form-group col-lg-5 col-12"><label>First Name</label><input class="form-control" placeholder="" name="m_first_name[]" id="m_first_name-'+counter+'"></div><div class="form-group col-lg-5 col-12"><label>Last Name</label><input class="form-control" placeholder="" name="m_last_name[]" id="m_last_name-'+counter+'"></div><a href="javascript:void(0);" style="color:red;" class="add-more remMCF"><i class="fa fa-plus-circle" aria-hidden="true"></i>Remove</a></div>');
    });

    $(".card-body").on('click','.remMCF',function(){
      counter = counter-1; 
      $(this).parent().remove();
    });
  })

  function delete_management_name(id){
    var r = confirm('Are you sure to delete');
    if(r){  
        $.post('<?php echo base_url();?>'+'/admin/vendors/delete_management_name', {'id':id}, function( data ) {
          location.reload();
        });
    }
  }
</script>