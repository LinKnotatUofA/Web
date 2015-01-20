function moveMapToUofA(map) {
    map.setCenter({ lat: 53.5244, lng: -113.5244 });
    map.setZoom(15);
}
function addMarkerToGroup(group, coordinate, html) {
    var marker = new H.map.Marker(coordinate);
    var icon = new H.map.Icon(currenticon);
    marker = new H.map.Marker(coordinate, { icon: icon });
    // add custom data to the marker
    marker.setData(html);
    group.addObject(marker);
}
function setupbasicmap() {
    //Step 1: initialize communication with the platform
    var platform = new H.service.Platform({
        app_id: 'DemoAppId01082013GAL',
        app_code: 'AJKnXv84fjrb0KIHawS0Tg',
        useCIT: true
    });
    var defaultLayers = platform.createDefaultLayers();

    //Step 2: initialize a map  - not specificing a location will give a whole world view.
    var map = new H.Map(document.getElementById('map'),
      defaultLayers.normal.map);

    //Step 3: make the map interactive
    // MapEvents enables the event system
    // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
    var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

    // Create the default UI components
    var ui = H.ui.UI.createDefault(map, defaultLayers);
    moveMapToUofA(map)

    return {
        map: map,
        ui: ui,
    };
   
}

function groupfactory(provided_ui) {
    
    var group = new H.map.Group();
    group.addEventListener('tap', function (evt) {
        // event target is the marker itself, group is a parent event target
        // for all objects that it contains
        var bubble = new H.ui.InfoBubble(evt.target.getPosition(), {
            // read custom data
            content: evt.target.getData()
        });
        // show info bubble
        provided_ui.addBubble(bubble);
    }, false);
 
    return group;

}

function setUpClickListener() {
    // Attach an event listener to map display
    // obtain the coordinates and display in an alert box.
    map.addEventListener('tap', add);
}
function removeClickListener() {
    // Attach an event listener to map display
    // obtain the coordinates and display in an alert box.
    map.removeEventListener('tap',add);
}
function add(evt) {
    var coord = map.screenToGeo(evt.currentPointer.viewportX,
            evt.currentPointer.viewportY);
    var objectarray = map.getObjects();
    addMarkerToGroup(objectarray[0], coord,
  '<div><a>Placeholder Activity</a>' +
  '</div><div >@ Placeholder Location<br>Placeholder Date @ Placeholder Time</div>');
}

