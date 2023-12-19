<style>
  #map-canvas {
  height: 400px;
  width: 100%;
}
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
            <h1>Manage Dives/Locations</h1>
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
        <div class="card-header">
                <a href="manage-dives/add"><button class="btn btn-primary" style="float:right;">Add Dive/Location</button></a>
              </div>
        <div id="map-canvas" style="margin-bottom: 50px;"></div> 
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <a href="manage-dives/add"><button class="btn btn-primary" style="float:right;">Add Center</button></a>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Pincode</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($center as $key => $value) { ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $value->city;?></td>
                      <td><?php echo $value->state ;?></td>
                      <td><?php echo $value->location_pincode ;?></td>
                      <td><?php echo $value->location_slug;?></td>
                      <td>
                        <label class="switch">
                          <input class="tgl_checkbox tgl-ios" data-id=<?php echo $value->id;?> id="cb_<?php echo $value->id;?>"  type="checkbox" <?php echo $value->status == 1 ? 'checked': '';?>>
                          <span class="slider round"></span>
                        </label>
                      </td>
                      <td><?php echo $value->full_address;?></td>
                      <td>
                        <a href="<?php echo base_url('admin/manage-dives/'.$value->id);?>"><i class="fas fa-edit"></i></a>
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
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initialize() {
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: new google.maps.LatLng(27.1416735,80.8833819),
          zoom: 3
        });
        const iconBase = "<?php echo base_url();?>";
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('<?php echo base_url("admin/dives/getallmarker");?>', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name;
              infowincontent.appendChild(strong);

              var img = document.createElement('img');
              img.src = '<?php echo base_url("assets/admin/image/dives-icon/mp.png");?>';
              img.style.width = '100px';
              infowincontent.appendChild(img);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label,
                icon : iconBase+"assets/uploads/download.png"
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}

      function del(id){
      var result = confirm("Do you want to delete this dive center ?");
      if (result) {
        $.post('<?=base_url("admin/dives/delete_dives")?>',
        {
          id : id,
        },
        function(data){
          location.reload();
        });
      }
    }
    
    $("body").on("change",".tgl_checkbox",function(){
    $.post('<?=base_url("admin/dives/change_status")?>',
    {
      id : $(this).data('id'),
      status : $(this).is(':checked')==true?1:0
    },
    function(data){
      alert("Your status has been successfully updated");
    });
  });

    </script>