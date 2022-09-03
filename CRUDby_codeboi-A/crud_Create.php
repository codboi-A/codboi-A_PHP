<?php
include 'connect.php';

if(isset($_POST) && !empty ($_POST))
{
if(!$nameErr && !$addressErr && !$emailErr && !$genderErr && !$mobileErr && !$passErr && !$repassErr && !$fileErr && $passOk)
{


  $name=$_POST['name'];
  $email=$_POST['mail'];
  $pNumber=$_POST['number'];  

 
  $file = $_FILES['image'];
    $fileName=$file['name'];
    $fileTmpname=$_FILES=$file['tmp_name'];
    $fileSize=$_FILES=$file['size'];
    $fileError=$_FILES=$file['error'];
    $fileType=$_FILES=$file['type'];
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));


    
             $fileNameNew= uniqid('',true).".".$fileActualExt;
             $fileDestination='load/'.$fileNameNew;
             move_uploaded_file($fileTmpname,$fileDestination);
          
  $sql="INSERT INTO emp(namee,emaill,numberr,imagee) VALUES('$name','$email','$pNumber','$fileNameNew')";

  $result=mysqli_query($con,$sql);
  if($result)
  {
    echo "Data entered successfully";
  }
  else
  {
  die(mysqli_error($con));
}

}

}

?>