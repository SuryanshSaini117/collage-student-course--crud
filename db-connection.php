<?php
$conn = mysqli_connect("localhost","root","","collage");
if($conn==false){
    die("connection error:". mysqli_connect_error());
}
?>