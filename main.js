window.verify = function() {
  var gpa = document.getElementById("gpa").value;
  var ver = parseFloat(gpa);
  if (!(ver >= 0 && ver <= 4)){
    alert("Your GPA should be between 1-4");
  }

}


 
  
  