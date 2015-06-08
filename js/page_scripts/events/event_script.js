
function main() {
    // by defualt page will load all fun parties
    map.addObject(currentgroup);
    display_event();
    //setupown();
}



function display_event() {
    if (edit == true) {
        removeClickListener();
        edit = false;
    }

    //we need to somehow delete the existing group in the map object and load the right group
    map.removeObject(currentgroup);
    currentgroup = groupfun;
    currenticon = funmark;
    map.addObject(currentgroup);
    addMarkerToGroup(groupfun, { lat: 53.526296, lng: -113.525600 },
      '<div><a>Location:(*Sam load the lat/long from our database)</a>');
    return false;
}
