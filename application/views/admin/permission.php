<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Permissions</h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="permissions/addRolePermission"><button class="btn btn-primary" style="float:right;">Add Permission</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Role Name</th>
                    <th>Added By</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($subadmin as $key => $value) { 
                      $added_by_details = get_admin_name($value->added_by); ?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $value->name;?></td>
                        <td><?php echo $added_by_details['first_name']." ".$added_by_details['last_name'];?></td>
                        <td><a href="<?php echo base_url('admin/permissions/getRolePermission/'.$value->id);?>"><i class="fas fa-edit"></i></a></td>
                      </tr>
                      <?php $i++; 
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>