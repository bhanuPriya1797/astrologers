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
                <h3 class="card-title">Edit Testimonial</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(!empty($this->session->flashdata('success'))){
                    echo $this->session->flashdata('success');
                }
                if(!empty($this->session->flashdata('error'))){
                    echo $this->session->flashdata('error');
                } ?>
              <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $jobPostDetails['id'] ?>">

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter Title" value="<?php echo $jobPostDetails['title'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">heading</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="heading" placeholder="Enter Heading" value="<?php echo $jobPostDetails['heading'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Subheading</label>
                    <input type="text" class="form-control" id="posted_by" placeholder="Enter Subheading" value="<?php echo $jobPostDetails['subheading'];?>" name="subheading">
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea id="editor" name="description"><?php echo $jobPostDetails['description'] ;?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="image" class="col-md-2 control-label">Testimonial Image</label>
                    <div class="col-md-12">
                      <img width="100px" src="<?php echo base_url('uploads/testimonial/')?><?= $jobPostDetails['image']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="username" class="col-md-2 control-label">Testimonial Image</label>
                    <div class="col-md-12">
                      <input type="file" class="form-control" name="file">
                    </div>
                  </div>	

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="1" <?php echo $jobPostDetails['status'] == 1 ? "selected": "";?>>Active</option>
                      <option value="2" <?php echo $jobPostDetails['status'] == 2 ? "selected": "";?>>Deactive</option>
                    </select>
                  </div>
                 
                </div>
                <!-- /.card-body -->

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

    <script>
      CKEDITOR.replace('editor', {

        uiColor: '#CCEAEE',

      });
    </script>