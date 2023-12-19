<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Users</h1>
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
                <a href="user/add"><button class="btn btn-primary" style="float:right;">Add User</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Place of Birth</th>
                    <th>Date of Birth/Time</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($customers as $key => $value) { ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $value->name;?></td>
                      <td><?php echo $value->gender;?></td>
                      <td><?php echo $value->place_of_birth ;?></td>
                      <td><?php echo date('d-m-Y',strtotime($value->date_of_birth)).' '.date('h:m',strtotime($value->time_of_birth));?></td>
                      <td>
                        <label class="switch">
                          <input class="tgl_checkbox tgl-ios" data-id=<?php echo $value->id;?> id="cb_<?php echo $value->id;?>"  type="checkbox" <?php echo $value->status == 1 ? 'checked': '';?> value="<?php echo $value->email;?>">
                          <span class="slider round"></span>
                        </label></td>
                      <td>
                        <a href="<?php echo base_url('admin/customers/'.$value->id);?>"><i class="fas fa-edit"></i></a>
                        <a style="color: red;" href="javascript:void(0)" onclick="del('<?php echo $value->id;?>')"><i class="fas fa-trash" style="margin-left:10px;"></i></a></td>
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
      var result = confirm("Do you want to delete this customer ?");
      if (result) {
        $.post('<?=base_url("admin/customers/delete_customer")?>',
        {
          id : id,
        },
        function(data){
          location.reload();
        });
      }
    }
    
    $("body").on("change",".tgl_checkbox",function(){
    $.post('<?=base_url("admin/customers/change_status")?>',
    {
      id : $(this).data('id'),
      email: $(this).val(),
      status : $(this).is(':checked')==true?1:0
    },
    function(data){
      alert("Your status has been successfully updated");
    });
  });

  </script>