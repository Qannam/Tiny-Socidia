<?php
// define variables and set to empty values
$fullName = $email = $gender = $password = $date = $workplace = $profilephoto = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = test_input($_POST["fullName"]);
    $email = test_input($_POST["email"]);
    $date = test_input($_POST["date"]);
    $password = test_input($_POST["password"]);
    $gender = test_input($_POST["gender"]);
    $workplace = test_input($_POST["workplace"]);

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
    
    //check if the email duplicate
    $sql = "SELECT * FROM member WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
      
      $check = 1 ;
      if($row["email"] == $email){
        
        if (isset($_POST['from_profile'])){
            if($email != $_COOKIE['email'])
                $check = 2;
        }
        else{
            $check = 3 ;
        }
            
      }
      }
      if($check == 2){
          header("location:aProfile.php?error=Email_already_exists");
      }
      else if($check == 3){
          header("location:sinUp.php?error=Email_already_exists");
      }
      else{
          
          ////////////////////////// Attatching Image Script ///////////////////////////////////////////////////
        $target_dir = "profilephotos/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //referenceing full path of the attached photo.
            $temp = explode(".", basename($_FILES["fileToUpload"]["name"])); //creat an array with 2 index, first have the file name, second have the extention.
            $newfileName = round(microtime(true)) . "." . end($temp); //product a random number based on the current time and append the extension from the originally uploaded file.
            $new_target_file = $target_dir . $newfileName;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
      echo "<br>".$target_file."<br>" ;
      
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($new_target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            echo "Sorry, your file is too large. it should be less than 1 MB";
            $new_target_file = "";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfileName)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
            //////////////// End of Attatching Image Script ///////////////////////////
          
        
        
        $sql = "INSERT INTO member (email , password , name , birthDay ,gender , workplace ,profilephoto) VALUES ('$email' , '$password' , '$fullName' , '$date' , '$gender' , '$workplace' , '$new_target_file')";
        
        // here iam checking if he came from profilr and he did not change the email to avoid "Duplicate entry" error
        if (isset($_POST['from_profile'])){
            $login_email = $_COOKIE['email'];
             $sql = "UPDATE member SET email = '$email', password = '$password', name = '$fullName', birthDay = '$date', gender = $gender, workplace = '$workplace', profilephoto = '$new_target_file' WHERE email ='$login_email'";
             //here i check if the img came from form empty
             if($target_file == "profilephotos/")
                $sql = "UPDATE member SET email = '$email', password = '$password', name = '$fullName', birthDay = '$date', gender = $gender, workplace = '$workplace' WHERE email ='$login_email'";
        }
        
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            if (isset($_POST['from_profile'])){
              header("location:aProfile.php");
            }
            else{
                header("location:sinUp.php");
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>