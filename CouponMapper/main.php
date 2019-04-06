<?php
include 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Coupon Clipper</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


  </head>
  <body>
        <div id="modal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                  
                  <h3>Hello and welcome to Coupon Marker!</h3>
                  <p> All you have to do to get started is search a place in the "Search Box" then
                      click the auto-filled place!
                      It will then load all of the locations for that business in the area.
                      Click the location you like and fill out the information for the location and what happened there!
                      Then press the "Add to Store To Map" button and you are all done.                    
                  </p>
                  <p>Click anywhere on the screen to exit this menu.</p>
                    <ul> <h4>Helpful tips</h4>
                        <li>
                            Left click on a marker will select its location and autofill it on the form to the right
                        </li>
                        <li>
                            Double click on a marker will bring you closer to the marker and center it on screen
                        </li>
                        <li>
                            Right click a marker you made to delete it
                        </li>
                        <li>
                            Use the "reset results" button to remove the business you originally searched for.
                        </li>
                        <li>
                            If you already created a marker for a location, click it to open the "Information window"
                            and fill out the form to the right and it will add a new event
                        </li>
                        <li>
                            You can remove these events with the button that shows up in the information window if needed!
                        </li>
                    </ul>
                </div>
              </div>
    <div id="content">
        <div id="map"></div>
        <div id="legend">
            <h2>Current Markers:</h2>
            <ul id="legend-content">
            </ul>

        </div>
        <div id="controls">
        <h1>Welcome to Coupon Marker!</h1> <button id="buttonModal"><i>i</i></button>
        
            <div id="searchBox">
                <h3>Please search the location that you went to! </h3>
                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                <button id="buttonReset">Reset Results</button>
            </div>

            <form id="markerCreator" name="marker-submit" onsubmit="return false">
                <label>Name </label><input id="nameText" placeholder="Name"  type="text" name="name" required/>
                <label>Address </label><input id="addressText" placeholder="Address"  type="text" name="address" required/>
                <label>Latitude: </label><input id="latText" placeholder="0"  type="text" name="lat" step="0.00001" required/>
                <label>Longitude: </label><input id="lngText" placeholder="0" type="number" name="lng" step="0.000000000000001" required/>
                <label>Date Visited: </label><input id="dateText" type="date" value="2019-04-01" name="date" required/>
                <label>Coupon(s) Used (Separate by commas): </label><input id="couponText" placeholder="$25 off $25" type="text" name="coupon" required/>
                <label>Description: </label><textarea rows="5" col="50" id="descText" placeholder="Description of any important events" type="text" name="desc"></textarea>
                <button  id="buttonMarker" name="marker-submit">Add Store To Map</button>
            </form>
        </div>
    </div>



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2kn0u1MznxXPe-e2yi0s-YvK2S-wuyFo&callback=initMap&libraries=places"
async defer> </script>
<script src="mains.js"></script>
  </body>
</html>