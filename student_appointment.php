<html>
<title>Student-My Appointment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<?php 
    session_start();
    if (!isset($_SESSION['college_id']))
    header("Location: login.php");
   ?>
  <!-- ----------------------------------------------------header part------------------------------------------------------ -->
  <?php include("login_db.php");
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
 <!-- ---------------------------------------------- Appointment part------------------------------------------------------ -->
 <div class="w3-panel w3-padding-64">
  <h2>My Appointments</h2>
  <div class="w3-responsive">
  <table class="w3-table-all">
    <thead>
      <tr class="w3-teal">
        
        <th>Educator Name</th>
        <th>course</th>
        <th>Date</th>
        <th>Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
  <?php
  include 'db_con.php';
  $query="select * from `StuSession` WHERE `stuid`='$_SESSION[college_id]'"; // Fetch all the data from the table 
  $result1 = mysqli_query($conn, $query);
  ?>
  <?php if (mysqli_num_rows($result1) > 0): ?>
  <?php  while ($result = mysqli_fetch_assoc($result1)) {
    
      echo "  
           <tr class='data'>   
           <td>".$result['eduName']."</td> 
           <td>".$result['course']."</td>  
           <td>".$result['date']."</td>  
           <td>".$result['time']."</td> 
           <td><a href='db_studelete.php?app_no=".$result['app_no']."' class='w3-button w3-teal w3-border-teal w3-round-xlarge'><i class='fa fa-close  Edit-out-logo-size' ></i> Cancel</a></td> 
           </tr>  
      ";  
     
 }
      
   ?>
  <?php else: ?>
        <tr>
        <td colspan="5" rowspan="1" headers="" class="w3-center">No Appointment is Found</td>
        </tr>
  <?php endif; ?>
  <?php mysqli_free_result($result1); ?>
    </tbody>
  </table>
</div>
</div>

<br><br>
 <!-- ----------------------------------------------End of Appointment part------------------------------------------------------ -->

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