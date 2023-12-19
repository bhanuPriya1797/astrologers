<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/google-ads');?>">Back</a></li>
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
                <h3 class="card-title">Edit Google Ads</h3>
              </div>
              <form action="<?php echo base_url('admin/google-ads/update_ads'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Section Google Ads </label>
                      <select name="google_ads" class="form-control">
                        <option value="">Select Google Ads Section</option>
                        <option value="1" <?php if($google_ads_data->google_ads == 1){ echo "selected"; }?>>Home Google Ads Section 1</option>
                        <option value="2" <?php if($google_ads_data->google_ads == 2){ echo "selected"; }?>>Home Google Ads Section 2</option>
                        <option value="3" <?php if($google_ads_data->google_ads == 3){ echo "selected"; }?>>Home Google Ads Section 3</option>
                        <option value="4" <?php if($google_ads_data->google_ads == 4){ echo "selected"; }?>>Home Google Ads Section 4</option>
                        <option value="5" <?php if($google_ads_data->google_ads == 5){ echo "selected"; }?>>Home Google Ads Section 5</option>
                        <option value="6" <?php if($google_ads_data->google_ads == 6){ echo "selected"; }?>>Home Google Ads Section 6</option>
                        <option value="7" <?php if($google_ads_data->google_ads == 7){ echo "selected"; }?>>Home Google Ads Section 7</option>
                        <option value="8" <?php if($google_ads_data->google_ads == 8){ echo "selected"; }?>>Home Google Ads Section 8</option>
                        <option value="9" <?php if($google_ads_data->google_ads == 9){ echo "selected"; }?>>Home Google Ads Section 9</option>
                        <option value="10" <?php if($google_ads_data->google_ads == 10){ echo "selected"; }?>>Home Google Ads Section 10</option>
                        <option value="11" <?php if($google_ads_data->google_ads == 11){ echo "selected"; }?>>Home Google Ads Section 11</option>
                        <option value="12" <?php if($google_ads_data->google_ads == 12){ echo "selected"; }?>>Home Google Ads Section 12</option>
                        <option value="13" <?php if($google_ads_data->google_ads == 13){ echo "selected"; }?>>Home Google Ads Section 13</option>

                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Google Ads Iframe</label>
                      <!-- <input type="text" class="form-control" id="google_ads_link" name="google_ads_link" placeholder="Google Ads Link" value = "<?php //echo $google_ads_data->google_ads_link; ?>" > -->
                      <textarea name="google_ads_link" class="form-control"><?php echo $google_ads_data->google_ads_link; ?></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <!-- <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Google Ads Link</label>
                      <input type="text" class="form-control" id="google_ads_link" name="google_ads_link" value = "<?php echo $google_ads_data->google_ads_link; ?>" placeholder="Google Ads Link" >
                    </div> -->
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Status</label>
                      <select class="form-control" name="status">
                        <option value="1" <?php if($google_ads_data->status == 1){ echo "selected"; }?>>Active</option>
                        <option value="0" <?php if($google_ads_data->status == 0){ echo "selected"; }?>>Deactive</option>
                      </select>
                    </div>
                    <input type="hidden" name="google_ads_id" value="<?php echo $google_ads_id; ?>">
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
