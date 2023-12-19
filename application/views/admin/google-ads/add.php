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
                <h3 class="card-title">Add Google Ads</h3>
              </div>
              <form action="<?php echo base_url('admin/google-ads/add'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Section Google Ads </label>
                      <select name="google_ads" class="form-control">
                        <option value="">Select Google Ads Section</option>
                        <option value="1">Home Google Ads Section 1</option>
                        <option value="2">Home Google Ads Section 2</option>
                        <option value="3">Home Google Ads Section 3</option>
                        <option value="4">Home Google Ads Section 4</option>
                        <option value="5">Home Google Ads Section 5</option>
                        <option value="6">Home Google Ads Section 6</option>
                        <option value="7">Home Google Ads Section 7</option>
                        <option value="8">Home Google Ads Section 8</option>
                        <option value="9">Home Google Ads Section 9</option>
                        <option value="10">Home Google Ads Section 10</option>
                        <option value="11">Home Google Ads Section 11</option>
                        <option value="12">Home Google Ads Section 12</option>
                        <option value="13">Home Google Ads Section 13</option>

                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Google Ads Iframe</label>
                      <!-- <input type="text" class="form-control" id="google_ads_link" name="google_ads_link" placeholder="Google Ads Link"> -->
                      <textarea name="google_ads_link" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Status</label>
                      <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
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
