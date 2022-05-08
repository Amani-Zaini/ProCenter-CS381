<html>
<title>Educator Schedule</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

<body>

 <!-- ----------------------------------------------------header part------------------------------------------------------ -->
 <?php include("loginDB.php");
    if( $_SESSION["user_type"] == 'student') {
         include ("student_header.php");
      } 
    else if($_SESSION["user_type"] == 'admin') {
         include ("admin_header.php");
      }
    else if ($_SESSION["user_type"] == 'educator')
    {
        include ("educator_header.php");
    }
    ?>

 <!-- ---------------------------------------------- End of header part------------------------------------------------------ -->
 
<!-- ---------------------------------------------- Educator Schedule part------------------------------------------------------ -->
<?php   
 include 'dbCon.php';  
 $query = "select * from StuSession WHERE `stuid`='$_SESSION[college_id]'";  
 $run = mysqli_query($conn,$query);  
 ?>
<br>
<div class="w3-container w3-padding-64 ">
  <h2>Fill out the form to book new session</h2>
  <div class="w3-responsive w3-center">
  <table class="w3-table-all ">
    <thead>
      <tr class="w3-teal ">
        <th>#</th>
        <th>student id</th>
        <th>educator Name</th>
        <th>course</th>
        <th>session Date</th>
        <th>session Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tr>
    <?php
    
     if(isset($_POST['submit']))
     {
         $stuID=$_POST['stuID'];
         $eduName=$_POST['eduName'];
         $course=$_POST['course'];
         $date=$_POST['date'];
         $time=$_POST['time'];
         $sql="insert into StuSession(stuid,eduName,course,date,time) values('$stuID','$eduName','$course','$date','$time')";
         if( mysqli_query($conn,$sql)){
           echo "<script>alert('New appointment is added');</script>";
          }
          else
          {
            echo "<script>alert('Appointment is not added');</script>";
          }
     }
     include "LoginDB.php";
    ?>
  
      <form method="post" action="">
      <td></td>
      <td><input type="text" id="stuID" name="stuID" value=<?php echo $_SESSION['college_id'];?> readonly></td>
      <td>
      
      <?php
        // php select option value from database
        include 'dbCon.php';
        $query="select * from eduinformation"; // Fetch all the data 
        $result1 = mysqli_query($conn, $query);
      ?>
      
      <select name="eduName" required>
      <option value="" disabled selected hidden ><b>Select educator</b> </option>
        <?php while($row1 = mysqli_fetch_array($result1)):;?>
        <option  value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
        <?php endwhile;?>
      </select></td>
    
      <?php
        // php select option value from database
        include 'dbCon.php';
        $query="select * from eduinformation"; // Fetch all the data 
        // for method 1
        $result1 = mysqli_query($conn, $query);
      ?>
      <td>
      <select name="course" required>
      <option value="" disabled selected hidden><b>Select course</b> </option>
        <?php while($row2 = mysqli_fetch_array($result1)):;?>
        <option  value="<?php echo $row2[2];?>"><?php echo $row2[2];?></option>
        <?php endwhile;?>
      </select>
    </td>
    
    <?php
        // php select option value from database
        include 'dbCon.php';
        $query="select * from eduinformation"; // Fetch all the data 
        $result1 = mysqli_query($conn, $query);
      ?>
      <td>
      <select name="date" required>
      <option value="" disabled selected hidden><b>Select date</b> </option>
        <?php while($row3 = mysqli_fetch_array($result1)):;?>
        <option  value="<?php echo $row3[3];?>"><?php echo $row3[3];?></option>
        <?php endwhile;?>
      </select>
    </td>

    
    <?php
        //php select option value from database
        include 'dbCon.php';
        $query="select * from eduinformation"; // Fetch all the data 
        $result1 = mysqli_query($conn, $query);
      ?>
        
    <td>
      <select name="time" required>
      <option value="" disabled selected hidden><b>Select time</b> </option>
        <?php while($row4 = mysqli_fetch_array($result1)):;?>
        <option  value="<?php echo $row4[4];?>"><?php echo $row4[4];?></option>
        <?php endwhile;?>
      </select>
    </td>

      <td><button type="submit"  name="submit" class="w3-teal w3-border-teal w3-round-xlarge w3-padding">
      <i class="fa fa-plus  Edit-out-logo-size" ></i> Add new session </button>
      </td>
    </form>

    </tr>
    <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data'>   
                          <td>".$i++."</td>
                          <td>".$result['stuid']."</td>
                          <td>".$result['eduName']."</td> 
                          <td>".$result['course']."</td>  
                          <td>".$result['date']."</td>  
                          <td>".$result['time']."</td> 
                          <td><a href='db_stuDelete.php?stuid=".$result['app_no']."' class='w3-button w3-teal w3-border-teal w3-round-xlarge del'><i class='fa fa-close  Edit-out-logo-size' ></i> Cancel</a></td> 
                          </tr>  
                     ";  
                }  
           }  
      ?>  
    </table>
  </div>
</div>

  <!-- ---------------------------------------------- End of Educator Schedule part------------------------------------------------------ -->
<br><br><br><br><br>
    <!--  ------------------------------------------------ footer part part------------------------------------------------------ -->
    <footer class="w3-teal">
      <div class="w3-container">
        <br />
        <div class="w3-third w3-container w3-mobile w3-small">
          <img
            src="images/location.png"
            alt="location logo"
            class="social-icons"
          />
          <b>Our Address</b>
          <p>
            Yanbu University College (Female Campus)·<br />
            Department of Computer Science.
          </p>
        </div>
        <div class="w3-third w3-container w3-mobile w3-small">
          <img
            src="images/email.png"
            alt="location logo"
            class="social-icons"
          />
          <b>Email Us at</b>
          <p>ProCenter@gmail.com</p>
        </div>

        
      </div><br /><br />
      <div class="w3-display-bottom w3-container">
        <span>&#169;</span>2022 All Right Reserved by CSE ProCenter
      </div>
    </footer>
    <!--  ---------------------------------------------- End of footer part part------------------------------------------------------ -->
</body>
</html> 