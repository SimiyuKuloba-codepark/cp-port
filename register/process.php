<?php 

session_start();

$conn = mysqli_connect('localhost', 'codepark_intel', 'Photography101.', 'codepark_codepark');

$id = 0;
$username = '';
$email = '';

$errors = array();

if(isset($_GET['delete'])){
    $go = $_GET['delete'];

    $conn->query("DELETE FROM users WHERE user_id=$go");

    $_SESSION['alert'] = "Record has been deleted!";

    header("location:data2.php");
} 

if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $query = "SELECT * FROM users WHERE user_id = $id ";

    $result = mysqli_query($conn, $query);

    if($result->num_rows){
        $post = $result->fetch_array();
        $username = $post['username'];
        $email = $post['email'];
    }
}
 
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $email = $_POST['email'];

        $query = "UPDATE users SET username = '$username', email = '$email', profile = '$image' WHERE user_id=$id";
        mysqli_query($conn, $query);

        $_SESSION['info'] = "Record has been updated!";

        header("location:data2.php");

    } 
    

?>

