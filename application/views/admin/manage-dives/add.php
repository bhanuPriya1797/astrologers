<style>
    html, body, #map-canvas {
  height: 100%;
  margin: 0;
  padding: 0;
}

#map-canvas {
  height: 400px;
  width: 100%;
}

/*label {
  padding: 20px 10px;
  display: inline-block;
  font-size: 1.5em;
}*/

input {
  font-size: 0.75em;
  padding: 10px;
}
  </style>
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
                <h3 class="card-title">Add Dive/Location</h3>
              </div>
              <div class="form-group">
                  <label for="">Address</label> 
                  <input id="map-search" class="controls form-control" type="text" placeholder="Search Box" size="104" style="margin-bottom:20px;">
                </div>
              <input type="hidden" class="latitude form-control" value="">
              <input type="hidden" class="longitude form-control">
              <input type="hidden" class="reg-input-city form-control" placeholder="City">
              
              
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                      <?php
                          foreach ($dives_category as $key => $value) { ?>
                            <option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                            <?php 
                          } ?>
                    </select>
                </div>

                 <div id="map-canvas" style="margin-bottom: 50px;"></div> 
                 <div class="row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description<span style="color:red;">*</span></label>
                      <textarea id="editor" name="description"></textarea>
                    </div>
                  </div>
                 <div class="row">
                      <div class="form-group col-md-3">
                        <label>Dive Type</label>
                        <select class="form-control" name="dive">
                            <?php  foreach ($dives_type as $key => $value) { ?>

                            <option value="<?php  echo $value->id ?>"><?php  echo $value->name; ?></option>

                          <?php  } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                      <label>Certification Type<span style="color:red;">*</span></label>
                        <select class="form-control" name="certification">
                          <option value="">Select Certification<span style="color:red;">*</span></option>
                          <?php foreach ($certification_list as $key => $value) { ?>

                            <option value="<?php echo $value->id ?>"><?php echo $value->name; ?></option>

                          <?php } ?>
                           
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
                    <div class="form-group col-md-3">
                      <label>Temp<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Temp" name="temp">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Visibility<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Visibility" name="visibility">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Currents<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Currents" name="currents">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Youtube Link<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Yotube Link" name="youtube_link">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile">Dives/Service Image<span style="color:red;">*</span></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" onchange="readURL(this);" name="main_image">
                          </div>
                        </div>
                        <div style="margin-top: 10px;"></div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                    <label for="exampleInputFile">Dive Slider Images</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="slider[]" id="files" multiple>
                      </div>

                    </div>
                    </div>
                   
                  </div>
                <input type="hidden" value="" id="latitude" name="latitude">
                <input type="hidden" value="" id="longitude" name="longitude">
                <input type="hidden" value="" id="reg-input-city" name="reg-input-city">
                <input type="hidden" value="" id="address" name="address">
                <button type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script>
  function initialize() {

    var mapOptions, map, marker, searchBox, city,
    infoWindow = '',
    addressEl = document.querySelector( '#map-search' ),
    latEl = document.querySelector( '.latitude' ),
    longEl = document.querySelector( '.longitude' ),
    element = document.getElementById( 'map-canvas' );
    city = document.querySelector( '.reg-input-city' );
    const iconBase = "<?php echo base_url();?>";
    mapOptions = {
      zoom: 3,
      center: new google.maps.LatLng( 27.1416735,80.8833819 ),
      disableDefaultUI: false,
      scrollWheel: true,
      draggable: true,
      mapTypeId: "roadmap",
    };

    map = new google.maps.Map( element, mapOptions );

    marker = new google.maps.Marker({
      position: mapOptions.center,
      map: map,
      icon : iconBase+"assets/uploads/download.png",
      draggable: true
    });

    searchBox = new google.maps.places.SearchBox( addressEl );

    google.maps.event.addListener( searchBox, 'places_changed', function () {
    var places = searchBox.getPlaces(),
    bounds = new google.maps.LatLngBounds(),
    i, place, lat, long, resultArray,
    addresss = places[0].formatted_address;

    for( i = 0; place = places[i]; i++ ) {
      bounds.extend( place.geometry.location );
      marker.setPosition( place.geometry.location );
    }

    map.fitBounds( bounds );
    map.setZoom( 15 );
    lat = marker.getPosition().lat();
    long = marker.getPosition().lng();
    latEl.value = lat;
    $("#latitude").val(lat);
    $("#longitude").val(long);
    $("#address").val(addresss);

    longEl.value = long;

    resultArray =  places[0].address_components;
    for( var i = 0; i < resultArray.length; i++ ) {
      if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
        citi = resultArray[ i ].long_name;
        city.value = citi;
        $("#reg-input-city").val(citi);
      }
    }

    if ( infoWindow ) {
      infoWindow.close();
    }
    
    infoWindow = new google.maps.InfoWindow({
      content: addresss
    });

    infoWindow.open( map, marker );
  } );


  google.maps.event.addListener( marker, "dragend", function ( event ) {
    var lat, long, address, resultArray, citi;

    console.log( 'i am dragged' );
    lat = marker.getPosition().lat();
    long = marker.getPosition().lng();

    var geocoder = new google.maps.Geocoder();
    geocoder.geocode( { latLng: marker.getPosition() }, function ( result, status ) {
      if ( 'OK' === status ) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
        address = result[0].formatted_address;
        resultArray =  result[0].address_components;

        for( var i = 0; i < resultArray.length; i++ ) {
          if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
            cities = resultArray[ i ].long_name;
            console.log( cities );
            city.value = cities;
            $("#reg-input-city").val(cities);
          }
        }
        addressEl.value = address;
        latEl.value = lat;
        longEl.value = long;
        $("#latitude").val(lat);
        $("#longitude").val(long);
        $("#address").val(address);

      } else {
        console.log( 'Geocode was not successful for the following reason: ' + status );
      }

      if ( infoWindow ) {
        infoWindow.close();
      }

      infoWindow = new google.maps.InfoWindow({
        content: address
      });

      infoWindow.open( map, marker );
    } );
  });
}

CKEDITOR.replace('editor', {

        uiColor: '#CCEAEE',

      });
</script>