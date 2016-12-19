var map;
var mylatlang;
$(document).ready(function () {

  geolocationInit();
  
  function geolocationInit() {

    if(navigator.geolocation)
    {
      navigator.geolocation.getCurrentPosition(success,fail);

    }else {
      alert("Browser not supported");
    }
  }
  
  function success(position) {

    var latval=position.coords.latitude;
    var lngval=position.coords.longitude;

    console.log(latval,lngval);
     mylatlang=new google.maps.LatLng(latval,lngval);
    createMap(mylatlang);
  //  nearbySearch(mylatlang,"school");

    SearchLocation(latval,lngval);

  }


 // {lat:  33.8876066, lng: 73.36912389999999}

  
  function fail() {
    alert("it fails");
  }
  
  
  function createMap(mylatlang) {
     map = new google.maps.Map(document.getElementById('map'), {
      center:mylatlang,

      zoom: 14
    });

      var marker=new google.maps.Marker({
        position: mylatlang,
        map: map
    });

  }
  

  function  createMarker(latlang,icn,name) {




    var marker = new google.maps.Marker({
      position: latlang,
      map: map,
      icon:icn,
      title:name
    });
  }


  function nearbySearch(mylatlang,type) {
    var request = {
      location:mylatlang ,
      radius: '1500',
      types: [type]
    };




    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);

    function callback(results, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
          var place = results[i];
          latlng=place.geometry.location;
          icn=place.icon;
          name=place.name;
          createMarker(latlng,icn,name);
        }
      }
    }
  }

function SearchLocation(lat,lng) {

  $.post('http://localhost:8000/api/searchlocation',{lat:lat,lng:lng},function (match) {

    console.log(match);

    $.each(match,function (i,val) {

     var glatval=val.lat;
      var glngval=val.lng;
      var gname=val.name;
      var glatlang=new google.maps.LatLng(glatval,glngval);
      var gicn = {
        url: "flood.png", // url
        scaledSize: new google.maps.Size(50, 50), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
      };



      createMarker(glatlang,gicn,gname);

    });


  })
}


});