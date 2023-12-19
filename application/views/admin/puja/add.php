<style>
  .select2-results__option[aria-selected] {
    color: #000;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: 22px;
  }
</style>

<!-- jQuery library -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Back</a></li>
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
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Puja</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">                  
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Puja Name<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Puja Name" name="puja_name">
                  </div>  
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Price(In Rs.)</label>
                    <input type="text"  name="price"  class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
                  </div>                     
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Description<span style="color:red;">*</span></label>
                    <textarea id="editor" name="description"></textarea>
                  </div>
                </div>            
                <div class="row">                      
                  <div class="form-group col-md-">
                    <label for="exampleInputFile">Puja Image<span style="color:red;">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this);" name="main_image">
                      </div>
                    </div>
                    <div style="margin-top: 10px;"></div>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
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
<script type="text/javascript">
    CKEDITOR.replace('editor', {

    uiColor: '#CCEAEE',

  });
</script>