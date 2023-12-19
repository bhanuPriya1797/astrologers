<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Testimonial</h1>
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
      }
      if(!empty($this->session->flashdata('error'))){
          echo $this->session->flashdata('error');
      } ?>
      <div></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="testimonial/add"><button class="btn btn-primary" style="float:right;">Add</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Heading</th>
                    <th>Sub Heading</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($getList as $key => $value) { ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $value['title'];?></td>
                      <td><?php echo $value['heading'] ;?></td>
                      <td><?php echo $value['subheading'] ;?></td>
                      <td><?php echo $value['description'];?></td>
                      <td>
                        <label class="switch">
                          <input class="tgl_checkbox tgl-ios" data-id=<?php echo $value['id'];?> id="cb_<?php echo $value['id'];?>"  type="checkbox" <?php echo $value['status'] == 1 ? 'checked': '';?>>
                          <span class="slider round"></span>
                        </label>
                      </td>
                      <td><a href="<?php echo base_url('admin/testimonial/'.$value['id']);?>"><i class="fas fa-edit"></i></a><a style="color: red;" href="javascript:void(0)" onclick="del('<?php echo $value['id'];?>')"><i class="fas fa-trash" style="margin-left:10px;"></i></a></td>
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
      var result = confirm("Do you want to delete this testimonial ?");
      if (result) {
        $.post('<?=base_url("admin/testimonial/delete")?>',
        {
          id : id,
        },
        function(data){
          location.reload();
        });
      }
    }
    
    $("body").on("change",".tgl_checkbox",function(){
      $.post('<?=base_url("admin/testimonial/change_status")?>',
      {
        id : $(this).data('id'),
        status : $(this).is(':checked')==true?1:0
      },
      function(data){
        alert("Your status has been successfully updated");
      });
    });

  </script>