@extends('layouts.layout')
@section('menu')
    @include('admin/menu')
@endsection
@section('content-title')
    Tampilan Data Dalam Table
@endsection
@section('data-title')
    <i class="fa fa-info"></i>&nbsp;Informasi Data Dalam Table
@endsection
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="map" style="height: 700px; width:100%"></div>
        </div>
    </div>
    <td id="legend">
    </td>
@endsection
@push('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNUmHx3Et1_3SI2gQOe23vG0olB5cAmkk"></script>
<script type="text/javascript">
    var flightPath;
          var map;
    
    
    var markers = [
        <?php foreach ($arrays['cluster_1'] as $data): ?>
            {
        
            "lat": '<?php echo $data['latitude'] ?>',
            "lng": '<?php echo $data['longitude']; ?>',
            "description": '<?php echo 'Latitude :'.$data['latitude'].'<br>'.'<br>'.'Longitude :'.$data['longitude'] ?>',
        
            "icon": "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"
        
        
        },
        <?php endforeach ?>
    ];

    var markers2 = [
        <?php foreach ($arrays['cluster_2'] as $data): ?>
            {
        
            "lat": '<?php echo $data['latitude'] ?>',
            "lng": '<?php echo $data['longitude']; ?>',
            "description": '<?php echo 'Latitude :'.$data['latitude'].'<br>'.'<br>'.'Longitude :'.$data['longitude'] ?>',
        
            "icon": "{{ asset('assets/images/marker_1.jpeg') }}"
        
        
        },
        <?php endforeach ?>
    ];
    var icon2 = {
        url: "{{ asset('assets/images/marker.png') }}", // url
        scaledSize: new google.maps.Size(20, 20), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };
    var markers3 = [
        <?php foreach ($arrays['cluster_3'] as $data): ?>
            {
        
            "lat": '<?php echo $data['latitude'] ?>',
            "lng": '<?php echo $data['longitude']; ?>',
            "description": '<?php echo 'Latitude :'.$data['latitude'].'<br>'.'<br>'.'Longitude :'.$data['longitude'] ?>',
        
            "icon": icon2
        
        
        },
        <?php endforeach ?>
    ];

    window.onload = function () {
    LoadMap();
}
function LoadMap() {
    var mapOptions = {
        // center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
        // center: {lat: -3.7597956, lng: 102.2702553},
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var infoWindow = new google.maps.InfoWindow();
    var latlngbounds = new google.maps.LatLngBounds();
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var legend = document.getElementById("legend");
    // legend.innerHTML = "";
    for (var i = 0; i < markers.length; i++) {
        var data = markers[i]
        var myLatlng = new google.maps.LatLng(data.lat, data.lng);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: data.title,
            icon: data.icon
        });
     

        (function (marker, data) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent("<div style = 'width:150px;height:80px'>" + data.description + "</div>");
                infoWindow.open(map, marker);
            });
        })(marker, data);
        latlngbounds.extend(marker.position);
 
       
    }
    var bounds = new google.maps.LatLngBounds();
    map.setCenter(latlngbounds.getCenter());
    map.fitBounds(latlngbounds);

    for (var i = 0; i < markers2.length; i++) {
        var data2 = markers2[i]
        var myLatlng2 = new google.maps.LatLng(data2.lat, data2.lng);
        var marker2 = new google.maps.Marker({
            position: myLatlng2,
            map: map,
            title: data2.title,
            icon: data2.icon
        });
     

        (function (marker2, data2) {
            google.maps.event.addListener(marker2, "click", function (e) {
                infoWindow.setContent("<div style = 'width:150px;height:80px'>" + data2.description + "</div>");
                infoWindow.open(map, marker2);
            });
        })(marker2, data2);
        latlngbounds.extend(marker2.position);
 
       
    }
    var bounds = new google.maps.LatLngBounds();
    map.setCenter(latlngbounds.getCenter());
    map.fitBounds(latlngbounds);

    for (var i = 0; i < markers3.length; i++) {
        var data3 = markers3[i]
        var myLatlng3 = new google.maps.LatLng(data3.lat, data3.lng);
        var marker3 = new google.maps.Marker({
            position: myLatlng3,
            map: map,
            title: data3.title,
            icon: data3.icon
        });
     

        (function (marker3, data3) {
            google.maps.event.addListener(marker3, "click", function (e) {
                infoWindow.setContent("<div style = 'width:150px;height:80px'>" + data3.description + "</div>");
                infoWindow.open(map, marker3);
            });
        })(marker3, data3);
        latlngbounds.extend(marker3.position);
 
       
    }
    var bounds = new google.maps.LatLngBounds();
    map.setCenter(latlngbounds.getCenter());
    map.fitBounds(latlngbounds);

    
    var jarak = [

        <?php foreach ($arrays['cluster_1'] as $data): ?>
            {
            "lat": parseFloat('<?php echo $data['latitude']; ?>'),
            "lng": parseFloat('<?php echo $data['longitude']; ?>'),
        },
        <?php endforeach ?>
    ];
    var jarakPath = new google.maps.Polyline({
            path: jarak,
            geodesic: true,
            strokeColor: '#000080',
            strokeOpacity: 1.0,
            strokeWeight: 2
        });
    jarakPath.setMap(map);

    var jarak2 = [

        <?php foreach ($arrays['cluster_2'] as $data): ?>
            {
            "lat": parseFloat('<?php echo $data['latitude']; ?>'),
            "lng": parseFloat('<?php echo $data['longitude']; ?>'),
        },
        <?php endforeach ?>
    ];
    var jarakPath2 = new google.maps.Polyline({
            path: jarak2,
            geodesic: true,
            strokeColor: 'red',
            strokeOpacity: 1.0,
            strokeWeight: 2
    });
    jarakPath2.setMap(map);


    var jarak3 = [

        <?php foreach ($arrays['cluster_3'] as $data): ?>
            {
            "lat": parseFloat('<?php echo $data['latitude']; ?>'),
            "lng": parseFloat('<?php echo $data['longitude']; ?>'),
        },
        <?php endforeach ?>
    ];
    var jarakPath3 = new google.maps.Polyline({
            path: jarak3,
            geodesic: true,
            strokeColor: 'yellow',
            strokeOpacity: 1.0,
            strokeWeight: 2
    });
    jarakPath3.setMap(map);

}

     
</script>
@endpush