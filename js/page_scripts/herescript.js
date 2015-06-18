
function addInfoBubble() {
    var group = new H.map.Group();

    map.addObject(group);

    // add 'tap' event listener, that opens info bubble, to the group
    

    addMarkerToGroup(group, { lat: 53.526296, lng: -113.525600 },
      '<div><a>Ultimate Frisbee</a>' +
      '</div><div >@ Quad<br>Today @ 3:00 PM</div>');

    addMarkerToGroup(group, { lat: 53.528200, lng: -113.525439 },
      '<div ><a>Stats 151 Study Group</a>' +
      '</div><div >@ CCIS L2-220<br>Tommrow @ 12:00 AM</div>');

}

function main() {
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

    // Now use the map as required...
    moveMapToUofA(map);

    // setup map group
    var group = new H.map.Group();
    map.addObject(group);

    group.addEventListener('tap', function (evt) {
        // event target is the marker itself, group is a parent event target
        // for all objects that it contains
        var bubble = new H.ui.InfoBubble(evt.target.getPosition(), {
            // read custom data
            content: evt.target.getData()
        });
        // show info bubble
        ui.addBubble(bubble);
    }, false);
    addClickEventListenerToMap(map)
}