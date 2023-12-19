<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/astrologers');?>">Back</a></li>
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
                <h3 class="card-title">Add Astrologers</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name">Name<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="mobile_no">Mobile No</label>
                      <input type="text"  name="mobile_no" class="form-control" id="mobile_no">
                    </div>
                  </div>
                  <hr>
                  <label> Skills Info: </label>
                  <div class="row">
                  <div class="form-group col-md-6">
                      <label for="all_skills">All Skills<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="all_skills" name="all_skills">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Email<span style="color:red;">*</span></label>
                      <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="languageknown">Language Known<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="languageknown" name="language_known">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="location">Location<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="location" name="location">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="experienceyears">Experience In Years<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="experience_years" name="experience_years">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="gender">Gender<span style="color:red;">*</span></label>
                      <select class="form-control" name="gender" id="gender">
                        <option value="" disabled>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="male">Female</option>

                      </select>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="form-group col-md-6">
                      <label for="aboutlekhajokhha">Where did you hear about Lekha Jokhha ?<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="about_lekhajokhha" name="about_lekhajokhha">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="onlineplatform">Are You Working on Any Other Online Platform ?<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="online_platform" name="online_platform">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="aboutme">About Me<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="about_me" name="about_me">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="refer_by">Refer By</label>
                      <input type="text" class="form-control" id="refer_by" name="refer_by">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="form-group">
                      <label for="exampleInputFile">Profile Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="profile_image">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Adhaar Card No.</label>
                      <input type="text" class="form-control" id="adhaar_card_no" name="adhaar_card_no">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Adhaar Card Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="adhaar_card_image">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Pan Card No.</label>
                      <input type="text" class="form-control" id="pan_card_no" name="pan_card_no">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Pan Card Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="pan_card_image">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Complete Address</label>
                      <input type="text" class="form-control" id="complete_address" name="complete_address">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Instagram Or Social Media Link</label>
                      <input type="text" class="form-control" id="social_link" name="social_link">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Screenshots of profile on other protals</label>
                      <input type="text" class="form-control" id="screenshot_portals" name="screenshot_portals">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Expertise Certificates/Degree</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="expertise_certificate">
                        </div>
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