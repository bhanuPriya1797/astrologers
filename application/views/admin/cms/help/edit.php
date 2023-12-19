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
                <h3 class="card-title">Edit Help Topic</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                      <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Topic</label>
                      <input type="hidden" name="id" value="<?php echo $help_topic[0]->id ?>">
                      <input type="text"  name="topic" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $help_topic[0]->topic ;?>">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="1" <?php echo $help_topic[0]->status == 1 ? "selected": "";?>>Active</option>
                        <option value="0" <?php echo $help_topic[0]->status == 0 ? "selected": "";?>>Inactive</option>
                      </select>
                   </div>
                    
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Answer</label>
                      <textarea id="editor" name="answer"><?php echo $help_topic[0]->answer ;?></textarea>

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
      
      

    </script>