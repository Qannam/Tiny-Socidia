<?php  
  if($_GET['error'] == "Email_or_password_not_correct"){
    echo  
          "<script type=\"text/javascript\">
          alert(\"Email or password not correct\");
          </script>";
  }
?>
<html>
      <head>
        <meta charset="utf-8">
    <title>User profile form requirement</title>
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
    <div class="container">
  	      <div class="row">
      
          <legend>Login
          <img src="/img/mainlogo.png" height = "50px" width = "50px"></img>
          <p><b style="font-size:15px">Tiny Socidia</p>
          </legend>
          
          <form action="index2.php" method="post" class="form-horizontal">
          <fieldset>
            
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="email_login">Email:</label>  
            <div class="col-md-4">
                <input id="email_login" name="email_login" type="text" placeholder="joe.doe@hotmail.com" class="form-control input-md" required="">
                <span class="help-block">Enter your e-mail address</span>  
            </div>
            <div class="col-md-6"></div>          
          </div>
          
          <!-- Password input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="password_login">Password:</label>
            <div class="col-md-4">
              <input id="password_login" name="password_login" type="password" placeholder="●●●●●" class="form-control input-md" required="">
              <span class="help-block">Enter your password</span>
            </div>
              <div class="col-md-6"></div>                    
          </div>
          
          <!-- Multiple Checkboxes (inline) -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="login_options"></label>
            <div class="col-md-2">
              <label class="checkbox-inline" for="">
                  <a href="/sinUp.php">Register</a>
              </label>
            </div>
            <div class="col-md-6"></div>                              
          </div>
  
          <!-- Button -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="singlebutton"></label>
            <div class="col-md-4">
              <button id="singlebutton" name="singlebutton" class="btn btn-primary">Login</button>
            </div>
            <div class="col-md-6"></div>                              
          </div>
          
          </fieldset>
          </form>
  	</div>
  </div>
  </body>
</html>