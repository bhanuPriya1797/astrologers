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
                <h3 class="card-title">Add Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo base_url('admin/manage-blog/add')?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                  </div>
                  <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-control">
                      <option value="">Select Category</option>
                      <?php foreach($categoryList as $key => $catvalue) { ?> 
                        <option value="<?php echo $catvalue->id; ?>"><?php echo $catvalue->blog_category; ?></option>
                     <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="postingdate">Posting Date</label>
                    <input type="date" class="form-control" id="posting_date" name="posting_date">
                  </div>
                  <div class="form-group">
                    <label for="posted_by">Posted By</label>
                    <input type="text" class="form-control" id="posted_by" placeholder="Enter Posted By" name="posted_by">
                  </div>
                  <div class="form-group">
                    <label for="posting">Posting</label>
                    <textarea type="text" name="posting" id="posting" class="form-control" rows="10" col="10"  ></textarea>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea id="editor" name="posting_1"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username" class="col-md-2 control-label">Image</label>
                    <div class="col-md-12">
                      <input type="file" class="form-control" name="file">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputFile">Blog Inside Images</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="slider[]" id="files" multiple>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="title" class="col-md-2 control-label">Status</label>
                    <div class="col-md-12">
                      <div id="batch_data">
                        <select name="status" id="status" class="form-control">
                            <option value="Active">Active</option>
                            <option value="Deactive">Deactive</option>                    
                        </select>
                      </div>
                    </div>
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