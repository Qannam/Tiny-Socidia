<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $profilephoto = "";
        $target_dir = "profilephotos/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $temp = explode(".", basename($_FILES["fileToUpload"]["name"])); //create array with 2 index, first for file name, second for extention
        $newfileName = round(microtime(true)) . "." . end($temp); //creat a random number based on current timestamp and append the extention to it.
        $new_target_file = $target_dir . $newfileName; //full path to the new file name
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
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
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $email = test_input($_COOKIE['email']);
        
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
           $sql = "UPDATE member SET profilephoto = '$new_target_file' WHERE email ='$email'";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
          mysqli_close($conn);
         header("location:aProfile.php");
    }
?>