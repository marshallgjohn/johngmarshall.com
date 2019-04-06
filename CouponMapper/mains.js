var map;
var customMarkers = [];
var markers = [];
var infowindow;
var searchBox;
var legend;
var infoWindowOpen;



$(document).ready(function (){
$.get("includes/pullMarker.inc.php", {}, function(result) {
     //alert(result);
    let arr = result.split("~");
  for(var i = 0; i < arr.length ; i++)
  {
    let arr2 = arr[i].split("|");
    if (arr2[3].length > 5) {
      addMarker({lat: parseFloat(arr2[0]), lng: parseFloat(arr2[1])},arr2[2],arr2[3]);
    }
  }
  });
});







initMap();
initModal();




function initMap() {
  
    //Creates marker center at Arlington TX, street level
    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 32.7357, lng: -97.1081},
    zoom: 15
  });


    //EventListener to create markers
    $("#buttonMarker").click(function() {

        //Gets all information of markers from user form
        let id = (parseFloat($("#latText").val())+parseFloat($("#lngText").val()));
        let location = {lat: parseFloat($("#latText").val()),lng: parseFloat($("#lngText").val())};
        let couponText = $("#couponText").val();
        let date = $("#dateText").val().slice(5);
        let description = $("#descText").val();
        let name = $("#nameText").val();
        let address = $("#addressText").val();

        //Checks to see if marker already created and if is just adds details to infowindow on screen
        if(!customMarkers.some(x => x[0].get('id') === (id))){
          //Adds marker on map
          if(address.length > 5) {
          addMarker(location,
                    name,
                    address);
          $.post('includes/pushMarker.inc.php',{
            lat: parseFloat($("#latText").val()),
            lng: parseFloat($("#lngText").val()),
            nameT: name,
            addressT: address,
            couponT: couponText,
            descT: description,
            dateT: date
          });
        }


          //Adds item to custom markers legend
          //addItemToList(name, address,"legend-content",id);

          infoWindowOpen = false;
        }
        else
        {
          //Adds item to infowindow if marker already created
          if(infoWindowOpen) {

            addDetailsToList(description, couponText, date,id);

            $.post(('includes/postInfo.inc.php'),{
              dateT: date,
              couponT: couponText,
              descT:description,
              lat: parseFloat($("#latText").val())
          });


          }else {
            alert("You already have a marker at this location. Please select it to add another event to the list!");
          }
          
        }

    });

    //Clears marker from screen
    $("#buttonReset").click(function() {
      clearAllMarkers(markers);
    })


    //Puts legend on the map
    legend = $('#legend')[0];
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);

    //Creates search box to look for businesses
    searchbox(map);

    
}

//Init for modal window aka help menu
function initModal()
{

  //When click button opens window
  $("#buttonModal").click(function () {
    $(".modal").css("display","block");
  });

  //When click X closes window
  $("close").click(function() {
    $(".modal").css("display","block");
  });

  //Waits for click outside of help window and closes it
  $(window).click(function() {
    if (event.target == modal) {
      $(".modal").css("display","none");
    }
  });

}


function searchbox (map) {
    
        // Create the search box and link it to the UI element.
        var input = $('#pac-input')[0];
        var searchBox = new google.maps.places.SearchBox(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });


        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers = clearAllMarkers(markers);

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            //Sets up icon
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            var marker = new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name + "\n" + place.formatted_address,
                position: place.geometry.location
              })


            //Adds marker to searchmarker arr for all search results
            markers.push(marker);
            
            //When you click a marker it auto-fills the form on the right
            marker.addListener('click', function() {
                    $("#nameText").val(place.name)
                    $("#addressText").val(place.formatted_address);
                    $("#latText").val(place.geometry.location.toString().split(",")[0].slice(1));
                    $("#lngText").val(place.geometry.location.toString().split(",")[1].slice(1,-1));
                  });


            //When marker is dbl clicked it centers and zooms in on it
            marker.addListener('dblclick', function() {
              map.setCenter(place.geometry.location);
              map.setZoom(15);
            });

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      
}


