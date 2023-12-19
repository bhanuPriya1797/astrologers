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
                <h3 class="card-title">Edit Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                      <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text"  name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" value="<?php echo $page[0]->title ;?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Subheading</label>
                      <input type="text"  name="subheading" class="form-control" id="exampleInputEmail1" placeholder="Subheading" value="<?php echo $page[0]->subheading ;?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Subheading 2</label>
                      <input type="text"  name="subheading_2" class="form-control" id="exampleInputEmail1" placeholder="Subheading 2" value="<?php echo $page[0]->subheading_2 ;?>">
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
                    <label for="exampleInputFile">Banner Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this);" name="file">
                      </div>

                    </div>
                    <div style="margin-top: 10px;"><img id="blah" style="height:90px;width: 90px;" src="<?php echo !empty($page[0]->banner_image) ?base_url('assets/admin/cms/banner/'.$page[0]->banner_image): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
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