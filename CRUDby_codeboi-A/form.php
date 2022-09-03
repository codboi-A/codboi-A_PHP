<?php
include 'validation.php';
include 'crud_Create.php';
?>


<!--HTML CODE-->
<html>
<head>
<title> Employee Details</title>
<link rel="stylesheet" href="style1.css">

</head>
<body>
  
  
  <div class="Heading">
	<h1>Employee Registration<hr style="width:50%;margin-left:25%; margin-right:25%;" ></h1>
</div>
 <div class="main">

<form method="POST" name="form0" enctype="multipart/form-data">
 
    
<div class="about">

<h3><a href="https://craft.co/codilar">About us</a></h3>
</div>

<!--Employee name-->
  <div style="padding:20px;">
  
      <b>Employee name:</b>
      <br>
      <input type="text" name="name" id="name">
    <span class="error">  <?php echo $nameErr;?></span>
  </div>
  <!--Address-->
  <div style="padding:20px;" >
    <label><b>Address:</b></label>
    <br>
    <textarea type="comment" rows="5" cols="40" name="address" id="address"></textarea>
    <span class="error"><?php echo $addressErr;?></span>
  </div>
  <!--Phone number-->
  <div style="padding:20px;">
    <label><b>Phone Number:</b></label>
    <br>
    <input type="text" name="number">
    <span class="error">  <?php echo $mobileErr;?></span>
  </div>
  <!--Dob-->
  <div style="padding:20px;">
    <label><b>Dob:</b></label>
    <br>
    <input type="date" >
  </div>
  <!--Gender-->
  <div style="padding:20px;">
    <label><b>Gender:</b></label>
    <br>
    Male<input type="radio" name="gender" id="male">
    Female<input type="radio" name="gender" id="female">
    <span class="error"> <?php echo $genderErr;?><span>
  </div>
  <!--Password-->
  <div style="padding:20px;">
    <b>Password:</b>
    <br>
    <input type="password" name="pass">
    <br>
    <span class="error"><?php echo $passErr;?></span>
    <span class="passok"><?php echo $passOk;?></span>
  </div>
<br>
  <div style="padding:20px;">
    <b>Retype Password:</b>
    <br>
    <input type="password" name="repass">
    <span class="error"><?php echo $repassErr;?></span>
  </div>
<!--Language-->
  <div style="padding:20px;">
    <label><b>Language</b></label>
    <br>
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
        <label><b>Email</b></label>
        <br>
        <input type="email" name="mail" id="mail" placeholder="abc@gmail.com" >
        <span class="error"> <?php echo $emailErr; ?></span>
      </div>
      <br >
     
    <div>
            <!--Image Upload-->
            Upload an Image:
            <br>
  <input type="file" name="image" id="image" accept="image/png, image/jpeg" onchange="readURL(this)">
  <span class="error"> <?php echo $fileErr; ?></span>
                <img src="" alt="" id="img" style='height:100px;'>
                
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
  <br>
  <!--Submit-->
  <div style="margin-left:150px;">
        <button type="submit" name="submit">Submit</button>
      </div>

      <!--View button-->
      <div class="view">
<button><a href="crud_Show.php">View</a></button>
</div>
  </div>
  </form>
  


</body>

</html>
