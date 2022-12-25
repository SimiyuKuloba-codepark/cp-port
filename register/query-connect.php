<?php 



require('connect.php');

// users-query
$query = 'SELECT * FROM users';

// Get Results
$result = mysqli_query($conn, $query);

// Fetch Data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($posts);

// Free Result
mysqli_free_result($result);

// Close Connection
mysqli_close($conn);


// messages-query
require('connect.php');

$messages_query = 'SELECT * FROM messages';

// Get Results
$messages_result = mysqli_query($conn, $messages_query);

// Fetch Data
$messos = mysqli_fetch_all($messages_result, MYSQLI_ASSOC);
// var_dump($posts);

// Free Result
mysqli_free_result($messages_result);

// Close Connection
mysqli_close($conn);


// orders-query
require('connect.php');

$orders_query = 'SELECT * FROM orders';

// Get Results
$orders_result = mysqli_query($conn, $orders_query);

// Fetch Data
$orders = mysqli_fetch_all($orders_result, MYSQLI_ASSOC);
// var_dump($posts);

// Free Result
mysqli_free_result($orders_result);

// Close Connection
mysqli_close($conn);

?>