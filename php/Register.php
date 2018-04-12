<html>
<body>

<?php
// define variables and set to empty values
$fullName = $email = $gender = $password = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = test_input($_POST["fullName"]);
    $email = test_input($_POST["email"]);
    $date = test_input($_POST["date"]);
    $password = test_input($_POST["password"]);
    $gender = test_input($_POST["gender"]);
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>