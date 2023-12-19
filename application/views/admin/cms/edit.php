<style>
.select2-results__option[aria-selected] {
    color: #000;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php ?>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/cms');?>">Back</a></li>
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
          <?php
          if($page[0]->cms_id == 1){ ?>
                  <div class="card-header">
                <a href="offer_list/<?php echo $page[0]->cms_id ?>">
                  <button class="btn btn-default" style="margin-right: 10px;">All Offer</button>
                </a>
                <a href="edit_banner/<?php echo $page[0]->cms_id ?>">
                  <button class="btn btn-success" style="">Edit Banner</button>
                </a>
                <a href="edit_dive_training/<?php echo $page[0]->cms_id ?>">
                  <button class="btn btn-success" style="">Dive Training</button>
                </a>
            </div>
         <?php } ?>

         <?php
          if($page[0]->cms_id == 4){ ?>
                  <div class="card-header">
                <a href="help_topic/<?php echo $page[0]->cms_id ?>">
                  <button class="btn btn-success" style="margin-right: 10px;">Help Topic</button>
                </a>
                
            </div>
         <?php } ?>

         <?php
          if($page[0]->cms_id == 8){ ?>
                  <div class="card-header">
                <a href="section_1/<?php echo $page[0]->cms_id ?>">
                  <button class="btn btn-default" style="margin-right: 10px;">Section 1</button>
                </a>
                <a href="section_2/<?php echo $page[0]->cms_id ?>">
                  <button class="btn btn-success" style="">Section 2</button>
                </a>
                <a href="section_3/<?php echo $page[0]->cms_id ?>">
                  <button class="btn btn-success" style="">Section 3</button>
                </a>
                <a href="section_4/<?php echo $page[0]->cms_id ?>">
                  <button class="btn btn-success" style="">Section 4</button>
                </a>
                <a href="section_5/<?php echo $page[0]->cms_id ?>">
                  <button class="btn btn-success" style="">Section 5</button>
                </a>
            </div>
         <?php } ?>
            
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit <?php echo strtolower($page[0]->PageTitle) ;?> Page</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="page_id" value="<?php echo $page[0]->cms_id ?>">
                <div class="card-body">
                  <div class="row">
                      <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Page Name</label>
                      <input type="text"  name="page" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" value="<?php echo $page[0]->page ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Page Title</label>
                      <input type="text"  name="pagetitle" class="form-control" id="exampleInputEmail1" placeholder="PageTitle" value="<?php echo $page[0]->PageTitle ;?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Meta Title</label>
                      <input type="text"  name="meta_title" class="form-control" id="exampleInputEmail1" placeholder="Meta Title" value="<?php echo $page[0]->meta_title ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Meta Keyword</label>
                      <input type="text"  name="meta_keywords" class="form-control" id="exampleInputEmail1" placeholder="Meta Keyword" value="<?php echo $page[0]->meta_keywords  ;?>">
                    </div>
                   </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Meta Description</label>
                      <input type="text"  name="meta_description" class="form-control" id="exampleInputEmail1" placeholder="Enter Meta Description" value="<?php echo $page[0]->meta_description  ;?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Page Description</label>
                      <textarea id="editor" name="page_description"><?php echo $page[0]->page_description ;?></textarea>
                    </div>
                   </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="1" <?php echo $page[0]->status == 1 ? "selected": "";?>>Active</option>
                        <option value="0" <?php echo $page[0]->status == 0 ? "selected": "";?>>Inactive</option>
                      </select>
                   </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputFile">Page Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this);" name="file">
                      </div>

                    </div>
                    <div style="margin-top: 10px;"><img id="blah" style="height:90px;width: 90px;" src="<?php echo !empty($page[0]->header_image) ?base_url('assets/admin/cms/'.$page[0]->header_image): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
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
    <script src="<?= base_url(); ?>assets/select2/js/select2.full.min.js"></script>
    <script type="text/javascript">

      CKEDITOR.replace('editor', {

        uiColor: '#CCEAEE',

      });

      $('.select-category').select2({
        allowClear: true,
        dropdownParent: $("#modal-default-cliente")
      });
      
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