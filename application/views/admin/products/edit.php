<style>
.select2-results__option[aria-selected] {
    color: #000;
}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/rental-products');?>">Back</a></li>
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
              <h3 class="card-title">Edit Product</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $products[0]->id ?>">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Product Name<span style="color:red;">*</span></label>
                  <input type="text"  name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" value="<?php echo $products[0]->product_name ;?>">
                </div>
                <div class="form-group col-md-6" id="modal-default-cliente">
                  <label for="exampleInputEmail1">Select Category<span style="color:red;">*</span></label>
                  <select class="select-category form-control" name="category_id" multiple="multiple"  data-placeholder="Select Category" style="width: 100%;">
                    <?php 
                    $var_products = explode(',', $products[0]->category_id);
                    foreach ($get_category as $value) { 
                        $selected = (in_array($value->id,$var_products)?'selected':'');
                      ?>
                      
                    <option value= "<?php echo $value->id; ?>" <?php echo $selected;?>><?php echo $value->name; ?></option>
                    <?php } ?>
                      </select>
                </div>
                
              </div>
                <div class="row">
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">MRP<span style="color:red;">*</span></label>
                  <input type="text"  name="mrp" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" value="<?php echo $products[0]->product_price ;?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">SKU<span style="color:red;">*</span></label>
                  <input type="text"  name="sku" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" value="<?php echo $products[0]->product_sku ;?>">
                </div>       
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Weight<span style="color:red;">*</span>(In Carrat)</label>
                  <input type="text"  name="weight" class="form-control" id="exampleInputEmail1" placeholder="Enter Weight"  value="<?php echo $products[0]->weight; ?>">
                </div> 
                                 
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Discount<span style="color:red;">*</span></label>
                  <input type="text"  name="discount" class="form-control" id="exampleInputEmail1" placeholder="Enter Discount" value="<?php echo $products[0]->discount ;?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Discount Type<span style="color:red;">*</span></label>
                  <select class="form-control" name="discount_type">
                    <option value="" disabled>Select Discount Type</option>
                    <option value="A" <?php if($products[0]->discount_type == 'A'){ echo "selected"; }?>>Amount</option>
                    <option value="P" <?php if($products[0]->discount_type == 'P'){ echo "selected"; }?>>Percentage</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Delivery<span style="color:red;">*</span></label>
                  <input type="text"  name="delivery" class="form-control" id="exampleInputEmail1" placeholder="Enter Delivery"  value="<?php echo $products[0]->delivery ;?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Description<span style="color:red;">*</span></label>
                  <textarea id="editor" name="description"><?php echo $products[0]->product_description; ?></textarea>
                </div>
              </div>                
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option value="1" <?php echo $products[0]->status == 1 ? "selected": "";?>>Active</option>
                    <option value="0" <?php echo $products[0]->status == 0 ? "selected": "";?>>Inactive</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputFile">Product Image<span style="color:red;">*</span></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" onchange="readURL(this);" name="file">
                    </div>
                  </div>
                  <div style="margin-top: 10px;"><img id="blah" style="height:90px;width: 90px;" src="<?php echo !empty($products[0]->product_image) ?base_url('assets/uploads/product_image/'.$products[0]->product_image): base_url('assets/admin/image/user-icon.jpeg');?>" alt="your image" /></div>
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
  /*$("#chkall").click(function(){
        if($("#chkall").is(':checked')){
            $("#athl > option").prop("selected", "selected");
            $("#athl").trigger("change");
        } else {
            $("#athl > option").removeAttr("selected");
            $("#athl").trigger("change");
        }
    }); */
      
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