<?php
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //this url will inclode true if the post added to the database

            $content = $picture = $email = "";
            
            ////////////////////////// Attatching Image Script ///////////////////////////////////////////////////
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //referenceing full path of the attached photo.
            $temp = explode(".", basename($_FILES["fileToUpload"]["name"])); //creat an array with 2 index, first have the file name, second have the extention.
            $newfileName = round(microtime(true)) . "." . end($temp); //product a random number based on the current time and append the extension from the originally uploaded file.
            $new_target_file = $target_dir . $newfileName;
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
            //////////////// End of Attatching Image Script ///////////////////////////
      
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          
          $content = test_input($_POST['message']);
          $email = test_input($_COOKIE['email']);
          echo $content;
          
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
           $sql = "INSERT INTO post (email , content , picture ) VALUES ('$email' , '$content' , '$new_target_file')";
           
            //here i check if the img came from form empty
             if($target_file == "uploads/")
                $sql = "INSERT INTO post (email , content ) VALUES ('$email' , '$content' )";
             
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
          mysqli_close($conn);
          header("location:home.php");
      }
?>