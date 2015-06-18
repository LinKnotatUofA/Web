
function main() {
    // by defualt page will load all fun parties
    map.addObject(currentgroup);
    display_fun();
    //setupown();
}



function display_fun() {
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
      '<div><a>Ultimate Frisbee</a>' +
      '</div><div >@ Quad<br>Today @ 3:00 PM</div>');
    return false;
}
function display_study() {
        if (edit == true) {
            removeClickListener();
            edit = false;
        }

        map.removeObject(currentgroup);
        currentgroup = groupstudy;
        currenticon = studymark;
        map.addObject(currentgroup);
        addMarkerToGroup(currentgroup, { lat: 53.528200, lng: -113.525439 },
      '<div ><a>Stats 151 Study Group</a>' +
      '</div><div >@ CCIS L2-220<br>Tommrow @ 12:00 AM</div>');
        return false;
    }
function display_custom() {
        if (edit == true) {
            removeClickListener();
            edit = false;
        }
        var type = "custom";
        map.removeObject(currentgroup);
        currentgroup = groupcustom;
        currenticon = custommark;
        map.addObject(currentgroup);
        addMarkerToGroup(currentgroup, { lat: 53.523171, lng: -113.526031 },
      '<div ><a>Workout Session</a>' +
      '</div><div >@ PAW<br>Today @ 4:00 PM</div>');
        return false;
    }
 function display_own() {
        if (edit == false) {

            setUpClickListener();
            edit = true;
        }
        return false;
    }