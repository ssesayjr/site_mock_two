
<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect('deitralou24907.domaincommysql.com', 'dreiser', 'T4Equity2023!', 'member_portal'); 

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$query = "SELECT * FROM users"; 

?>


