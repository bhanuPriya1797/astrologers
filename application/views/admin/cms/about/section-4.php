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
                <h3 class="card-title">Edit Section 4</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Heading</label>
                      <input type="text"  name="section4_heading" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section4_heading ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Sub Heading</label>
                      <input type="text"  name="section4_subheading" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section4_subheading ;?>">
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea id="editor" name="section4_description"><?php echo $page[0]->section4_description ;?></textarea>
                    </div>
                   </div>

                  <div class="row">
                    
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Youtube Video Link</label>
                      <input type="text"  name="section4_youtubelink" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $page[0]->section4_youtubelink ;?>">
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