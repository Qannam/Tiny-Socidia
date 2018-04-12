<!DOCTYPE html>
<?php
$email_cookie = $_COOKIE['email'];

if($email_cookie == ""){
  die("you can not brwose this page directly\n you have to sign in");
}

?>
<html lang="en">
<head>
  <title>User public page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/js/home javaseript.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" style ="float:left">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php"><span ></span>Home</a></li>
        <li><a href="aProfile.php"><span ></span>My Profile</a></li>
        <li><a href="signOut.php"><span ></span>Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container text-center">
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
        <p><a href="/aProfile.html">My Profile</a></p>
        <img src="https://winklevosscapital.com/wp-content/uploads/2014/10/2014-09-16-Anoynmous-The-Rise-of-Personal-Networks.jpg" class="img-circle" height="65" width="65" alt="Avatar">
      </div>
      
      <button id = "follow" name = "follow">Follow</button>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div id = "deadline" class="col-sm-7">
    
      <div class="row">
        <h1>Posts</h1>
      </div>
      
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>John</p>
           <img src="https://winklevosscapital.com/wp-content/uploads/2014/10/2014-09-16-Anoynmous-The-Rise-of-Personal-Networks.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Bo</p>
           <img src="https://winklevosscapital.com/wp-content/uploads/2014/10/2014-09-16-Anoynmous-The-Rise-of-Personal-Networks.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Jane</p>
           <img src="https://winklevosscapital.com/wp-content/uploads/2014/10/2014-09-16-Anoynmous-The-Rise-of-Personal-Networks.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Anja</p>
           <img src="https://winklevosscapital.com/wp-content/uploads/2014/10/2014-09-16-Anoynmous-The-Rise-of-Personal-Networks.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>     
    </div>
    <div class="col-sm-2 well">
      <table>
        <tr><td><img src="/img/mainlogo.png" alt ="Logo" style ="width:80px;height:80px"></td></tr>
        <tr><td><p><b>Tiny Socidia</p></td></tr>
        <tr>
          <td>
            <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
      </td>
        </tr>
      </table>
      
      
    </div>
  </div>
</div>
</body>
</html>

