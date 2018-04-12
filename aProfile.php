<!DOCTYPE html>
<?php
  $email_cookie = $_COOKIE['email'];
  
  if($email_cookie == ""){
    die("you can not brwose this page directly\n you have to sign in");
  }
  
  if($_GET['error'] == "Email_already_exists"){
    echo  
          "<script type=\"text/javascript\">
          alert(\"Email already exists\");
          </script>";
  }
  
  
  $servername = getenv('IP');
    $username = getenv('C9_USER');
    $dbpassword = "";
    $database = "myDB";
    $dbport = 3306;

    // Create connection
    $conn = mysqli_connect($servername, $username, $dbpassword , $database , $dbport);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    
    
    $log_in_email = $_COOKIE['email'];
    $sql = "SELECT * FROM member WHERE email = '$log_in_email'";
     $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_assoc($result)) {
                    $loin_name = $row['name'];
                    $loin_email = $row['email'];
                    $loin_password = $row['password'];
                    $loin_gender = $row['gender'];
                    $loin_workplace = $row['workplace'];
                    $loin_birthDay = $row['birthDay'];
                    $login_profilephoto = $row['profilephoto'];
                 }
                }
                 else {
                    echo "0 results";
                }
                 mysqli_close($conn);
      // if($row["email"] == $email){
      //   echo "<script type=\"text/javascript\">
      //       window.addEventListener(\"load\" , function(){
      //       document.getElementById(\"emailInput\").value = \"The email existing\";
      //       document.getElementById(\"emailInput\").setAttribute(\"style\" , \"color:red\");
      //       });
      //       </script>
      //       ";
      // }
      // else{

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
    <title>User profile </title>
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
    <!-- style menue -->
    <link rel="stylesheet" type="text/css" href="/dist/css/aProfile.css">
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
  <!-- boundery of menue -->
  <div class="boundryMenue">
    <!-- Menu myprofile --> 
    <div>
      <ul class="menue">
        <li id = "information" class="eleMenue"><input type="button" value="My Profile Information" calss="linkeEleMenue,myOption" id="MyProInfo"></li>
        <li class="eleMenue"><input type="button" value="List Friends" calss="linkeEleMenue,myOption" id="lisFri"></li>
        <li class="eleMenue"><input type="button" value ="Friendship Requests"calss="linkeEleMenue,myOption" id="FirReq"></li>
      </ul>
    </div>
    <!-- contain -->
    
    <!-- A Profile Information -->
    <div class="contain" id="contain">
      <div id = "infDiv" class="containOfMenueOption">
        <div class="container">
          <div class="row" style ="padding-top : 40px ; color: black">
            <div class="col-md-10 ">
              <form class="form-horizontal" action="sinUp2.php" method="POST" enctype="multipart/form-data">
                <div class="row" > 
                  <img style ="height:20%; width:20%; padding:40px" src="<?php echo $login_profilephoto ?>">
                  <br>
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="Name (Full name)">Name (Full name)</label>  
                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user">
                          </i>
                        </div>
                        <input id="Name (Full name)" name="fullName" type="text" placeholder="Name (Full name)" value ="<?php echo $loin_name;?>" class="form-control input-md">
                      </div>
                    </div>
                  </div>
                  
                  <!-- File Button --> 
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="Upload photo">Upload photo</label>
                    <div class="col-md-4">
                      <input id="fileToUpload" name="fileToUpload" class="input-file" type="file" value="<?php echo $login_profilephoto;?>">
                    </div>
                  </div>
                  
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="Date Of Birth">Date Of Birth</label>  
                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-birthday-cake"></i>
                        </div>
                        <input id="Date Of Birth" name="date" type="date"  value="<?php echo $loin_birthDay;?>" placeholder="Date Of Birth" class="form-control input-md">
                      </div>
                    </div>
                  </div>
                  
                  <!-- Multiple Radios (inline) -->
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="Gender">Gender</label>
                    <div class="col-md-4"> 
                      <label class="radio-inline" for="Gender-0">
                        <input type="radio" name="gender" id="Gender-0" value="1" <?php if($loin_gender == 1) echo "checked='checked'";?>>
                        Male
                      </label> 
                      <label class="radio-inline" for="Gender-1">
                        <input type="radio" name="gender" id="Gender-1" value="2" <?php if($loin_gender == 2) echo "checked='checked'";?>>
                        Female
                      </label> 
                    </div>
                  </div>
                  
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="Email Address">Email Address</label>  
                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-envelope-o"></i>
                        </div>
                        <input id="Email Address" name="email" value="<?php echo $loin_email;?>" type="text" placeholder="Email Address" class="form-control input-md">
                      </div>
                    
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-2 control-label">Work place</label>  
                    <div class="col-md-4">
                    <div class="input-group">
                         <div class="input-group-addon">
                       <i class="fa fa-building fa-1x"></i>
                         </div>
                         <input  name="workplace" type="text" value="<?php echo $loin_workplace;?>" placeholder="Work place" class="form-control input-md">
                        </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="password">Password</label>
                    <div class="col-md-4">
                      <input  name="password" type="password" value="<?php echo $loin_password;?>" placeholder="Enter your password" class="form-control input-md" required="">
                    </div>
                  </div>
                  
                  <input type="hidden" name="from_profile" id="hiddenField" value="true">
                  
                  <div class="form-group">
                    <label class="col-md-2 control-label" ></label>  
                    <div class="col-md-4">
                      <input type="submit" class="btn btn-success"></input>
                    </div>
                  </div>
                </div> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of the div menu of My Profile Information -->
    
    <!--  List of firends -->
    <div class="w3-container containOfMenueOption" id="Listoffirends" >
      <div class="w3-card-2" style="width:25% padding-left:40px">
        <header class="w3-container w3-light-grey"></header>
        <div class="w3-container" >
          <img src="/img/mainlogo.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
          <p style="text-align:left">UserName</p><br>
        </div>
        <button class="w3-button w3-block w3-dark-grey">Delete</button>
      </div>
    </div>
    <!-- End List of firends -->
    
    <!-- Request Firendship -->
    <div class="w3-container containOfMenueOption" id="RequestFirendship">
      <div class="w3-card-4 w3-dark-grey" style="width:100%">
        <div class="w3-container w3-center">
          <img src="/img/mainlogo.png" alt="Avatar" height = "35px" width = "35">
          <h5>John Doe</h5>
          <div class="w3-section">
            <button class="w3-button w3-green">Accept</button>
            <button class="w3-button w3-red">Decline</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Request Firendship --> 
    
    <!-- end of the div menu of My Profile --> 
  </div>
 
    <!-- jQuery Version 1.11.1 -->
    <!--<script src="js/jquery.js"></script>-->

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <!-- JS aprofile-->
    <script type="text/javascript" src="/js/aprofile.js"></script>
  </body>
</html>
