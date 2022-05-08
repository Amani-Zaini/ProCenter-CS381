<?php   

 include 'dbCon.php';  
 if (isset($_GET['stuid'])) {  
      $id = $_GET['stuid'];  
      $query = "DELETE FROM `StuSession` WHERE app_no = '$id'";  
      $run = mysqli_query($conn,$query);  
        if ($run) {  
           header('location:student-schedual.php'); 
        //    header('location:index.php');  
        }
      else{  
           echo "Error: ".mysqli_error($conn);  
        }  
 }  
?>
