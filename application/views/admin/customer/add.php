<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/user');?>">Back</a></li>
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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Gender</label>
                    <select name="gender" class="form-control">
                      <option value="" disabled>Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Place of Birth<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Place of birth" name="place_of_birth">
                    </div>                 
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Date of Birth<span style="color:red;">*</span></label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter Date of Birth" name="date_of_birth">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Time of Birth<span style="color:red;">*</span></label>
                      <input type="time" class="form-control" id="exampleInputEmail1" placeholder="Enter Time Of Birth" name="time_of_birth">
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Marital Status<span style="color:red;">*</span></label>
                      <select name="marital_status" class="form-control">
                        <option value="" disabled>Select Marital Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Occupation<span style="color:red;">*</span></label>
                      <select name="occupation" class="form-control">
                        <option value="" disabled>Select Occupation</option>
                        <option value="student">Student</option>
                        <option value="buisness_person">Buisness Person</option>
                        <option value="employee">Employee</option>
                        <option value="retired">Retired</option>
                        <option value="housewife">Housewife</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
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