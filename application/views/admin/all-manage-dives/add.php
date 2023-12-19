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
              <li class="breadcrumb-item"><a href="<?php echo base_url('vendor/dashboard');?>">Back</a></li>
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
                <h3 class="card-title">Add Service</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">                  
                  <div class="row">
                    <!-- <div class="form-group col-md-6" id="modal-default-cliente">
                    <label for="exampleInputEmail1">Select Service Location<span style="color:red;">*</span></label>
                    <select class="form-control" name="location_id"  data-placeholder="Select Dives/Service Location" style="width: 100%;">
                      <option selected="true" value="" disabled="disabled">Select Location</option>
                        <?php foreach ($dives_location as $value) { 
                        if($value->city == ""){
                          $city ="";
                        }else{
                          $city = ",".$value->city;
                        } ?>
                  
                      <option value= "<?php echo $value->id; ?>"><?php echo $value->address.$city; ?></option>
                        <?php } ?>
                    </select>
                    </div> -->
                    <div class="form-group col-md-6">
                      <label>Service Name<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Service Name" name="dives_name">
                    </div>                  
                  </div>
                  <!-- <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description<span style="color:red;">*</span></label>
                      <textarea id="editor" name="description"></textarea>
                    </div>
                  </div> -->
                  <!-- <div class="row">
                    <div class="form-group col-md-12">
                      <label>Video Link<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Video Link" name="youtube_link">
                    </div>     
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Price(per person in €)<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price Per Person"  name="price_per_person">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Group Size<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Size" name="group_size">
                    </div>
                  </div>
                  <div class="form-group fieldGroup">
                    <div class="row">
                    
                      <div class="form-group col-md-4" id="modal-default-cliente">
                        <label for="exampleInputEmail1">Select Product<span style="color:red;">*</span></label>
                        <select class="select-product form-control"  name="product_id[]"  data-placeholder="Select Product" style="width: 100%;">
                          <option selected="true" value="" disabled="disabled">Select Product</option>
                            <?php foreach ($productList as $value) {  ?>
                              <option value= "<?php echo $value->id; ?>"><?php echo $value->product_name; ?></option>
                            <?php } ?>
                        </select>
                      </div>                    
                      <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Rental Price<span style="color:red;">*</span></label>
                        <input type="text"  name="rental_price[]"  class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
                      </div>
                      <div class="form-group col-md-2">
                        <label>Stock</label>
                        <select class="form-control" name="stock[]">
                          <option selected="true"  value="" disabled="disabled">Select Stock</option>
                          <option value="1">In Stock</option>
                          <option value="0">Out of Stock</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="exampleInputEmail1"></label>
                        <input type="button"  class="form-control addMore" id="add_more" value = "Add More">
                      </div>
                    </div>
                  </div>
                  <div class="form-group fieldGroupCopy"  style="display: none;">
                    <div class="row">
                      <div class="form-group col-md-4" id="modal-default-cliente">
                        <label for="exampleInputEmail1">Select Product</label>
                        <select class="select-product form-control"  name="product_id[]" data-placeholder="Select Product" style="width: 100%;">
                          <option selected="true" value="" disabled="disabled">Select Product</option>
                          <?php foreach ($productList as $value) {  ?>
                            <option value= "<?php echo $value->id; ?>"><?php echo $value->product_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>                    
                      <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Rental Price</label>
                        <input type="text"  name="rental_price[]"  class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
                      </div>
                      <div class="form-group col-md-2">
                        <label>Stock</label>
                        <select class="form-control" name="stock[]">
                          <option selected="true"  value="" disabled="disabled">Select Stock</option>
                          <option value="1">In Stock</option>
                          <option value="0">Out of Stock</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                      </div>
                    </div>
                  </div> -->
                  
                  <div class="row">                      
                      <div class="form-group col-md-4">
                        <label for="exampleInputFile">Service Image<span style="color:red;">*</span></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" onchange="readURL(this);" name="main_image">
                          </div>
                        </div>
                        <div style="margin-top: 10px;"></div>
                      </div>
                      <!-- <div class="form-group col-md-4">
                      <label>Activity Type</label>
                        <select class="form-control" name="activity_type">
                          <option value="">Select Activity Type<span style="color:red;">*</span></option>
                          <?php // foreach ($activity_type as $key => $activityValue) { ?>

                            <option value="<?php // echo $activityValue->id ?>"><?php // echo $activityValue->activity; ?></option>

                          <?php // } ?>
                        </select>
                      </div> -->
                      <div class="form-group col-md-4">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                    </div>
                  

                  <!-- <div class="row">
                      <div class="form-group col-md-3">
                        <label>Dive Type<span style="color:red;">*</span></label>
                        <select class="form-control" name="dive">
                        <option value="">Select Dive Type<span style="color:red;">*</span></option>
                            <?php // foreach ($dives_type as $key => $value) { ?>

                            <option value="<?php // echo $value->id ?>"><?php // echo $value->name; ?></option>

                          <?php // } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                      <label>Certification Type<span style="color:red;">*</span></label>
                        <select class="form-control" name="certification">
                          <option value="">Select Certification<span style="color:red;">*</span></option>
                          <?php // foreach ($certification_list as $key => $value) { ?>

                            <option value="<?php // echo $value->id ?>"><?php //echo $value->name; ?></option>

                          <?php // } ?>
                           
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Level<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Level" name="level">
                      </div>
                    <div class="form-group col-md-3">
                      <label>Depth<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Depth" name="depth">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label>Temp<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Temp" name="temp">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Visibility<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Visibility" name="visibility">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Currents<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Currents" name="currents">
                    </div>
                  </div> -->
                  
                  

                  <!-- <div class="row">
                    <div class="form-group col-md-6">
                      <label>Checklist<span style="color: red;">*</span></label>
                      <div class="check-list-decoration">
                          <input type="checkbox" name="featured" class="flat-red" value="1">
                          <label>Featured</label>
                      </div>
                      <div class="check-list-decoration">
                          <input type="checkbox" name="special" class="flat-red" value="1">
                          <label>Special</label>
                      </div>
                      <div class="check-list-decoration">
                          <input type="checkbox" name="best_seller" class="flat-red" value="1">
                          <label>Best Seller</label>
                      </div>
                      <div class="check-list-decoration">
                          <input type="checkbox" name="new_in" class="flat-red" value="1">
                          <label>New Dives</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                    <label for="exampleInputFile">Dive Slider Images</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this);" name="slider[]" id="files" multiple>
                      </div>

                    </div>
                    </div>
                   
                  </div> -->
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
      $(document).ready(function() {
        $('.select-location').select2();
        if (window.File && window.FileList && window.FileReader) {
          $("#files").on("change", function(e) {
            var files = e.target.files,
              filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
              var f = files[i]
              var fileReader = new FileReader();
              fileReader.onload = (function(e) {
                var file = e.target;
                $("<span class=\"pip\" style=\"position: relative; margin-right: 15px;\">" +
                  "<img style=' width: 100px; height: 85px; margin-left:5px; margin-right:5px; margin-bottom:2px; border:solid 2px; ' class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                  "<br/><br/><span class='remove btn btn-danger' style=' padding: 0; position: absolute; width: 25px; height: 25px; border-radius: 50%; top: -10px; right: -10px; line-height: 22px;'>X</span>" +
                  "</span>").insertAfter("#files");
                $(".remove").click(function(){
                  $(this).parent(".pip").remove();
                });
                
              });
              fileReader.readAsDataURL(f);
            }
          });
        } else {
          alert("Your browser doesn't support to File API")
        }
       });

      //  $(document).ready(function(){
      //     var maxGroup = 10;
      //     $(".addMore").click(function(){

      //         if($('body').find('.fieldGroup').length < maxGroup){
      //             var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
      //             $('body').find('.fieldGroup:last').after(fieldHTML);
      //         }else{
      //             alert('Maximum '+maxGroup+' groups are allowed.');
      //         }
      //     });
          
      //     $("body").on("click",".remove",function(){ 
      //         $(this).parents(".fieldGroup").remove();
      //     });
      // });

    </script>