<?php
include("connect.php");
?>
<html>

</head>

<body>
    <div class="tablee">
  <table border="1" style="border:1px solid; margin:auto;">
     
          <tr>
          <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Image</th>

          </tr>
   
      <tbody>
</div>
          <?php
$qry="select * from emp";
$count=0;
$res=mysqli_query($con,$qry)or die("error:" . mysqli_error($con));

             while($row=mysqli_fetch_array($res))
            { 
                $count++;
          ?>
          <tr>

                <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['namee'] ?></td>
              <td><?php echo $row['emaill'] ?></td>
              <td><?php echo $row['numberr'] ?></td>
              <td>
            <?php
        $filepath= 'load/'.$row['imagee']; 
//print_r($filepath);die;
echo '<img src="'.$filepath.'" height="100px">'
?>
</td>
              <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?=$row['id']?>">

                <a href="crud_delete.php?id=<?php echo $row['id'] ?>">Delete</a>
            </form>

        </td>

        <!--Update-->
        <td>
        <form method="POST">
                    <input type="hidden" name="id" value="<?=$row['id']?>">

                <a href="crud_update.php?id=<?php echo $row['id'] ?>">Update</a>
            </form>
            </td>

          </tr>
          <?php
         }
          ?>
      </tbody>
  </table>
        <!--Back button-->
        <div class="view">
<button><a href="form.php">Go back</a></button>
</div>
</body>
</html>


