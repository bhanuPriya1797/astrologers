<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Blog Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Back</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if(!empty($this->session->flashdata('success'))){
          echo $this->session->flashdata('success');
      } ?>
      <div></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="manage-blog-category/add"><button class="btn btn-primary" style="float:right;">Add Blog Category</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($categoryList as $key => $catvalue) { ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $catvalue->blog_category;?></td>
                      <td><?php echo $catvalue->status;?></td>
                      <td><a href="<?php echo base_url('admin/manage-blog-category/'.$catvalue->id);?>"><i class="fas fa-edit"></i></a>
                      <a style="color: red;" href="javascript:void(0)" onclick="del('<?php echo $catvalue->id;?>')"><i class="fas fa-trash" style="margin-left:10px;"></i></a></td>

                    </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>

    function del(id){
      var result = confirm("Do you want to delete this blog category ?");
      if (result) {
        $.post('<?=base_url("admin/blog_category/delete")?>',
        {
          id : id,
        },
        function(data){
          location.reload();
        });
      }
    }
    
    $("body").on("change",".tgl_checkbox",function(){
    $.post('<?=base_url("admin/subadmin/change_status")?>',
    {
      id : $(this).data('id'),
      status : $(this).is(':checked')==true?1:0
    },
    function(data){
      alert("Your status has been successfully updated");
    });
  });

  </script>