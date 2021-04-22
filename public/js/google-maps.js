
var lat=-1.2855855, long=36.8148359;
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: lat, lng: long};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 13, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map,draggable:true});
  google.maps.event.addListener(marker, 'dragend', function(marker){
        var latLng = marker.latLng; 
        currentLatitude = latLng.lat();
        currentLongitude = latLng.lng();
        $("#latitude").val(currentLatitude);
        $("#longitude").val(currentLongitude);
     }); 

}


$('#place_id').select2({
  ajax: {
    url: '/googleMaps/search/',
    dataType: 'json',
    processResults: function (data) {
      // Tranforms the top-level key of the response object from 'items' to 'results'
      return {
                results: data
            };
    },
    cache: true
  },
});



function getCordinates(){
        var place_id=$('#place_id').val();
    $.ajax({
                url: '/getCordinates/'+place_id,
                type: "GET", 
                success: function(data){
                    $data = $(data);
                    var lat=$data[0].lat;
                    var lng=$data[0].lng;
                    /*console.log(lat);*/
                    var uluru = {lat: lat, lng: lng};
                   // The map, centered at Uluru
                    var map = new google.maps.Map(
                        document.getElementById('map'), {zoom: 16, center: uluru});
                    // The marker, positioned at Uluru
                    var marker = new google.maps.Marker({position: uluru, map: map,draggable:true});
                    google.maps.event.addListener(marker, 'dragend', function(marker){
                          var latLng = marker.latLng; 
                          currentLatitude = latLng.lat();
                          currentLongitude = latLng.lng();
                          $("#latitude").val(currentLatitude);
                          $("#longitude").val(currentLongitude);
                       });       
                }
            });
}