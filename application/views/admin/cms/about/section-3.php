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
                <h3 class="card-title">Edit Section 3</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Title 1</label>
                      <input type="text"  name="section3_heading1" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section3_heading1 ;?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description 1</label>
                      <textarea id="editor" name="section3_description1"><?php echo $page[0]->section3_description1 ;?></textarea>
                    </div>
                   </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Title 2</label>
                      <input type="text"  name="section3_heading2" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section3_heading2 ;?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description 2</label>
                      <textarea id="editor1" name="section3_description2"><?php echo $page[0]->section3_description2 ;?></textarea>
                    </div>
                   </div>

                  <div class="row">
                    
                    <div class="form-group col-md-12">
                    <label for="exampleInputFile">Image 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this);" name="file">
                      </div>

                    </div>
                    <div style="margin-top: 10px;"><img id="blah" style="height:90px;width: 90px;" src="<?php echo !empty($page[0]->section3_image1) ?base_url('uploads/about/'.$page[0]->section3_image1): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
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

      CKEDITOR.replace('editor', {

        uiColor: '#CCEAEE',

      });

      CKEDITOR.replace('editor1', {

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