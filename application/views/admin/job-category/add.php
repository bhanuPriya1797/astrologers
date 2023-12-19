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
                <h3 class="card-title">Add Job Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="job_title" placeholder="Enter Job Title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Job Category<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="job_category" placeholder="Enter Job Category">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Posted By<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="posted_by" placeholder="Enter Posted By" name="added_by">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Total Jobs<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="posted_by" placeholder="Enter Posted By" name="total_jobs">
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description<span style="color:red;">*</span></label>
                      <textarea id="editor" name="job_description"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username" class="col-md-2 control-label">Category Image<span style="color:red;">*</span></label>
                    <div class="col-md-12">
                      <input type="file" class="form-control" name="file">
                    </div>
                  </div>  

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="2">Deactive</option>
                    </select>
                  </div>
                 
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

    <script>
      CKEDITOR.replace('editor', {

        uiColor: '#CCEAEE',

      });
    </script>