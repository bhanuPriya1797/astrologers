<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
      <?php if(!empty($this->session->flashdata('error'))){
          echo $this->session->flashdata('error');
      } ?>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Subadmin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                        <label>Role Name</label>
                        <select class="form-control" name="role_id">
                          <?php
                          foreach ($roles as $key => $value) { ?>
                            <option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                            <?php 
                          } ?>
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="first_name" placeholder="Enter first name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name<span style="color:red;">*</span></label>
                    <input type="text"  name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter last name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address<span style="color:red;">*</span></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"  name="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter mobile" name="mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="8" maxlength="16">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password<span style="color:red;">*</span></label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter mobile" name="password" minlength="6">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->

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