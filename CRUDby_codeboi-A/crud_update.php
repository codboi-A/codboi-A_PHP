<?php
include("connect.php");

 if(isset($_POST)&& !empty($_POST)):
    

        $id=$_GET['id'];
  
        $Namee=$_POST['name'];
        $Emaill=$_POST['mail'];
        $Numberr=$_POST['number'];

        //image
        $file = $_FILES['image'];
        $fileName=$_FILES=$file['name'];
        $fileTmpname=$_FILES=$file['tmp_name'];
        $fileSize=$_FILES=$file['size'];
        $fileError=$_FILES=$file['error'];
        $fileType=$_FILES=$file['type'];
        $fileExt=explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));
        $allowed=array('jpg','jpeg','png');
        
                 $fileNameNew= uniqid('',true).".".$fileActualExt;
                 $fileDestination='load/'.$fileNameNew;
                 move_uploaded_file($fileTmpname,$fileDestination);
        
        
        
        
        
        
      
        
        

        $sql="UPDATE emp SET namee='$Namee', emaill='$Emaill', numberr='$Numberr', imagee='$fileNameNew' WHERE id='$id'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
          echo "Data entered successfully";
          header("location:crud_Show.php");
        }
        else
        {
        die(mysqli_error($con));
      }
      
      
  endif;

?>
<html>
  <head><link rel="stylesheet" href="style1.css"></head>
    <body>
<form method="POST" name="form1" enctype="multipart/form-data">
  <div class="main">

  <div class="Heading">
	<h1>Updation Form<hr style="width:50%;margin-left:25%; margin-right:25%;" ></h1>
</div>
    


<?php
$id=$_GET['id'];
$row="SELECT * from emp where id=$id";
$result=mysqli_query($con,$row)or die("Error:".mysqli_error($con));
$row=mysqli_fetch_array($result);
?>


<!--Employee name-->
<div>
  <input name="id" type="hidden" value="<?php echo $row['id']?>">
  <div style="padding:20px;">
  
      <b>Employee name:</b><br>
      <input type="text" name="name" id="name" value="<?php echo $row['namee']?>" >
    
  </div>
  <!--Address-->
  <div style="padding:20px;" >
    <b>Address:</b><br>
    <textarea type="comment" rows="5" cols="40" name="address" id="address"></textarea>
    
  </div>
  <!--Phone number-->
  <div style="padding:20px;">
    <b>Phone Number:</b><br>
    <input type="text" name="number" value="<?php echo $row['numberr']?>">
    
  </div>
  <!--Dob-->
  <div style="padding:20px;">
    <b>Dob:</b>
    <br>
    <input type="date" >
  </div>
  <!--Gender-->
  <div style="padding:20px;">
    <b>Gender:</b><br>
    Male<input type="radio" name="gender" id="male">
    Female<input type="radio" name="gender" id="female">
    
  </div>
  <!--Password-->
  <div style="padding:20px;">
    <b>Password:</b><br><input type="password" name="pass">
    
  </div>
<br>
  <div style="padding:20px;">
    <b>Retype Password:</b><br><input type="password" name="repass">
    
  </div>
<!--Language-->
  <div style="padding:20px;">
    <b>Language</b><br>
    <select>
      <option>
        English
      </option>
      <option>
        Hindi
      </option>
      <option>
        Malayalam
      </option>
    </select>
  </div>
      <div style="padding:20px;">
        <b>Email</b<><br>
        <input type="email" name="mail" id="mail" placeholder="abc@gmail.com" value="<?php echo $row['emaill']?>" >

      </div>

      Upload an Image:
            <br>
  <input type="file" name="image" accept="image/png, image/jpeg" onchange="readURL(this)" >

                <img src="<?php echo $Img_src; ?>" alt="" id="img" style='height:100px;'>
                
                <br><br>
                <script>
  function readURL(input)
   {
    if (input.files && input.files[0])
     {
    
      var reader = new FileReader();
      reader.onload = function (e) { 
        document.querySelector("#img").setAttribute("src",e.target.result);
      }

      reader.readAsDataURL(input.files[0]); 
    }
  }
  </script>
  </div>
      <br >
      <div style="margin-left:150px;">
        <button type="submit" name="submit">Submit</button>
      </div>
    

  </div>
  <div class="view">
<button><a href="crud_Show.php">Go back</a></button>
</div>
  </form>


</body>
</html>
