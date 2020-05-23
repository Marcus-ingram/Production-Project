@extends('layouts.app')

@section('content')
<h2>Mobile 1</h2>
@foreach ($folder as $folders) <!-- for every image in folder place it into folders
 -->  
<table class="table table-striped" > <!-- creates a table for the library -->
  <tr>
    <th>Image</th> <!-- sets a header to Image -->
    <th></th>
    <th>Exif Data</th> <!--  sets another header to Exif data -->
  </tr>

<th>
<li style="width:80px;display:inline-block;margin:5px 0px"> <!-- Sets the width and margin of the image -->
<img src="{{url('images/'.$folders->Image)}}" width="250" height="250"/> <!-- Imports the image from folders -->
</li>
</th>
<th>
</th>
<th>
 <?php 
     $exif=exif_read_data('images/'.$folders->Image, 0, true); //getting the image from the folder and extracting the exif data  

if (@array_key_exists('GPS', $exif)) // checking if the Exif data has GPS locations if it does do the following
     {
          $Latitude_ref = $exif['GPS']['GPSLatitudeRef'];
          $Latitude = $exif['GPS']['GPSLatitude']; //sets the $Latitude variable equal to the Latitude
          $Longitude_ref = $exif['GPS']['GPSLongitudeRef'];
          $Longitude = $exif['GPS']['GPSLongitude']; //sets the $longitude variable for the Longitude 
          $camera = $exif["IFD0"]["Model"]; // sets the $camera variable for the Camera model
          $software = $exif["IFD0"]["Software"]; // sets the variable to the mobile software 
          $time = $exif["IFD0"]["DateTime"]; // sets th variable to the date and time when the image was taken
          
          $Latitude1 = explode('/', $Latitude[0]); //Splits the array so theres no / anymore
          $Latitude2 = explode('/', $Latitude[1]);//Splits the array so theres no / anymore
          $Latitude3 = explode('/', $Latitude[2]);//Splits the array so theres no / anymore
          
          $Longitude1 = explode('/', $Longitude[0]);//Splits the array so theres no / anymore
          $Longitude2 = explode('/', $Longitude[1]);//Splits the array so theres no / anymore
          $Longitude3 = explode('/', $Longitude[2]);//Splits the array so theres no / anymore
          
          

          $LatitudeDegrees = $Latitude1[0] / $Latitude1[1]; // divides the first section of the array by the second section
          $LatitudeMinutes = $Latitude2[0] / $Latitude2[1];// divides the first section of the array by the second section
          $LatitudeSeconds = $Latitude3[0] / $Latitude3[1];// divides the first section of the array by the second section
          
          $gps_lat = $LatitudeDegrees+((($LatitudeMinutes*60)+($LatitudeSeconds))/3600);  // this equation is as follows: LatitudeMinutes*60+LatitudeSeconds/3600+LatidudeDegrees.
          
         
          
          $LongitudeDegrees = $Longitude1[0] / $Longitude1[1];// divides the first section of the array by the second section
          $LongitudeMinutes = $Longitude2[0] / $Longitude2[1];// divides the first section of the array by the second section
          $LongitudeSeconds = $Longitude3[0] / $Longitude3[1];// divides the first section of the array by the second section
          
          
          $gps_lon = $LongitudeDegrees+((($LongitudeMinutes*60)+($LongitudeSeconds))/3600); // this equation is as follows: LongitudeMinutes*60+LongitudeSeconds/3600+LongitudeDegrees.
          
           echo " <br>";
            echo " <br>";
             echo " <br>";
          echo "Compass point: ";
          echo $Latitude_ref; //printing out latidude direction
          echo " <br>";
           echo "Latitude: "; 
          echo $gps_lat; //printing out the latidude coordinates
          echo " <br>";
          echo "Compass point: ";
          echo $Longitude_ref; //printing out the longitude direction
          echo " <br>";
           echo "Longitude: ";
          echo $gps_lon; //printing out the longitude coordinates
          echo "<br> ";
           echo "Camera: ";
          echo $camera; // printing out the camera 
          echo " <br>";
           echo "Software ";
          echo $software; //printing out the software
          echo "<br> ";
          echo $time; //printing out the time
     }
     else
     {
         echo "No GPS DATA in EXIF METADATA"; // if the image doesnt have GPS coordinates print this
     }
          
          ?>
</th>
@endforeach
</table>
@endsection

@section('content1') <!-- this section is set out the same as the above section but for mobile 2 -->
<h2>Mobile 2</h2>

@foreach ($folder2 as $folders2)
<table class="table table-striped" >
  <tr>
    <th>Image</th>
    <th></th>
    <th>Exif Data</th>
  </tr>
  
<th>
<li style="width:80px;display:inline-block;margin:5px 0px">
<img src="{{url('images/'.$folders2->Image)}}" width="250" height="250"/> 
</li>
</th>
<th></th>
<th>
 <?php
     $exif=exif_read_data('images/'.$folders2->Image, 0, true);   
    

if (@array_key_exists('GPS', $exif)) 
     {
          $Latitude_ref = $exif['GPS']['GPSLatitudeRef'];
          $Latitude = $exif['GPS']['GPSLatitude']; //sets a variable equal to the Latitudeidueitude
          $Longitude_ref = $exif['GPS']['GPSLongitudeRef'];
          $Longitude = $exif['GPS']['GPSLongitude']; //sets the variable for the Longitudegitude 
          
          $camera = $exif["IFD0"]["Model"];
          $software = $exif["IFD0"]["Software"];
          $time = $exif["IFD0"]["DateTime"];
          
          $Latitude1 = explode('/', $Latitude[0]); //Splits the array so theres no / anymore
          $Latitude2 = explode('/', $Latitude[1]);
          $Latitude3 = explode('/', $Latitude[2]);
          
          $Longitude1 = explode('/', $Longitude[0]);
          $Longitude2 = explode('/', $Longitude[1]);
          $Longitude3 = explode('/', $Longitude[2]);
          
          $LatitudeDegrees = $Latitude1[0] / $Latitude1[1]; 
          $LatitudeMinutes = $Latitude2[0] / $Latitude2[1];
          $LatitudeSeconds = $Latitude3[0] / $Latitude3[1];
          
          $LongitudeDegrees = $Longitude1[0] / $Longitude1[1];
          $LongitudeMinutes = $Longitude2[0] / $Longitude2[1];
          $LongitudeSeconds = $Longitude3[0] / $Longitude3[1];
          
          $gps_lat = $LatitudeDegrees+((($LatitudeMinutes*60)+($LatitudeSeconds))/3600);  
          $gps_lon = $LongitudeDegrees+((($LongitudeMinutes*60)+($LongitudeSeconds))/3600); 
           
           echo " <br>";
            echo " <br>";
             echo " <br>";
          echo "Compass point: ";
          echo $Latitude_ref;
          echo " <br>";
           echo "Latitude: ";
          echo $gps_lat;
          echo " <br>";
          echo "Compass point: ";
          echo $Longitude_ref;
          echo " <br>";
           echo "Longitude: ";
          echo $gps_lon;
          echo "<br> ";
           echo "Camera: ";
          echo $camera;
          echo " <br>";
           echo "Software ";
          echo $software;
          echo "<br> ";
          echo $time;
     }
     else
     {
         echo "No GPS DATA in EXIF METADATA";
     }
          
          ?>
</th>
</table>
@endforeach
@endsection