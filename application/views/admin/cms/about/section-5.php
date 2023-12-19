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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Section 5</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text"  name="section5_title" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section5_title ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Sub Title</label>
                      <input type="text"  name="section5_subtitle" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section5_subtitle ;?>">
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Heading 1</label>
                      <input type="text"  name="section5_heading1" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section5_heading1 ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Sub Heading 1</label>
                      <input type="text"  name="section5_subheading1" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section5_subheading1 ;?>">
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Heading 2</label>
                      <input type="text"  name="section5_heading2" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section5_heading2 ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Sub Heading 2</label>
                      <input type="text"  name="section5_subheading2" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section5_subheading2 ;?>">
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Heading 3</label>
                      <input type="text"  name="section5_heading3" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section5_heading3 ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Sub Heading 3</label>
                      <input type="text"  name="section5_subheading3" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section5_subheading3 ;?>">
                    </div>
                    
                  </div>

                  <div class="row">
                    
                    <div class="form-group col-md-6">
                    <label for="exampleInputFile">Image 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this);" name="file">
                      </div>

                    </div>
                    <div style="margin-top: 10px;"><img id="blah" style="height:90px;width: 90px;" src="<?php echo !empty($page[0]->section5_image) ?base_url('uploads/about/'.$page[0]->section5_image): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="exampleInputFile">Image 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURLs(this);" name="file1">
                      </div>

                    </div>
                    <div style="margin-top: 10px;"><img id="blahs" style="height:90px;width: 90px;" src="<?php echo !empty($page[0]->section5_image1) ?base_url('uploads/about/'.$page[0]->section5_image1): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
                  </div>

                  </div>

                  <div class="row">
                    
                    <div class="form-group col-md-6">
                    <label for="exampleInputFile">Image 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURLss(this);" name="file2">
                      </div>

                    </div>
                    <div style="margin-top: 10px;"><img id="blahss" style="height:90px;width: 90px;" src="<?php echo !empty($page[0]->section5_image2) ?base_url('uploads/about/'.$page[0]->section5_image2): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
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
    <script src="<?= base_url(); ?>assets/select2/js/select2.full.min.js"></script>
    <script type="text/javascript">

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

      function readURLs(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#blahs').attr('src', e.target.result).width(146).height(128);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }

      function readURLss(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#blahss').attr('src', e.target.result).width(146).height(128);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }

      

    </script>