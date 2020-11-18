<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">


    <title>
      Chart Animtaion Login
    </title>
</head>

<body class="login-background">
<h1 id="hTitle" class="header-text" style="color: white; text-align:center;">Capture Chart Animation</h1>
  <div class="login-wrap">
     <div class="center-logo">
        <img src="source/logo/unicef-logo.png" width="300" height="75" alt="Logo" id="imglogo1">
</div>  
       
      <input type="text" name="username" placeholder="Username" id="userInput">
      <input type="password" name="password" placeholder="Password" id="passInput">

      <p id="errorMessage" style="color: red; text-align: center; display:none">Wrong username or password!</p>
      <button class="btn-login" onclick="loginUser()" id="loginbtn"> Login</button>
  </div>





<script type="text/javascript">
var username="unicef";
var password="unicef2020";

function loginUser(){
  if( username == document.getElementById("userInput").value  && password== document.getElementById("passInput").value){
    
    window.location.href = 'http://dvgame.cekaonica.com/mainPage.php';
  }
  else{
    var x = document.getElementById("errorMessage");
  if (x.style.display === "none") {
    x.style.display = "block";
  }
  }
}


</script>
  

</body>


</html>