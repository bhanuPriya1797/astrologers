<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/vendors');?>">Back</a></li>
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
                <h3 class="card-title">Add Vendor/Dive Center</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">First Name<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="first_name" placeholder="Enter first name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Last Name<span style="color:red;">*</span></label>
                    <input type="text"  name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter last name">
                  </div>
                </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Email<span style="color:red;">*</span></label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Mobile<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter mobile" name="mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="8" maxlength="16">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description<span style="color:red;">*</span></label>
                      <textarea class="form-control" name="description"></textarea>
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
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter zipcode" name="zip_code" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="4" maxlength="6">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Gender</label>
                      <select class="form-control" name="gender">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
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
                        <option value="<?php echo $value->id;?>"><?php echo $value->activity;?></option>
                        <?php 
                        } ?>
                     </select>
                    </div>
                  
                    <div class="form-group col-6 search-cities">
                       <label> Where do your activities take place?</label>
                       <input class="form-control" placeholder="Search cities or areas" name="activity_area" id="map-search">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6" id="customFields">
                           <label> Add your website and social media </label>
                           <?php $j=0;?>
                           <input class="form-control" placeholder="https//:www.example.com" name="social_media[]" id="addsocialmedia" id="addsocialmedia">
                           <a href="javascript:void(0);" class="add-more addCF"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Add more</a>
                        </div>
                  </div>
                  <div class="row" id="custom-director">
                        <div class="form-group col-12 mb-4">
                           <label>Legal Status</label>
                           <p><input type="checkbox" class="mr-2" name="legal_status" id="legal_status" /> Registered Company</p>
                        </div>
                        <div class="form-group col-8">
                           <label> Company name</label>
                           <input class="form-control" placeholder="Company name" name="company_name" id="company_name">
                        </div>
                        <div class="form-group col-4"></div>
                        <div class="form-subtitle col-12 mb-4 mt-4">
                           <h5>Managing Director(s) </h5>
                        </div>
                        <?php $i=0;?>
                        <div class="form-group col-lg-3 col-12">
                           <label>First Name</label>
                           <input class="form-control" placeholder="" name="m_first_name[]" id="m_first_name">
                           <a href="javascript:void(0);" class="add-more addMCF"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Add managing director</a>
                        </div>
                        <div class="form-group col-lg-3 col-12">
                           <label>Last Name</label>
                           <input class="form-control" placeholder="Sirname" name="m_last_name[]" id="m_last_name">
                        </div>
                        <div class="form-group col-lg-6 col-12"></div>
                        <div class="form-group col-12 addbeforeaddress">
                           <label>Company address</label>
                           <input class="form-control" placeholder="Company Address" name="address" id="address">
                        </div>
                        <div class="form-group col-lg-6 col-12">
                           <label>City</label>
                           <input class="form-control" placeholder="City" name="city" id="city">
                        </div>
                        <div class="form-group col-6">
                           <label>State / region (optional)</label>
                           <input class="form-control" placeholder="State" name="state" id="state">
                        </div>
                        <div class="form-group col-6">
                           <label>Country</label>
                           <select class="form-control" name="country" id="country">
                            <option>Select Country</option>
                              <?php
                                foreach ($countries as $key => $value) { ?>
                              <option value="<?php echo $value->geoId ;?>"><?php echo $value->geoName;?></option>
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
                              <option value="<?php echo $value->id ;?>"><?php echo $value->code."(".$value->symbol.")";?></option>
                              <?php 
                              } ?>
                           </select>
                        </div>
                     </div>
                  <div class="row">
                  <div class="form-group">
                    <label for="exampleInputFile">Profile Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this);" name="file">
                      </div>

                    </div>
                    <div style="margin-top: 10px;"><img id="blah" src="<?php echo base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
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
      $('#addsocialmedia').after('<br><div><input class="form-control list_product" placeholder="https//:www.example.com" name="social_media[]"  id="social_media-'+k+'"></input><a href="javascript:void(0);" class="add-more remCF"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Remove</a></div>');
    });

    $("#customFields").on('click','.remCF',function(){
      k=k-1;
      $(this).parent().remove();
    });

    var counter = <?php echo $i;?>;
    $(".addMCF").click(function(){
      counter = counter+1; 
      $('.addbeforeaddress').before('<br><div class="row"><div class="form-group col-lg-6 col-12"><label>First Name</label><input class="form-control" placeholder="" name="m_first_name[]" id="m_first_name-'+counter+'"></input></div><div class="form-group col-lg-6 col-12"><label>Last Name</label><input class="form-control" placeholder="" name="m_last_name[]" id="m_last_name-'+counter+'"></input></div><a href="javascript:void(0);" class="add-more remMCF"><i class="fa fa-plus-circle" aria-hidden="true"></i>Remove</a></div>');
    });

    $("#custom-director").on('click','.remMCF',function(){
      counter = counter-1; 
      $(this).parent().remove();
    });


    

    
    
    
  })
</script>