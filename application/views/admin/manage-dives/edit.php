<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/manage-dives');?>">Back</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <?php if(!empty($this->session->flashdata('error'))){
          echo $this->session->flashdata('error');
      } ?>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Dive/Location</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $user[0]->id; ?>">

                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                        <label>Category Type<span style="color:red;">*</span></label>
                        <select class="form-control" name="category_id">
                          <?php
                          foreach ($dives_category as $key => $value) { ?>
                            <option value="<?php echo $value->id;?>" <?php echo $value->id == $user[0]->category_id ? "selected": "";?>><?php echo $value->name;?></option>
                            <?php 
                          } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Country<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="country" placeholder="Enter Country" value="<?php echo $user[0]->country;?>">
                      </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">State<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter State" value="<?php echo $user[0]->state;?>" name="state">
                      </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">City<span style="color:red;">*</span></label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter city name" value="<?php echo $user[0]->city;?>" name="city">
                        </div>
                      
                  </div>
                  <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Address<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="address" placeholder="Enter Address" value="<?php echo $user[0]->address;?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Full Address<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="full_address" placeholder="Enter Address" value="<?php echo $user[0]->full_address;?>">
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Latitude<span style="color:red;">*</span></label>
                        <input type="text"  name="latitude" class="form-control" id="exampleInputEmail1" placeholder="Enter Latitude" value="<?php echo $user[0]->latitude;?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Longitude<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Longitude" value="<?php echo $user[0]->longitude;?>" name="longitude">
                      </div>
                  </div>

                  
                  <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Zipcode<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Zipcode" value="<?php echo $user[0]->location_pincode;?>" name="location_pincode">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="1" <?php echo $user[0]->status == 1 ? "selected": "";?>>Active</option>
                          <option value="0" <?php echo $user[0]->status == 0 ? "selected": "";?>>Inactive</option>
                        </select>
                      </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Location Slug<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Slug" value="<?php echo $user[0]->location_slug;?>" name="location_slug">
                      </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea id="editor" name="description"><?php echo $user[0]->description ;?></textarea>
                    </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-3">
                        <label>Dive Type</label>
                        <select class="form-control" name="dive">
                            <?php  foreach ($dives_type as $key => $value) { ?>

                            <option value="<?php  echo $value->id ?>  <?php if($user[0]->dive == $value->id){ echo "selected"; } ?>"><?php  echo $value->name; ?></option>

                          <?php  } ?>
                        </select>
                      </div>
                    <div class="form-group col-md-3">
                      <label>Certification Type</label>
                        <select class="form-control" name="certification">
                          <option value="">Select Certification</option>
                          <?php foreach ($certification_list as $key => $value) { ?>

                            <option value="<?php echo $value->id ?>" <?php if($user[0]->certification == $value->id){ echo "selected"; } ?>><?php echo $value->name; ?></option>

                          <?php } ?>
                           
                        </select>
                      </div>
                    <div class="form-group col-md-3">
                      <label>Level</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Size" value="<?php echo $user[0]->level;?>"  name="level">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Depth</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Size" value="<?php echo $user[0]->depth;?>"  name="depth">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Temp</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price Per Person" value="<?php echo $user[0]->temp;?>" name="temp">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Visibility</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Size" value="<?php echo $user[0]->visibility;?>"  name="visibility">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Currents</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Group Size" value="<?php echo $user[0]->currents;?>"  name="currents">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Youtube Link<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Yotube Link" name="youtube_link" value="<?php echo $user[0]->youtube_link;?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputFile">Dives/Service Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="main_image">
                        </div>
                      </div>
                      <div style="margin-top: 10px;"><img id="blah" style="height:90px;width: 90px;" src="<?php echo !empty($user[0]->service_thumbnail_image) ?base_url('assets/uploads/service_main_image/'.$user[0]->service_thumbnail_image): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
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
                    <br/>
                           <div class="field" align="left">
                     
                              <?php
                                 $images = $this->Dives_model->getServiceImageById($user[0]->id);
                                   if(count($images) > 0){
                                    
                                           foreach ($images as $key => $value) {
                                           ?>
                              <img id="img_<?php echo $value->id; ?>" src="<?php echo base_url('assets/uploads/service_main_image/'.$value->image); ?>" width="100">
                              <a href="Javascript:void(0);" onclick="deleteProductImage(<?php echo $value->id; ?>)" id="anchor_<?php echo $value->id; ?>"  class="btn btn-danger pl-3 pr-3 pt-1 pb-1">X</a>
                              <?php 
                                 }
                                 }
                                 ?>
                           </div>
                    </div>
                  </div>
                  
                  
                  
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
                     url: "<?=base_url("admin/Dives/deleteImage/")?>" + id,
                     dataType: 'text',
                     success: function(data) {
                        
                       $("#img_" + id).remove();   
                       $("#anchor_" + id).remove();  
                       var res = '<div class="col-12 text-center text-success" style="margin-top:10px;">Image has been deleted successfully.</div>';
                          $("#deleteResponse").html(res); 

                     }
                 });
         }


      

    </script>