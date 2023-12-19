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
                <h3 class="card-title">Edit Subadmin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form method="post" action="<?php echo base_url('admin/blog/edit_blog')?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $blogPostDetails['id'] ?>">

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter Title" value="<?php echo $blogPostDetails['title'];?>">
                  </div>
                  <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-control">
                      <option value="">Select Category</option>
                      <?php foreach($categoryList as $key => $catvalue) { ?> 
                        <option value="<?php echo $catvalue->id; ?>" <?php if($catvalue->id == $blogPostDetails['category_id']){ echo "selected"; }?>><?php echo $catvalue->blog_category; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Posting Date</label>
                    <input type="text" class="form-control" id="posting_date" value="<?php echo $blogPostDetails['posting_date'];?>" name="posting_date">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Posted By</label>
                    <input type="text" class="form-control" id="posted_by" placeholder="Enter Posted By" value="<?php echo $blogPostDetails['posted_by'];?>" name="posted_by">
                  </div>
                  <div class="form-group">
                    <label for="price" class="col-md-2 control-label">Posting</label>
                    <div class="col-md-12">            
                          <textarea type="text" name="posting" id="posting" class="form-control" rows="10" col="10"  ><?php echo $blogPostDetails['posting']; ?></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea id="editor" name="posting_1"><?php echo $blogPostDetails['posting_1'] ;?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="image" class="col-md-2 control-label">Blog Image</label>
                    <div class="col-md-12">
                      <img width="100px" src="<?php echo base_url('uploads/blog/')?><?= $blogPostDetails['blog_image']; ?>">
                    </div>
                  </div>





                  <div class="form-group">
                    <label for="username" class="col-md-2 control-label">Blog Image</label>
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
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="Active" <?php echo $blogPostDetails['status'] == 'Active' ? "selected": "";?>>Active</option>
                      <option value="Deactive" <?php echo $blogPostDetails['status'] == 'Deactive' ? "selected": "";?>>Deactive</option>
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