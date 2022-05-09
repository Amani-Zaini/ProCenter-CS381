<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Edite profile</title>
  </head>
  <body>
  <?php 
    session_start();
    if (!isset($_SESSION['college_id']))
    header("Location: login.php");
   ?>
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
<br>
        <div class="margin-form w3-text-white w3-panel w3-card-4 w3-round-xlarge ">
        <br>
                <h2>Edite profile</h2>
                <?php 
                   include "LoginDB.php";?>
                <?php 
                include "dbCon.php";
                if (isset($_POST['submit'])) {
                  $name =  $_POST['name'];
                  $password =  $_POST['password'];
                  $query="select * from login"; 
          
                   //update the login type
                   $updateUserInfo = "UPDATE login SET name = '".$name."' , password ='".$password."' WHERE college_id='".$_SESSION['college_id']."' ";
                   mysqli_query($conn, $updateUserInfo);
              }
                ?>
            <form action="#" class="w3-block w3-container" method="POST">
                  <p>
                    <label class="w3-text-white"><b><?php echo $_SESSION['user_type'];?> id</b></label>
                    <input class="w3-input w3-border w3-round" type="text" name="college_id" value=<?php echo $_SESSION['college_id'];?> readonly>
                  </p>
                  <br>
                  <p>
                    <label class="w3-text-white"><b><?php echo $_SESSION['user_type'];?> Name</b></label>
                    <?php //$userName=$_SESSION['name'];
                    // include "dbCon.php";
                    // $sql="SELECT name, password, FROM login WHERE college_id = '" . $_SESSION['college_id']."'"; 
                    // mysqli_query($conn, $sql);
                    ?>
                    <input class="w3-input w3-border w3-round" name="name" type="text" value=<?php echo $_SESSION['name'];?>  />
                  </p>
                  <br>
                  <p>
                    <label class="w3-text-white"><b>passowrd</b></label>
                    <input class="w3-input w3-border  w3-round" name="password" type="text" value=<?php echo $_SESSION['password'];?> />
                  </p>
                  <br><br><br><br>
                  <div class="w3-center w3-padding-24">
                    <input
                    class=" w3-white w3-border-teal w3-round-xlarge w3-padding"
                      type="submit"
                      name="submit"
                     value="Edite Profile"
                    />
                  </div>

            </form>
      </div>
  </body>
    <!--  ------------------------------------------------ footrt part part------------------------------------------------------ -->
   <br><br>
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
    <!--  ---------------------------------------------- End of footrt part part------------------------------------------------------ -->
  </body>
</html>