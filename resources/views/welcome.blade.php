@extends('layouts.app')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css" rel="stylesheet"> <!-- setting a stylesheet for the form -->


<form method="POST" action="/image"  enctype="multipart/form-data"> <!--creating a from -->
{{ csrf_field() }}

    Select image to upload:

    <input type="file" name="Image" id="fileToUpload" > 
    Please enter what mobile this image from (please enter 1 or 2): 
    <input type="number" name="folder" > <!-- allowing files to be uploaded -->
     
  </select>
 
    <input type="submit" value="Upload Image" name="submit">

</form>

@endsection
@section('content1')
<h2> Example of Exif data been Extracted and what the output look like </h2>
<h2>  </h2>
        <?php
     $exif=exif_read_data('https://raw.githubusercontent.com/drewnoakes/metadata-extractor/master/Tests/Data/withExifAndIptc.jpg', 0, true);   
 if(!$exif || $exif['GPS']['GPSLatitude'] == '') 
     {
          echo "No GPS DATA in EXIF METADATA";
     }
          $Latitude_ref = $exif['GPS']['GPSLatitudeRef'];
          $Latitude = $exif['GPS']['GPSLatitude']; //sets a variable equal to the Latitudeidueitude
          $Longitude_ref = $exif['GPS']['GPSLongitudeRef'];
          $Longitude = $exif['GPS']['GPSLongitude']; //sets the variable for the Longitudegitude 
          $camera = $exif["IFD0"]["Model"];
          $software = $exif["IFD0"]["Software"];
          
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
          ?>




@endsection