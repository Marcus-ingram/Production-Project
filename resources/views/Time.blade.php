@extends('layouts.app')

@section('content')
<?php 
$dateTime = array(); // sets $dateTime to an array
$name = array(); // sets $name to an aaray
$images = array(); // sets $images to an aaray
?>
<h2>Mobile 1</h2>
@foreach ($folder as $folders) <!-- for every image in folder place it into folders -->
 <?php
     $exif=exif_read_data('images/'.$folders->Image, 0, true); //getting the image from the folder and extracting the exif data
      
     array_push($images, $exif); //pushes the Exif data extracted into an array. Each image will have a different section in this array
     
if (@array_key_exists('GPS', $exif)) // If the Exif data has GPS corrdinates do the following
     {
         array_push($dateTime, $exif['IFD0']['DateTime']);//Push the dat and time into this array
         array_push($name, $exif['FILE']['FileName']);// Push the file name into this array
     }
     else // If the Exif data doesnt have gps coordinates do nothing
     {
     }
          ?>
                
@endforeach
 <table style="width:100%;height:100px;text-align:center;margin:auto;border-collapse: collapse;"> <!-- creates a table with specifics. making the width 100% off the page, aligning the text centre -->
  <tr style="height:100px;"> <!-- height of the table sections -->

<?php 
sort($dateTime); // sorting the date and time array from oldest to newest 
$Date = count($dateTime); // adding the amount of dates into the varaible
for($i = 0; $i < $Date; $i++) {// for every date do the following until there is no dates left
    echo "<td>";
    echo "".$dateTime[$i]."<br>"; // echo the date and time
    foreach ($images as $image) // for every images put it into image
    {
    if ($image["IFD0"]["DateTime"] == $dateTime[$i])// if this image has the same date as the date and time been printed out do this
    {
        echo $image['FILE']['FileName'];// prints the file name if the dates match
    echo "<br>"; 
    };
}; 
echo "</td>";
echo "<td>»</td>";
}
?>

  </tr>
</table>

@endsection

@section('content1')<!-- this section is the same as the above but for the timeline for mobile 2 -->
<?php 
$dateTime1 = array(); 
$name1 = array();
$images1 = array();
?>
<h2>Mobile 2</h2>
@foreach ($folder2 as $folders2)
 <?php
     $exif=exif_read_data('images/'.$folders2->Image, 0, true); 
     array_push($images1, $exif);
     
if (@array_key_exists('GPS', $exif)) 
     {
         array_push($dateTime1, $exif['IFD0']['DateTime']);
         array_push($name1, $exif['FILE']['FileName']);
     }
     else
     {
     }
          ?>
                
@endforeach
 <table style="width:100%;height:100px;text-align:center;margin:auto;border-collapse: collapse;">
  <tr style="height:100px;">

<?php 
sort($dateTime1);
$Date = count($dateTime1);
for($i = 0; $i < $Date; $i++) {
    echo "<td>";
    echo "".$dateTime1[$i]."<br>";
    foreach ($images1 as $image1)
    {
    if ($image1["IFD0"]["DateTime"] == $dateTime1[$i])
    {
        echo $image1['FILE']['FileName'];
    echo "<br>"; 
    };
}; 
echo "</td>";
echo "<td>»</td>";
}
?>


  </tr>
</table>



@endsection
