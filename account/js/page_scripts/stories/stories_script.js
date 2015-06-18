function main() {
    // by defualt page will load all written stories
    map.addObject(currentgroup);
    display_written();
}

function display_written() 
{
    if (edit == true) 
    {
        removeClickListener();
        edit = false;
    }
    //we need to somehow delete the existing group in the map object and load the right group
    map.removeObject(currentgroup);
    //curent group is not needed, use var objectarray = map.getObjects(); objectarray[0]

    currentgroup = groupwritten;
    currenticon = writtenmark;
    map.addObject(currentgroup);

    // this should really be done only once at the begining of the app, it will overlay another copy of the same event on top of the same location every time user switch to display_written mode
    addMarkerToGroup(currentgroup, { lat: 53.526296, lng: -113.525600 }, '<div ><a>Stats 151 Study Group</a>' + '</div><div >@ CCIS L2-220<br>Tommrow @ 12:00 AM</div>');
    return false;
}
function display_podcasts() 
{
    if (edit == true) 
    {
        removeClickListener();
        edit = false;
    }
    map.removeObject(currentgroup);
    currentgroup = grouppodcasts;
    currenticon = podcastsmark;
    map.addObject(currentgroup);
    addMarkerToGroup(currentgroup, { lat: 53.528200, lng: -113.525439 },
  '<div ><a>Stats 151 Study Group</a>' +
  '</div><div >@ CCIS L2-220<br>Tommrow @ 12:00 AM</div>');
    return false;
}
function display_video() 
{
    if (edit == true) 
    {
        removeClickListener();
        edit = false;
    }

    map.removeObject(currentgroup);
    currentgroup = groupvideo;
    currenticon = videomark;
    map.addObject(currentgroup);
    addMarkerToGroup(currentgroup, { lat: 53.523171, lng: -113.526031 },'<div><iframe width="560" height="315" src="//www.youtube.com/embed/VUfj9qom6_I" frameborder="0" allowfullscreen></iframe></div>');
    return false;
}

function display_pictures() 
{
    if (edit == true) 
    {
        removeClickListener();
        edit = false;
    }

    map.removeObject(currentgroup);
    currentgroup = grouppictures;
    currenticon = picturemark;
    map.addObject(currentgroup);
    addMarkerToGroup(currentgroup, { lat: 53.523171, lng: -113.526031 },
  '<div ><a>Workout Session</a>' +
  '</div><div >@ PAW<br>Today @ 4:00 PM</div>');
    return false;
}
function display_own() 
{
    if (edit == false)
    {
        setUpClickListener();
        edit = true;
    }
    return false;
}