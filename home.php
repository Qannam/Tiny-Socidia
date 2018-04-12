<!DOCTYPE html>
<?php
  $email_cookie = $_COOKIE['email'];
  
  if($email_cookie == ""){
    die("you can not brwose this page directly\n you have to sign in");
  }
  // connect to data base
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
      //echo "Connected successfully";
  
  
  // here i want to select the profile img for person Who signed in
   $sql4 = "SELECT name , email , profilephoto FROM member WHERE email='$email_cookie'" ;
                $result4 = mysqli_query($conn, $sql4);
                if(mysqli_num_rows($result4) > 0){
                 while($row4 = mysqli_fetch_assoc($result4)) {
                    $login_profilephoto = $row4['profilephoto'];
                 }
                }
                 else {
                    echo "0 results";
                }
    

?>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/attimgstyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src="/js/homeJavaseript.js"></script>-->
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
        <p><a href="aProfile.php">My Profile</a></p>
        <img src="<?php echo $login_profilephoto;?>" class="img-circle" height="65" width="65" alt="Avatar">
      </div>
      
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div id = "deadline" class="col-sm-7">
      
      
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              
              <form method = "POST" action ="home2.php" enctype="multipart/form-data">
              <textarea style = "margin: auto;height: 100% ;width: 100%; padding: 3px;" id = "message" rows="4" cols="75" name="message"></textarea>
              <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
              <input type="file" name="fileToUpload" id="fileToUpload">
              <input id = "postButton" type="submit" name="post" value = "post">
              </form>
              
            </div>
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

<!-- ================================================= here i get the content from data base ============================ -->

<?php
   // here i select all massege
    $sql = "SELECT * FROM post ORDER BY postid DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          
          
          
          // here i check if frindship
          $login_email = "'".$email_cookie. "'";
          $friend_email = "'".$row['email'] ."'" ;
          //this for check if the massege for login parson
          $self_email = 0 ;
          if($login_email == $friend_email){
            $self_email = 1 ;
          }
          $sql2 = "SELECT email1 , email2 , status FROM friend WHERE (email1=$login_email AND email2=$friend_email AND status=1) OR  $self_email" ;
          $result2 = mysqli_query($conn, $sql2);
          if(mysqli_num_rows($result2) > 0){
           while($row2 = mysqli_fetch_assoc($result2)) {
             if( $self_email){
                 $email_to_search = $login_email;
             }
            else{
              $email_to_search = "'" . $row2['email2'] . "'";
            }
          
              // i select the name from member table
              $sql3 = "SELECT name , email , profilephoto FROM member WHERE email=$email_to_search" ;
              $result3 = mysqli_query($conn, $sql3);
              if(mysqli_num_rows($result3) > 0){
               while($row3 = mysqli_fetch_assoc($result3)) {
                  $name = $row3['name'];
                  $profilephoto = $row3['profilephoto'];
               }
              }
               else {
                  echo "0 results";
              }
          echo $row["picture"];
          ?>
          
          <?php
          echo "<script>" ;
         ?>
            var div1 = document.createElement("div") ;
         var div1_2 = document.createElement("div") ;
         var div1_2_2 = document.createElement("div") ;
         var p1 = document.createElement("p");
         var text1 = document.createTextNode("<?php echo $name;?>");
         var img = document.createElement("img") ;
         var div1_4 = document.createElement("div") ;
         var div1_4_2 = document.createElement("div") ;
         var p2 = document.createElement("p");
         var text2 = document.createTextNode("<?php echo $row["content"] ;?>");
         
         
         div1.setAttribute("class" , "row") ;
         div1_2.setAttribute("class" , "col-sm-3") ;
         div1_2_2.setAttribute("class" , "well") ;
         div1_4.setAttribute("class" , "col-sm-9") ;
         div1_4_2.setAttribute("class" , "well") ;
         img.setAttribute("src" , "<?php echo $profilephoto; ?>") ;
         img.setAttribute("class" , "img-circle") ;
         img.setAttribute("height" , "55") ;
         img.setAttribute("width" , "55") ;
         
         
         
         
         
         p1.appendChild(text1);
         div1_2_2.appendChild(p1);
         div1_2_2.appendChild(img);
         p2.appendChild(text2);
         div1_4_2.appendChild(p2);
         div1_2.appendChild(div1_2_2);
         div1_4.appendChild(div1_4_2);
         div1.appendChild(div1_2);
         div1.appendChild(div1_4);
         
         <?php
            if($row["picture"] != ""){
              ?>
               var attached_img = document.createElement("img");
               var attimgdiv = document.createElement("div");
               attached_img.setAttribute("src" , "<?php echo $row["picture"];?>");
               attached_img.setAttribute("class" , "attached-image");
               attimgdiv.setAttribute("class" , "well") ;
               attimgdiv.appendChild(attached_img);
               div1.appendChild(attimgdiv);
           <?php } ?> 
         
         var deadline = document.getElementById("deadline");
         deadline.appendChild(div1);
         <?php
          echo "</script>" ;
         ?>
    <?php
           }
          }
        }
    } 
    else {
        echo "0 results";
    }
     mysqli_close($conn);
  ?>
</html>