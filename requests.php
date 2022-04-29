<html>
<title>The Requestes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Requests.css">
<link  rel="stylesheet" href="style.css">

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
 <!-- ---------------------------------------------- Requests part------------------------------------------------------ -->

<div class="w3-container w3-padding-64">
  <h2>The Requestes</h2>
  <div class="w3-responsive">
  <table class="w3-table-all">
    <thead>
      <tr class="w3-teal">
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Student GPA</th>
        <th>Subject Name</th>
        <th>Student Level</th>
        <th>State</th>
      </tr>
    </thead>
    <tr>
      <td>..</td>
      <td>..</td>
      <td>..</td>
      <td>..</td>
      <td>..</td>
      <td>..</td>
    </tr>
    <tr>
      <td>..</td>
      <td>..</td>
      <td>..</td>
      <td>..</td>
      <td>..</td>
      <td>..</td>
    </tr> 
    <tr>
        <td>..</td>
        <td>..</td>
        <td>..</td>
        <td>..</td>
        <td>..</td>
        <td>..</td>
      </tr>
  </table>
</div>
</div>
<br>
<!-- <div class="w3-container w3-padding-32">
  <p>
  <button class="w3-button w3-teal w3-border w3-border-teal w3-round-large w3-hover-white">Book an Appointment </button>
  </p>
</div> -->
<br><br>
 <!-- ----------------------------------------------End of Requests part------------------------------------------------------ -->

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