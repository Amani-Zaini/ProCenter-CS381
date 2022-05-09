window.verify = function() {
  var gpa = document.getElementById("gpa").value;
  var ver = parseFloat(gpa);
  if (!(ver >= 0 && ver <= 4)){
    alert("Your GPA is not between 1-4");
  }

}


// find an educator
function redirectStuAppointment(){
    window.location  = "student-schedual.php";
  }


//index page
  function redirectFindEdu(){
      window.location  = "find-educator.php";
  }

   //function to redirect user to Be an Educator
  function redirectBeEdu(){
      window.location  = "be-educator.php";
  }

 
  