<?php   

 include 'dbCon.php';  
 if (isset($_GET['stuid'])) {  
      $id = $_GET['stuid']; 
      $name = $_GET['edu_name'];
      $course = $_GET['course'];
      $date = $_GET['date'];
      $time = $_GET['time']; 
      $query = "insert into StuSession(stuid,eduName,course,date,time) values('$id','$name','$course','$date','$time')"; 
      $run = mysqli_query($conn,$query);  
        if ($run) {  
           header('location:student_schedual.php'); 
           //header('Refresh: 10; URL=student-appointment.php'); for future ehe
        }
      else{  
           echo "Error: ".mysqli_error($conn);  
        }  
 }  
?>
