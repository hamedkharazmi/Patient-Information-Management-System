var $btn =  document.getElementById("submit");
$ (document).ready (function () {
  $("#submit").click(function() {
    console.log(document.getElementById("username").value);
    console.log(document.getElementById("password").value);
    if(document.getElementById("username").value=="admin" && document.getElementById("password").value=="12345") {
      $("#wrong").css("visibility","hidden");
      $btn.classList.add('pending');
      window.setTimeout(function(){ $btn.classList.add('granted'); }, 1500);
      setTimeout(function(){ window.location.href = "page2.html"; }, 5000);
    }
    else {
      $("#wrong").css("visibility","visible");
    }
  });
});
