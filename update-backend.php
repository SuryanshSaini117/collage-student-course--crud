<?php
include_once"db-connection.php";
$id = $_GET['id'];
// print_r($id);die();
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $phone_no = $_POST['phone_no'];
    $gender= $_POST['gender'];
    $course = $_POST['course'];
    $message = $_POST['message'];
    $file = $_FILES['file']['name'];
    // print_r($_FILES['file']['name']);die();
    $tempname = $_FILES['file']['tmp_name'];
    $folder = 'images/'.$file;

    //  if(move_uploaded_file($tempname, $folder)){
    //     echo "<h2> file uploaded successfully</h2>";
    // }else{
    //     echo "<h2> file not uploaded</h2>";
    // }

    // validation---------------------------------------------------
     if (is_null($name) || $name == '') 
        {
        // print_r("name required");die();
        $_SESSION['err_message'] = "Name Required.";
            header("location: update.php");
        }
        elseif(strlen($name) < 2 ||strlen($name) >20 ){
            // print_r("enter valid name");die();
            $_SESSION['err_message'] = "Enter Valid Name.";
            header("location: update.php");

        }
        elseif (!preg_match("/^[a-zA-Z ]*$/", $name)){
            //  print_r("Only letters and white space allowed in name.");die(); 
            $_SESSION['err_message'] = "Only charecters are allowed in name.";
            header("location: update.php");
        }
        elseif (is_null($father_name) || $father_name == '') 
        {
        // print_r("name required");die();
        $_SESSION['err_message'] = "Name Required.";
            header("location: update.php");
        }
        elseif(strlen($father_name) < 2 ||strlen($father_name) >20 ){
            // print_r("enter valid name");die();
            $_SESSION['err_message'] = "Enter Valid Name.";
            header("location: update.php");

        }
        elseif (!preg_match("/^[a-zA-Z ]*$/", $father_name)){
            //  print_r("Only letters and white space allowed in name.");die(); 
            $_SESSION['err_message'] = "Only charecters are allowed in name.";
            header("location: update.php");
        }
        elseif(strlen($phone) < 10 ||strlen($phone) >12 ){
            // print_r("enter valid phone no");die();
            $_SESSION['err_message'] = "enter valid phone number.";
            header("location: update.php");
        }
        elseif (!preg_match("/^\+?[0-9\s\-\(\)]{7,20}$/", $phone)){
            //  print_r("Only numbers a allowed in phone number.");die(); 
            $_SESSION['err_message'] = "enter valid phone no";
            header("location: update.php");
        }
        elseif (is_null($message) || $message == '') 
        {
            // print_r("message required");die();
            $_SESSION['err_message'] = "message required";
            header("location: update.php");
        }
        elseif(strlen($message) < 2 ||strlen($message) >50 ){
            // print_r("enter message minimum 100 words");die();
            $_SESSION['err_message'] = "enter message minimum 100 words";
            header("location: update.php");
        }
        elseif (!preg_match("/^[a-zA-Z ]*$/", $message)){
            //  print_r("Only letters and white space allowed in message.");die(); 
            $_SESSION['err_message'] = "Only letters and white space allowed in message";
            header("location: update.php");
        }
        elseif (move_uploaded_file($tempname, $folder)){
            //  print_r("Only letters and white space allowed in message.");die(); 
            $_SESSION['err_message'] = "file not uploaded";
            header("location: add.php");
        }
        
        else{   
            // print_r($name);die();
            // print_r($mushroom);die();
            $data=mysqli_query($conn,"UPDATE student SET name='$name',father_name='$father_name',phone_no='$phone_no',gender='$gender',course='$course',message='$message',file='$file'WHERE id = '$id'");
            // $data= mysqli_query($conn,"INSERT INTO student (name,father_name,phone_no,gender,course,message,file) VALUE ('$name','$father_name','$phone_no','$gender','$course','$message','$file')");
            $_SESSION['success'] = "Your data submited successfully.";
            header("location:index.php");
        }
  

    //  print_r($data);die();
        // header("location:index.php"); 
}
?>