<?php   

 include 'db_con.php';  
 if (isset($_GET['stuid'])) {  
      $id = $_GET['stuid']; 
      $name = $_GET['edu_name'];
      $course = $_GET['course'];
      $date = $_GET['date'];
      $time = $_GET['time']; 
      $query = "insert into StuSession(stuid,eduName,course,date,time) values('$id','$name','$course','$date','$time')"; 
      $run = mysqli_query($conn,$query);  
        if ($run) {  

           
           echo "<script> 
         alert('new appoitnment is added');
         window.location.href='student_schedule.php'; </script>";
           //header('Refresh: 5; URL=student_schedule.php.php'); for future ehe

        }
      else{  
           echo "Error: ".mysqli_error($conn);  
        }  
 }  
?>
