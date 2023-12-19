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
                <h3 class="card-title">Edit Astrologers</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $user[0]->id ?>">

                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Name<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $user[0]->name;?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="mobile_no">Mobile No</label>
                    <input type="text"  name="mobile_no" class="form-control" id="mobile_no" value="<?php echo $user[0]->mobile_no;?>">
                  </div>
                </div>
                <hr>
                <label> Skill Info :</label>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="all_skills">All Skills<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="all_skills" value="<?php echo $user[0]->all_skills;?>" name="all_skills">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="email">Email<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="email" value="<?php echo $user[0]->email;?>" name="email">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="language_known">Language Known<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="language_known" value="<?php echo $user[0]->language_known;?>" name="language_known">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="location">Location</label>
                      <input type="text" class="form-control" id="location" value="<?php echo $user[0]->location;?>" name="location">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="experience">Experience In Years<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="experience" value="<?php echo $user[0]->experience;?>" name="experience_years">
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
                      <label for="aboutlekhajokhha">Where did you hear about Lekhha Jokha? <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="about_lekhajokhha" name="about_lekhajokhha" value="<?php echo $user[0]->about_lekhajokhha;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="online_platform">Are You Working on Any Other Online Platform ? <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="online_platform" name="online_platform" value="<?php echo $user[0]->online_platform;?>">
                    </div>
                   
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="aboutme">About Me<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="aboutme" name="about_me" value="<?php echo $user[0]->about_me;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="referby">Refer By<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="referby" name="refer_by" value="<?php echo $user[0]->refer_by;?>">
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="exampleInputFile">Profile Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this);" name="file">
                      </div>
                    </div>
                    <div style="margin-top: 10px;"><img style="height: 128px;width: 146px;" id="blah" src="<?php echo !empty($user[0]->profile_image) ?base_url('assets/uploads/astrologers_registration/'.$user[0]->profile_image): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Adhaar Card No.</label>
                      <input type="text" class="form-control" id="adhaar_card_no" name="adhaar_card_no" value="<?php echo $user[0]->adhaar_card_no;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Adhaar Card Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="adhaar_card_image">
                        </div>
                      </div>
                      <div style="margin-top: 10px;"><img style="height: 128px;width: 146px;" id="blah" src="<?php echo !empty($user[0]->adhaar_card_image) ?base_url('assets/uploads/astrologers_registration/'.$user[0]->adhaar_card_image): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Pan Card No.</label>
                      <input type="text" class="form-control" id="pan_card_no" name="pan_card_no" value="<?php echo $user[0]->pan_card_no;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Pan Card Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="pan_card_image" value="<?php echo $user[0]->pan_card_image;?>">
                        </div>
                      </div>
                      <div style="margin-top: 10px;"><img style="height: 128px;width: 146px;" id="blah" src="<?php echo !empty($user[0]->pan_card_image) ?base_url('assets/uploads/astrologers_registration/'.$user[0]->pan_card_image): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>   
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Complete Address</label>
                      <input type="text" class="form-control" id="complete_address" name="complete_address" value="<?php echo $user[0]->complete_address;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Instagram Or Social Media Link</label>
                      <input type="text" class="form-control" id="social_link" name="social_link" value="<?php echo $user[0]->social_link;?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Screenshots of profile on other protals</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="screenshot_portals">
                        </div>
                      </div>              
                      <div style="margin-top: 10px;"><img style="height: 128px;width: 146px;" id="blah" src="<?php echo !empty($user[0]->screenshot_portals) ?base_url('assets/uploads/astrologers_registration/'.$user[0]->screenshot_portals): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>       
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputFile">Expertise Certificates/Degree</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="expertise_certificate">
                        </div>
                      </div>    
                      <div style="margin-top: 10px;"><img style="height: 128px;width: 146px;" id="blah" src="<?php echo !empty($user[0]->expertise_certificate) ?base_url('assets/uploads/astrologers_registration/'.$user[0]->expertise_certificate): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>                   
                    </div>
                  </div>  
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="1" <?php echo $user[0]->status == 1 ? "selected": "";?>>Active</option>
                        <option value="2" <?php echo $user[0]->status == 0 ? "selected": "";?>>Inactive</option>
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