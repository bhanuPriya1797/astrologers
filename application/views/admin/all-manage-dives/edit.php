<style>
.select2-results__option[aria-selected] {
    color: #000;
}

.select2-container--default .select2-selection--single .select2-selection__rendered{
  line-height: 22px;
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
                <h3 class="card-title">Edit Service</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $center[0]->id;?>">
                <div class="card-body">
                  <div class="row">
                    <!-- <div class="form-group col-md-6" id="modal-default-cliente">
                    <label for="exampleInputEmail1">Select Service Location</label>
                    <select class="form-control" name="location_id"  data-placeholder="Select Location" style="width: 100%;">
                      <option selected="true" value="" disabled="disabled">Select Service Location</option>
                        <?php 
                        // $var_products = explode(',', $center[0]->location_id);
                        // foreach ($dives_location as $value) { 
                        //     $selected = (in_array($value->id,$var_products)?'selected':'');
                          ?>
                        
                      <option value= "<?php //echo $value->id; ?>" <?php //echo $selected;?>><?php //echo $value->address; ?></option>
                        <?php //} ?>
                    </select>
                    </div> -->
                    <div class="form-group col-md-6">
                      <label>Service Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Service Name" value="<?php echo $center[0]->service_name;?>"  name="dives_name">
                    </div>
                    
                  
                  </div>
                  <!-- <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea id="editor" name="description"><?php // echo $center[0]->description ;?></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label>Video Link</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Video Link" name="youtube_link" value="<?php // echo $center[0]->youtube_link ;?>">
                    </div>     
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Price(per person in €)</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price Per Person" value="<?php // echo $center[0]->price_per_person;?>" name="price_per_person">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Group Size</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Size" value="<?php // echo $center[0]->group_size;?>"  name="group_size">
                    </div>
                  </div> -->

                  <?php // echo "<pre>"; print_r($productList); ?>

                  <!-- <div class="form-group fieldGroup">                   
                    <div class="row">                    
                    <?php if(count($rental_product) > 0){ foreach ($rental_product as $key => $rentValPro) { ?>
                      <div class="form-group col-md-4" id="modal-default-cliente">
                        <label for="exampleInputEmail1">Select Product</label>
                        <select class="select-product form-control"  name="product_id[]"  data-placeholder="Select Product" style="width: 100%;">
                          <option selected="true" value="" disabled="disabled">Select Product</option>
                            <?php foreach ($productList as $value) {  ?>
                              <option value= "<?php echo $value->id; ?>" <?php if($rentValPro['product_id'] == $value->id){ echo "selected"; } ?>><?php echo $value->product_name; ?></option>
                            <?php } ?>
                        </select>
                      </div>                    
                      <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Rental Price</label>
                        <input type="text"  name="rental_price[]"  class="form-control" id="exampleInputEmail1" value="<?php echo $rentValPro['rental_price']; ?>">
                      </div>
                      <div class="form-group col-md-2">
                        <label>Stock</label>
                        <select class="form-control" name="stock[]">
                          <option selected="true"  value="" disabled="disabled">Select Stock</option>
                          <option value="1" <?php if($rentValPro['stock'] == 1){ echo "selected"; } ?>>In Stock</option>
                          <option value="0" <?php if($rentValPro['stock'] == 0){ echo "selected"; } ?>>Out of Stock</option>
                        </select>
                      </div>
                      <?php } }else{ ?>
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
                     <?php } ?>
                      <div class="form-group col-md-2">
                        <label for="exampleInputEmail1"></label>
                        <input type="button"  class="form-control addMore" id="add_more" value = "Add More">
                      </div>
                    </div>
                  </div> -->
                              <?php //echo "<pre>"; print_r($center); ?>
                  <!-- <div class="form-group fieldGroupCopy"  style="display: none;">
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
                      <label for="exampleInputFile">Service Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="main_image">
                        </div>
                      </div>
                      <div style="margin-top: 10px;"><img id="blah" style="height:90px;width: 90px;" src="<?php echo !empty($center[0]->service_image) ?base_url('assets/uploads/service_image/'.$center[0]->service_image): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
                    </div>
                    <!-- <div class="form-group col-md-4">
                      <label>Activity Type</label>
                        <select class="form-control" name="activity_type">
                          <option value="">Select Activity Type</option>
                          <?php // foreach ($activity_type as $key => $activityValue) { ?>

                            <option value="<?php // echo $activityValue->id ?>" <?php //if($center[0]->activity_type == $activityValue->id){ echo "selected"; } ?>><?php //echo $activityValue->activity; ?></option>

                          <?php //} ?>
                        </select>
                      </div> -->
                    <div class="form-group col-md-4">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="1" <?php echo $center[0]->status == 1 ? "selected": "";?>>Active</option>
                        <option value="0" <?php echo $center[0]->status == 0 ? "selected": "";?>>Inactive</option>
                      </select>
                    </div>
                  </div>             
                  <!-- <div class="row">
                    <div class="form-group col-md-3">
                      <label>Dive Type</label>
                      <select class="form-control" name="dive">
                          <option value="">Select Dive Type</option>
                          <?php //foreach ($dives_type as $key => $value) { ?>

                            <option value="<?php // echo $value->id ?>" <?php //if($center[0]->dive == $value->id){ echo "selected"; } ?>><?php // echo $value->name; ?></option>
                            

                          <?php // } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Certification Type</label>
                        <select class="form-control" name="certification">
                          <option value="">Select Certification</option>
                          <?php // foreach ($certification_list as $key => $value) { ?>

                            <option value="<?php // echo $value->id ?>" <?php // if($center[0]->certification == $value->id){ echo "selected"; } ?>><?php // echo $value->name; ?></option>

                          <?php // } ?>
                           
                        </select>
                      </div>
                    <div class="form-group col-md-3">
                      <label>Level</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Size" value="<?php // echo $center[0]->level;?>"  name="level">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Depth</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Size" value="<?php // echo $center[0]->depth;?>"  name="depth">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label>Temp</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price Per Person" value="<?php // echo $center[0]->temp;?>" name="temp">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Visibility</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Size" value="<?php // echo $center[0]->visibility;?>"  name="visibility">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Currents</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Size" value="<?php // echo $center[0]->currents;?>"  name="currents">
                    </div>
                  </div> -->
                  
                  
                  <!-- <div class="row">
                    <div class="form-group col-md-6">
                      <label>Checklist <span style="color: red;">*</span></label>
                      <div class="check-list-decoration">
                          <input type="checkbox" name="featured" class="flat-red" value="1" <?php  echo $center[0]->featured==1?"checked":"";?>>
                          <label>Featured</label>
                      </div>
                      <div class="check-list-decoration">
                          <input type="checkbox" name="special" class="flat-red" value="1" <?php  echo $center[0]->special==1?"checked":"";?>>
                          <label>Special</label>
                      </div>
                      <div class="check-list-decoration">
                          <input type="checkbox" name="best_seller" class="flat-red" value="1" <?php  echo $center[0]->best_seller==1?"checked":"";?>>
                          <label>Best Seller</label>
                      </div>
                      <div class="check-list-decoration">
                          <input type="checkbox" name="new_in" class="flat-red" value="1" <?php  echo $center[0]->new_in==1?"checked":"";?>>
                          <label>New Dives</label>
                      </div>
                    </div>
                  </div> -->
                  <!-- <input type="hidden" name="vendor_id" value="<?php //echo $center[0]->vendor_id; ?>"> -->
                  <!-- <div class="row">
                    <div class="form-group col-md-12">
                    <label for="exampleInputFile">Dive Slider Images</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this);" name="slider[]" id="files" multiple>
                      </div>

                    </div>
                    <br/>
                           <div class="field" align="left">
                     
                              <?php
                                //  $images =$this->Dives_model->getImageById($center[0]->id);
                                //    if(count($images) > 0){
                                    
                                //            foreach ($images as $key => $value) {
                                           ?>
                              <img id="img_<?php // echo $value->id; ?>" src="<?php // echo base_url('assets/uploads/dive_main_image/'.$value->image); ?>" width="100">
                              <a href="Javascript:void(0);" onclick="deleteProductImage(<?php // echo $value->id; ?>)" id="anchor_<?php // echo $value->id; ?>"  class="btn btn-danger pl-3 pr-3 pt-1 pb-1">X</a>
                              <?php 
                                //  }
                                //  }
                                 ?>
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

      function deleteProductImage(id){
           if (!confirm('Are you sure you want to delete this image?')) return false;
           $.ajax({
                     type: 'POST',
                     url: "<?=base_url("admin/all_dives/deleteImage/")?>" + id,
                     dataType: 'text',
                     success: function(data) {
                        
                       $("#img_" + id).remove();   
                       $("#anchor_" + id).remove();  
                       var res = '<div class="col-12 text-center text-success" style="margin-top:10px;">Image has been deleted successfully.</div>';
                          $("#deleteResponse").html(res); 

                     }
                 });
         }


      $(document).ready(function(){

        var maxGroup = 10;

        $(".addMore").click(function(){

          if($('body').find('.fieldGroup').length < maxGroup){
              var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
              $('body').find('.fieldGroup:last').after(fieldHTML);
          }else{
              alert('Maximum '+maxGroup+' groups are allowed.');
          }

        });
          
        $("body").on("click",".remove",function(){ 
            $(this).parents(".fieldGroup").remove();
        });

      });

    </script>