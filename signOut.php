<?php
setcookie('email' , "" , time() - 86400  ,'/' );
header('REFRESH:0;URL=index.php');
?>