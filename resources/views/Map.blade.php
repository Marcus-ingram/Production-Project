@extends('layouts.app')

@section('content')


<div id='map' style='width: 700px; height: 500px;'></div>

<script>
mapboxgl.accessToken =  'pk.eyJ1IjoiY3VzMjAiLCJhIjoiY2s5dTU4dXB3MHE5YzNscGNrb2wyZnlyZCJ9.zc3TjBiJlKnr2UrfZfQvfg'; // Unique access token to allow the MapBox map be imported and used

var map = new mapboxgl.Map({ // creating a new map with var (variable)
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11', //deciding the type of map
center: [-1.5913, 53.8282], // setting the center of the map to leeds
zoom: 10 //zooming the map in by 10
});
map.addControl(new mapboxgl.NavigationControl()); //  adding zoom buttons to the map
</script>
@foreach($folder as $folders) <!-- for every image in folder place it into folders -->
<?php


     $exif=exif_read_data('images/'.$folders->Image, 0, true); //getting the image from the folder and extracting the exif data
     

if (@array_key_exists('GPS', $exif)) // checking if the Exif data has GPS locations if it does do the following
     {
          $Latitude_ref = $exif['GPS']['GPSLatitudeRef'];
          $Latitude = $exif['GPS']['GPSLatitude']; //sets a variable equal to the Latitudeidu
          $Longitude_ref = $exif['GPS']['GPSLongitudeRef'];
          $Longitude = $exif['GPS']['GPSLongitude']; //sets the variable for the Longitude 
          $camera = $exif["IFD0"]["Model"]; // sets the varable to the phone model
          $software = $exif["IFD0"]["Software"]; //sets the variable to the phones software
          $name = $exif["FILE"]["FileName"]; //sets the variale to the images file name
          $make = $exif["IFD0"]["Make"]; //sets the varible to the phone maker
          $model = $exif["IFD0"]["Model"];
          
          $Latitude1 = explode('/', $Latitude[0]); //Splits the array so theres no / anymore
          $Latitude2 = explode('/', $Latitude[1]); //Splits the array so theres no / anymore
          $Latitude3 = explode('/', $Latitude[2]);//Splits the array so theres no / anymore
          
          $Longitude1 = explode('/', $Longitude[0]);//Splits the array so theres no / anymore
          $Longitude2 = explode('/', $Longitude[1]);//Splits the array so theres no / anymore
          $Longitude3 = explode('/', $Longitude[2]);//Splits the array so theres no / anymore
          
          $LatitudeDegrees = $Latitude1[0] / $Latitude1[1]; // divides the first section of the array by the second section
          $LatitudeMinutes = $Latitude2[0] / $Latitude2[1]; // divides the first section of the array by the second section
          $LatitudeSeconds = $Latitude3[0] / $Latitude3[1];// divides the first section of the array by the second section
          
          $LongitudeDegrees = $Longitude1[0] / $Longitude1[1];// divides the first section of the array by the second section
          $LongitudeMinutes = $Longitude2[0] / $Longitude2[1];// divides the first section of the array by the second section
          $LongitudeSeconds = $Longitude3[0] / $Longitude3[1];// divides the first section of the array by the second section
          
          
          $gps_lat = $LatitudeDegrees+((($LatitudeMinutes*60)+($LatitudeSeconds))/3600); // this equation is as follows: LatitudeMinutes*60+LatitudeSeconds/3600+LatidudeDegrees.
          $gps_lon = $LongitudeDegrees+((($LongitudeMinutes*60)+($LongitudeSeconds))/3600); // this equation is as follows: LongitudeMinutes*60+LongitudeSeconds/3600+LongitudeDegrees.
         
       
      }

          ?>


<script>

var info1 = new mapboxgl.Popup({ offset: 25 }).setText( // creates the popup for the marker 
"<?php echo $name?>" // sets the text of the popup to the images name
);
var marker = new mapboxgl.Marker( //creates the marker
{ }
)

.setLngLat([-<?php echo $gps_lon?>, <?php echo $gps_lat?>]) // sets the longitude and latitude of the marker
.setPopup(info1)// sets the popup tag 
.addTo(map);//adds it all the the map



</script>
@endforeach 

@foreach($folder2 as $folders2) <!-- for every image in folder2 place it into folders2 -->
<?php


     $exif=exif_read_data('images/'.$folders2->Image, 0, true);//getting the image from the folder and extracting the exif data
     
 
    

if (@array_key_exists('GPS', $exif)) // checking if the Exif data has GPS locations if it does do the following
     {
          $Latitude_ref = $exif['GPS']['GPSLatitudeRef'];
          $Latitude = $exif['GPS']['GPSLatitude']; //sets a variable equal to the Latitude
          $Longitude_ref = $exif['GPS']['GPSLongitudeRef'];
          $Longitude = $exif['GPS']['GPSLongitude']; //sets the variable for the Longitude
          $camera = $exif["IFD0"]["Model"];// sets the varable to the phone model
          $software = $exif["IFD0"]["Software"];//sets the variable to the phones software
          $name  = $exif['FILE']['FileName']; //sets the variale to the images file name
          
          $Latitude1 = explode('/', $Latitude[0]); //Splits the array so theres no / anymore
          $Latitude2 = explode('/', $Latitude[1]);//Splits the array so theres no / anymore
          $Latitude3 = explode('/', $Latitude[2]);//Splits the array so theres no / anymore
          
          $Longitude1 = explode('/', $Longitude[0]);//Splits the array so theres no / anymore
          $Longitude2 = explode('/', $Longitude[1]);//Splits the array so theres no / anymore
          $Longitude3 = explode('/', $Longitude[2]);//Splits the array so theres no / anymore
          
          $LatitudeDegrees = $Latitude1[0] / $Latitude1[1]; // divides the first section of the array by the second section
          $LatitudeMinutes = $Latitude2[0] / $Latitude2[1];// divides the first section of the array by the second section
          $LatitudeSeconds = $Latitude3[0] / $Latitude3[1];// divides the first section of the array by the second section
          
          $LongitudeDegrees = $Longitude1[0] / $Longitude1[1];// divides the first section of the array by the second section
          $LongitudeMinutes = $Longitude2[0] / $Longitude2[1];// divides the first section of the array by the second section
          $LongitudeSeconds = $Longitude3[0] / $Longitude3[1];// divides the first section of the array by the second section
          
          $gps_lati = $LatitudeDegrees+((($LatitudeMinutes*60)+($LatitudeSeconds))/3600);// this equation is as follows: LatitudeMinutes*60+LatitudeSeconds/3600+LatidudeDegrees.  
          $gps_long = $LongitudeDegrees+((($LongitudeMinutes*60)+($LongitudeSeconds))/3600); // this equation is as follows: LongitudeMinutes*60+LongitudeSeconds/3600+LongitudeDegrees.
           
        

      }

          ?>

<script>
var lng = "<?php echo $gps_long?>";
var lati = "<?php echo $gps_lati?>";

var info = new mapboxgl.Popup({ offset: 25 }).setText(// creates the popup for the marker 
"<?php echo $name?>"// sets the text of the popup to the images name
);
var marker = new mapboxgl.Marker({color: 'red'})//creates the marker and sets it to red so its different from mobile 1

.setLngLat([-lng,lati]) // sets the longitude and latitude of the marker
.setPopup(info)// sets the popup tag 
.addTo(map);//adds it all the the map

</script>

@endforeach


@endsection
