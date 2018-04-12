<!DOCTYPE html>
<?php
   if($_GET['error'] == "Email_already_exists"){
    echo  
          "<script type=\"text/javascript\">
          alert(\"Email already exists\");
          </script>";
  }
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
    <!-- Bootstrap Core CSS -->
<!--     <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
    .othertop{margin-top:10px;}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<form action="sinUp2.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Register
<img src="/img/mainlogo.png" height = "50px" width = "50px"></img>
</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Full name</label>  
  <div class="col-md-4">
  <input id="fullName" name="fullName" type="text" placeholder="John" class="form-control input-md" required="">
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="Upload photo">Upload photo</label>
  <div class="col-md-4">
    <input type="file" name="fileToUpload" id="fileToUpload" required="">
    <!--<input id="profilePhoto" name="fileToUpload" class="input-file" type="file">-->
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Email Address">Email Address</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-envelope-o"></i>
       </div>
    <input id="emailInput" name="email" type="email" placeholder="Email Address" class="form-control input-md" required="">
      </div>
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Gender">Gender</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="Gender-0">
      <input type="radio" name="gender" id="Gender-0" value="1" checked="checked">
      Male
    </label> 
    <label class="radio-inline" for="Gender-1">
      <input type="radio" name="gender" id="Gender-1" value="2">
      Female
    </label> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Date Of Birth">Date Of Birth</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-birthday-cake"></i>
       </div>
       <input id="date" name="date" type="date" placeholder="Date Of Birth" class="form-control input-md" required="">
      </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Work place</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-building fa-1x"></i>
       </div>
       <input id="workplace" name="workplace" type="text" placeholder="Work place" class="form-control input-md">
      </div>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="Enter your password" class="form-control input-md" required="">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="Register" name="Register" class="btn btn-primary">Register</button>
  </div>
</div>

</fieldset>
</form>

</body>
</html>