//Clears all markers from map from given array
function clearAllMarkers(markers) {
  markers.forEach(function(marker) {
      marker.setMap(null);
    }
    
  );
  return markers = [];
}

//
// Adds marker to table w/ clickable event description event
//
function addMarker (location,name,address) {



  //Creates marker 
    var marker = new google.maps.Marker({
      position: location, 
      title: name,
      id: (location.lat+location.lng),
      map});


        addItemToList(name,address,"legend-content",marker.get('id'));



    //Init for infowindow
    var infowindow = new google.maps.InfoWindow({content: 
      "<div class='infowindow'>"+ name
      +"<br/><ul id=" + marker.get('id') + ">"
      +"</ul>"
      + "</div>"});


    customMarkers.push([marker, infowindow]);

    //Adds listener to delete marker and zoom in on marker
    marker.addListener('rightclick', function () {
      $.get('includes/deleteMarker.inc.php',{lat: marker.position.lat});
      removeItemFromList(marker.get('id'));
      marker.setMap(null);
        customMarkers = customMarkers.filter(function(x) {
          x[0] == marker.get('id');
        });
  });


    marker.addListener('dblclick', function() {
      map.setCenter(location);
      map.setZoom(15);
  });
  marker.addListener('click', function()
  {
    infoWindowOpen = true;
    infowindow.open(map,marker);
    let ul = document.getElementById(marker.get('id'));

    if ($(ul).length>= 1 && ul.nodeName =="UL") {
      while (ul.firstChild)
        ul.removeChild(ul.firstChild);
    }

    $.get("includes/pullInfo.inc.php", {lat: marker.position.lat, lng: marker.position.lng}, function(result) {
      let arr = result.split("~");
      for(let element = 0; element < arr.length -1; element++)
      {
        
       let arr2 = arr[element].split("|");
       addDetailsToList(arr2[4],arr2[2],arr2[3],marker.get('id'));
    
      };
    });



    infowindow.addListener("closeclick", function() {    
      infoWindowOpen = false;
    });
    
    $("#latText").val(location.lat);
    $("#lngText").val(location.lng);
    //$("#dateText").val(date);
    $("#nameText").val(name);
    $("#addressText").val(address);
  });

}
    




//Used to add name/addy to current markers legends
function addItemToList(name,address,element_id,marker_id) {
  //alert(marker_id);
  if(isNaN(marker_id)) {return;}

  let ul = document.getElementById(element_id);
  let li = document.createElement("li");
  li.setAttribute("id",marker_id);
  

  li.appendChild(document.createTextNode(name +" (" + address + ")"));
  ul.appendChild(li);
}


function removeItemFromList (id)
{
  let ul = document.getElementById("legend-content");
  ul.removeChild(document.getElementById(id));

}

//add events as a <details> to infowindows
function addDetailsToList(desc,coupon,date,id) {
  //Creates unordered list to hold all <details> events
  let ul = document.getElementById(id);
  let li = document.createElement("li");
  li.className = "markerEvents";
  let details = document.createElement("details");
  let summary = document.createElement("summary");

  //Button used to delete <details> events if needed
  let button = document.createElement("BUTTON");

  

  //Adds title to <Details>
  summary.appendChild(document.createTextNode(date));
  details.appendChild(summary);

  //Adds text to details
  details.appendChild(document.createTextNode("Coupon(s) Used: " + coupon));
  details.appendChild(document.createElement("br"));
  details.appendChild(document.createTextNode("Description: " + desc));
  details.appendChild(document.createElement("br"));

  //adds button to details, sets text, and creates listener to delete li from ul
  details.appendChild(button);
  button.innerText = "Delete Event";
  button.addEventListener('click', function() {

    $.post('includes/deleteInfo.inc.php',{mID: id, dateT: date}, function(result) {
      //alert(result);
    });

    ul.removeChild(li);
  });
  //Add details to ul and li to ul
  li.appendChild(details);
  
  ul.appendChild(li);
 
}



