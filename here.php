<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1549984893" />
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>

</head>
<body>
 <div id="map" style="width: 100%; height: 400px; background: grey" ></div>
 <script  type="text/javascript" charset="UTF-8" >
  
/**
* Create a marker that is capable of receiving DOM events and add it
* to the map.
*
* @param  {H.Map} map      A HERE Map instance within the application
*/
function addDomMarker(map) {
 var outerElement = document.createElement('div'),
     innerElement = document.createElement('div');

 outerElement.style.userSelect = 'none';
 outerElement.style.webkitUserSelect = 'none';
 outerElement.style.msUserSelect = 'none';
 outerElement.style.mozUserSelect = 'none';
 outerElement.style.cursor = 'default';

 innerElement.style.color = 'blue';
 innerElement.style.backgroundColor = '';
 innerElement.style.border = '';
 innerElement.style.font = 'normal 20px arial';
 innerElement.style.lineHeight = '25px'



 // add negative margin to inner element
 // to move the anchor to center of the div
 innerElement.style.marginTop = '-10px';
 innerElement.style.marginLeft = '-10px';

 outerElement.appendChild(innerElement);

 // Add text to the DOM element
 var romeMarker = new H.map.Marker({lat:-33.5118503, lng:-70.7546581});
 map.addObject(romeMarker);

   innerElement.innerHTML = 'vlarion';

 function changeOpacity(evt) {
   evt.target.style.opacity = 0.6;
 };

 function changeOpacityToOne(evt) {
   evt.target.style.opacity = 1;
 };

 //create dom icon and add/remove opacity listeners
 var domIcon = new H.map.DomIcon(outerElement, {
   // the function is called every time marker enters the viewport
   onAttach: function(clonedElement, domIcon, domMarker) {
     clonedElement.addEventListener('mouseover', changeOpacity);
     clonedElement.addEventListener('mouseout', changeOpacityToOne);
   },
   // the function is called every time marker leaves the viewport
   onDetach: function(clonedElement, domIcon, domMarker) {
     clonedElement.removeEventListener('mouseover', changeOpacity);
     clonedElement.removeEventListener('mouseout', changeOpacityToOne);
   }
 });

 // Marker for Maipú home
 var bearsMarker = new H.map.DomMarker({lat:-33.5118503, lng:-70.7546581}, {
   icon: domIcon
 });
 map.addObject(bearsMarker);
}

/**
* Boilerplate map initialization code starts below:
*/

//Step 1: initialize communication with the platform
var platform = new H.service.Platform({
   'app_id': 'P67S55oxbYnxbNlg5Mpw',
   'app_code': 'tTJDf2t_s_lVphGy1HZDyw',
 useHTTPS: true
});
var pixelRatio = window.devicePixelRatio || 1;
var defaultLayers = platform.createDefaultLayers({
 tileSize: pixelRatio === 1 ? 256 : 512,
 ppi: pixelRatio === 1 ? undefined : 320
});

//Step 2: initialize a map - this map is centered over Chicago.
var map = new H.Map(document.getElementById('map'),
 defaultLayers.normal.map,{
 center: {lat:-33.5118503, lng:-70.7546581},
 zoom: 16,
 pixelRatio: pixelRatio
});

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));


// Now use the map as required...
addDomMarker(map);

setTimeout(addDomMarker, 5000);

 </script>
</body>
</html>