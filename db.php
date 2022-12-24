<?php 
// Create Connection
$conn = mysqli_connect('localhost', 'codepark_intel', 'Photography101.', 'codepark_codepark');

// Check Connection
if(mysqli_connect_error()){
    echo 'Failed to connect to MySQL '. mysqli_connect_error();
}else{
    // echo 'Connected to Database';
}
?>