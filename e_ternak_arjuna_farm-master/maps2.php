<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBy_lZc0g8Y34aJSrSgHQ448KfaXoRVuco&sensor=false"></script>
<script type="text/javascript">
    var markers = [
        {
            "title": 'Alibaug',
            "lat": '18.641400',
            "lng": '72.872200',
            "description": 'Alibaug is a coastal town and a municipal council in Raigad District in the Konkan region of Maharashtra, India.'
        },
        {
            "title": 'Lonavla',
            "lat": '18.750000',
            "lng": '73.416700',
            "description": 'Lonavla'
        },
        {
            "title": 'Mumbai',
            "lat": '18.964700',
            "lng": '72.825800',
            "description": 'Mumbai formerly Bombay, is the capital city of the Indian state of Maharashtra.'
        },
        {
            "title": 'Pune',
            "lat": '18.523600',
            "lng": '73.847800',
            "description": 'Pune is the seventh largest metropolis in India, the second largest in the state of Maharashtra after Mumbai.'
        },
        {
            "title": 'Thane',
            "lat": '19.182800',
            "lng": '72.961200',
            "description": 'Thane'
        },
        {
            "title": 'Vashi',
            "lat": '18.750000',
            "lng": '73.033300',
            "description": 'Vashi'
        }
    ];
    window.onload = function () {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var geocoder = geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        for (var i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title,
                draggable: true,
                animation: google.maps.Animation.DROP
            });
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
                google.maps.event.addListener(marker, "dragend", function (e) {
                    var lat, lng, address;
                    geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            lat = marker.getPosition().lat();
                            lng = marker.getPosition().lng();
                            address = results[0].formatted_address;
                            alert("Latitude: " + lat + "\nLongitude: " + lng + "\nAddress: " + address);
                        }
                    });
                });
            })(marker, data);
            latlngbounds.extend(marker.position);
        }
        var bounds = new google.maps.LatLngBounds();
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
    }
</script>
<div id="dvMap" style="width: 500px; height: 500px">
</div>
</body>
</html>
