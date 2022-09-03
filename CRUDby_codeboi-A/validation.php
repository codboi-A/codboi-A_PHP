<?php
include 'connect.php';


$nameErr=$addressErr=$emailErr=$genderErr=$mobileErr=$passErr=$repassErr=$fileErr=$passOk="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 
  if(empty($_POST["name"]))

  {
    $nameErr="Name is required!";
  }
else
{
  $Name=$_POST["name"];
  if(preg_match('@[0-9]@', $Name)==TRUE)
{
  $nameErr="Only alphabets are allowed!";
} 
}

//Password validation
if(empty($_POST["pass"]))

{
  $passErr="This field cannot be empty!";
}
else
{
  $pass=$_POST["pass"];
$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number    = preg_match('@[0-9]@', $pass);
$specialChars = preg_match('@[^\w]@', $pass);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) <8)
 {
    $passErr= "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
}
else
{
  $validPass=$pass;
    $passOk= "Strong password.";
}
}
if(empty($_POST["repass"]))

  {
    $repassErr="This field cannot be empty!";
  }
  else
  {
    $repass=$_POST["repass"];
    if($repass!=$validPass)
    {
      $repassErr="Passwords don't match";
    }
  }

  

//Checking Address
  if(empty($_POST["address"]))
  {
    $addressErr="Address is required!";
  }

  //Checking Email
  if(empty($_POST["mail"]))
  {
    $emailErr="Email Required!";
  
  }
  else
  {
    $email =($_POST["mail"]);
  

   if(!filter_var($email,FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid email format";
     }
    }
//Checking Gender
     if (empty($_POST["gender"])) 
     {
      $genderErr = "Please Specify a Gender!";
    }
     else
     {
      $gender = ($_POST["gender"]);
    }


//Checking number
if(empty($_POST['number']))
{
  $mobileErr = "mobile number is required";
}
else{
  $num = $_POST['number'];
  if(!preg_match('/^[0-9]{10}+$/',$num))
  {
      $mobileErr = "invalid Phone Number";
  }
  elseif ($num[0] != 6 && $num[0] != 7 && $num[0] != 8 && $num[0] != 9 ) {
      $mobileErr = "Mobile number not valid";
  }
  else{
      $num = $_POST['number'];
  }
  
}
// $num=$_POST["number"];
// if (empty($num)) {
//   $mobileErr = "Phone number is required";
// }
//  elseif((!preg_match('/^[0-9]{10}+$/',$num)) && ($num[0]!=6 || $num[0]!=7 || $num[0]!=8 || $num[0]!=9 )
//  {
//   $mobileErr = "Phone number not valid";
//  }
//  elseif($num[0]!=6 || $num[0]!=7 || $num[0]!=8 || $num[0]!=9 )
//  {
//   $mobileErr = "Phone number not valid";

//  }

//file size!
$file_extension = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));

    if (empty($_FILES["image"]["size"])) {
      $fileErr = "file not selected";
    }
  
    else if($file_extension != "png" && $file_extension != "jpg"){
      $fileErr = "Sorry, only JPG,PNG  files are allowed.";
    }
    else if($_FILES["image"]["size"] > 5000000) {
      $fileErr = "size is too large";
    }
    
    else{
     $fileErr = "";
    }
}







//Function to check datas in fields
    //  function test_input($data)
    //   {
    //   $data = trim($data);
    //   $data = stripslashes($data);
    //   $data = htmlspecialchars($data);
    //   return $data;
    // }

  

    
?>