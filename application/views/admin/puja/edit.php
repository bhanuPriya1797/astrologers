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
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Service</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $center[0]->id;?>">
                <div class="card-body">
                  <div class="row">                 
                    <div class="form-group col-md-6">
                      <label>Puja Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Puja Name" value="<?php echo $center[0]->puja_name;?>"  name="puja_name">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Price (In Rs.)</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price Name" value="<?php echo $center[0]->price;?>"  name="price">
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea id="editor" name="description"><?php  echo $center[0]->description ;?></textarea>
                    </div>
                  </div>
                    
                  <div class="row">                    
                    <div class="form-group col-md-4">
                      <label for="exampleInputFile">Puja Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" onchange="readURL(this);" name="main_image">
                        </div>
                      </div>
                      <div style="margin-top: 10px;"><img id="blah" style="height:90px;width: 90px;" src="<?php echo !empty($center[0]->puja_image) ?base_url('assets/uploads/puja_image/'.$center[0]->puja_image): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="1" <?php echo $center[0]->status == 1 ? "selected": "";?>>Active</option>
                        <option value="0" <?php echo $center[0]->status == 0 ? "selected": "";?>>Inactive</option>
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