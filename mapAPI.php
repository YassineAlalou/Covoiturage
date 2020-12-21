<?php

include_once 'C:\xampp\htdocs\cov\service\VilleService.php';
include_once 'C:\xampp\htdocs\cov\service\TrajetService.php';
include_once 'C:\xampp\htdocs\cov\service\VilleTrajetService.php';

extract($_POST);

$trjID = $_GET['id'];

$trj = new VilleTrajetService();
$tr = $trj->getAll();

$idAdr = array();
// obtention des id Villes ==> un code Trajet
$c=0;
$idEtat = array();
foreach ($tr as $e){
    if($e['codeTrajet'] == $trjID){
    //array_push($idAdr,$e['idVille']);
    $idAdr[$c] = $e['idVille'];
    $idEtat[$c]= $e['etat'];
    $c++;
    }
}



// collection des villes
$c = new VilleService();
$city = array();
$i=0;
foreach($idAdr as $a){
    $et =$c->findById($a);
    //array_push($city,$et->getnomVille());
    $city[$i] = $et->getnomVille();
    $i++;
}
$city2 = array();
$j=0;
for($i=1; $i<sizeof($city)-1;$i++){
        $city2[$j]=$city[$i];
        $j++;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Waypoints in directions</title>
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 70%;
        height: 100%;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <div id="right-panel">
    
    <div>
    <b>Depart:</b>
    <select  id="start">
      <option value=<?php echo $city[0]; ?>><?php echo $city[0]; ?></option>
    </select>
    <br>
    <b>Trajet:</b> <br>
    <select multiple id="waypoints">
        <?php 
        foreach($city2 as $s){?>
      <option value=<?php echo $s;?>><?php echo $s;?></option>
        <?php }?>
    </select>
    <br>
    <b>Arrivee:</b>
    <select id="end">
      <option value=<?php echo $city[count($city)-1]; ?>><?php echo $city[count($city)-1]; ?></option>
    </select>
    <br>
      <input type="submit" id="submit"value="Localiser">
    </div>
    <div id="directions-panel"></div>
    </div>
    <br>
    <a class="glyphicon glyphicon-home" href="/newtemp/trajethistorique.php"></a>
    
    <script>
      google.maps.event.addDomListener(window, 'load', initMap);
      google.maps.event.addDomListener(window, "resize", resizingMap());
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat: 33.589885712, lng: -7.603868961}
        });
        directionsDisplay.setMap(map);

        document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }
      
      google.maps.event.addDomListener(window, 'load', initMap);
      google.maps.event.addDomListener(window, "resize", resizingMap());

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
          if (checkboxArray.options[i]/*.selected*/) {
            waypts.push({
              location: checkboxArray[i].value,
              stopover: true
            });
          }
        }

        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route N°: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' Vers ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions a echoué ' + status);
          }
        });
      }

      
      
      $('#myModal').on('show.bs.modal', function() {
        //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
        resizeMap();
      })
      function resizeMap() {
        if(typeof map =="undefined") return;
        setTimeout( function(){resizingMap();} , 400);
      }
      function resizingMap() {
        if(typeof map =="undefined") return;
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBN-zmuuTEvqFAv1Dhw0-q5B0slv29s728&callback=initMap">
    </script>
  </body>
</html>