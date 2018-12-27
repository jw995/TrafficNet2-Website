var table = $("table tbody");


// the function to get locations in table
function attainLocation() {
	var tableLocs = [];
    table.find('tr').each(function(i) {
      var $tds = $(this).find('td'),
            siteName = $tds.eq(2).text(),
            Lat = $tds.eq(3).text();
            Lon = $tds.eq(4).text();
			var obj = {
				'sitename': siteName,
                'lat': Lat,
                'lon': Lon
            };
      tableLocs.push(obj);
  });
	return tableLocs;  
}

// the function to set markers on map
function setMarkers(map, locations) {
    var marker, i

    for (i = 0; i < locations.length; i++) {

		var loan = locations[i].sitename
        var lat = locations[i].lat
        var long = locations[i].lon

        latlngset = new google.maps.LatLng(lat, long);

        var marker = new google.maps.Marker({
            map: map,
            title: loan,
            position: latlngset
        });
        //map.setCenter(marker.getPosition())


        var content = "Site: " + loan + '</h3>'

        var infowindow = new google.maps.InfoWindow()

        google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow) {
            return function() {
                infowindow.setContent(content);
                infowindow.open(map, marker);
            };
        })(marker, content, infowindow));

    }
}

function myMap() {
    var locations = attainLocation();

    var mapProp= {
        center:new google.maps.LatLng(locations[0].lat, locations[0].lon),
        zoom:15,
    };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    setMarkers(map, locations);
}

