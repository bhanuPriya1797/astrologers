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
                <h3 class="card-title">Edit Job Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="category">Category</label>
                    <select name="job_category_id" class="form-control">
                      <option value="">Select Category</option>
                      <?php foreach($categoryList as $key => $catvalue) { ?> 
                        <option value="<?php echo $catvalue['category_id']; ?>"><?php echo $catvalue['job_category']; ?></option>
                     <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Heading</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="heading" placeholder="Enter Heading">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Heading</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="subheading" placeholder="Enter Sub Heading">
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Overview</label>
                      <textarea id="editor" name="overview"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Requirements</label>
                      <textarea id="editor1" name="requirements"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Skill & Experience</label>
                      <textarea id="editor2" name="skill_experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username" class="col-md-2 control-label">Job Image</label>
                    <div class="col-md-12">
                      <input type="file" class="form-control" name="file">
                    </div>
                  </div>  

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="2">In Active</option>
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
      CKEDITOR.replace('editor1', {

        uiColor: '#CCEAEE',

      });
      CKEDITOR.replace('editor2', {

        uiColor: '#CCEAEE',

      });
    </script>