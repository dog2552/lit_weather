function init_map()
    {
        var myOptions = {
            zoom:12,
            center:new google.maps.LatLng(47.8388,35.13956699999994),
            mapTypeId: google.maps.MapTypeId.ROADMAP};
        
            map = new google.maps.Map(document.getElementById('map'), myOptions);
            marker = new google.maps.Marker(
                {
                    map: map,position: new google.maps.LatLng(47.8388,35.13956699999994)});
                    google.maps.event.addListener(marker, 'click', function(){
                    infowindow.open(map,marker);
        });  
        infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);