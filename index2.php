<?php
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $email_login = $passwor = "";
 
    $email_login = test_input($_POST["email_login"]);
    $password_login = test_input($_POST["password_login"]);
    
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "myDB";
    $dbport = 3306;

    // Create connection
    $conn = mysqli_connect($servername, $username, $password , $database , $dbport);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // else{
    // echo "Connected successfully";
    // }
    $sql = "SELECT * FROM member WHERE email = '$email_login' AND password = '$password_login'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
      if($row["email"] == $email_login && $row["password"] == $password_login){
          // add the email to cookie
          setcookie('email' , $email_login , time() +(86400 * 30) ,'/' );
          //$_session['email'] = $email_login;
          // header('REFRESH:0;URL=/home.php');
          // echo "<br>";
          // echo $_session['email'];
          header('REFRESH:0;URL=home.php');
          
          // print_r($_COOKIE);
          // $homePage = "\"/home.php\"";
          // echo 
          //   "<script type=\"text/javascript\">
          //     window.open($homePage);
          //     </script>";
      }
      }
      else{
          header("location:index.php?error=Email_or_password_not_correct");
        }
      mysqli_close($conn);
}
else{
  echo "You can not brwose this page directly";
}
?>