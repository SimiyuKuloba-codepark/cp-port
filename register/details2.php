<?php 

session_start();

if(!isset($_SESSION['name'])){
    header("location:in.php");
}

require('connect.php');

$id = mysqli_real_escape_string($conn, $_GET['user_id']);

$query = 'SELECT * FROM users WHERE user_id = '.$id;

// Get Results
$result = mysqli_query($conn, $query);

// Fetch Data
$post = mysqli_fetch_assoc($result);
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

<?php include('inc/top.php'); ?>
    <!-- showcase -->
    <section id="db-showcase">
        <div class="db-showcase-container">
                <!-- Orders -->
                <div class="orders-data" style="display: none;">
                <h1 style="color: black;">Data One:</h1>
                <table>
                    <tr>
                        <th>Order Id</th>
                        <th>Client Name</th>
                        <th>Client Email</th>
                        <th>Contacts</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Budget</th>
                    </tr>
                    <?php foreach($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['order_id'] ?></td>
                        <td><?php echo $order['client_name'] ?></td>
                        <td><?php echo $order['client_email'] ?></td>
                        <td><?php echo $order['client_phone'] ?></td>
                        <td><?php echo $order['start_date'] ?></td>
                        <td><?php echo $order['end_date'] ?></td>
                        <td><?php echo $order['budget'] ?></td>
                    </tr>
                    <?php endforeach; ?>    

                </table>
                
            </div>


            <!-- messages-data -->
            <div class="messages-data" style="display: none;">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contacts</th>
                        <th>Message</th>
                    </tr>
                    <?php foreach($messos as $messo) : ?>
                    <tr>
                        <td><?php echo $messo['id'] ?></td>
                        <td><?php echo $messo['name'] ?></td>
                        <td><?php echo $messo['email'] ?></td>
                        <td><?php echo $messo['phone'] ?></td>
                        <td><?php echo $messo['message'] ?></td>
                    </tr>
                    <?php endforeach; ?>    

                </table>
            </div>


            <!-- users-data -->
            <div class="user-data" style="display: none;">
                <table>

                    <tr>
                        <th>Profile Pic</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>

                    <?php foreach($posts as $post) : ?>
                    <tr>
                        <td><?php echo '<img src="data:image;base64;base64, '.base64_encode($post['profile']).'" alt="Profile Pic" style="width:50px; height:50px; border-radius:50%;">' ?></td>
                        <td><a href="details2.php?user_id=<?php echo $post['user_id']; ?>"><?php echo $post['user_id'] ?></a></td>
                        <td><?php echo $post['username'] ?></td>
                        <td><?php echo $post['email'] ?></td>
                        <td><?php echo $post['password'] ?></td>
                    </tr>
                    <?php endforeach; ?>    

                </table>
            </div>

            <!--individual -data -->
            <?php require('process.php'); ?>
            <div class="individual-data">
                <table>

                    <tr>
                        <td style=""><?php echo '<img src="data:image;base64;base64, '.base64_encode($post['profile']).'" alt="Profile Pic" style="width:200px; height:200px;margin-right:auto; margin-left:auto;">' ?></td>
                    </tr>
                    <tr>    
                        <td>User Id: <span style="font-weight:bold;"><?php echo $post['user_id'] ?></span></td>
                    </tr>    
                    <tr>
                        <td>Username: <span style="font-weight:bold;"><?php echo $post['username'] ?></span></td>
                    </tr>
                    <tr>    
                        <td>Email: <span style="font-weight:bold;"><?php echo $post['email'] ?></span></td>
                    </tr>
                    <tr>    
                        <td>User Bio: <span style="font-weight:bold;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas ex ipsa mollitia voluptates suscipit, numquam et quis quasi ipsum accusantium doloribus asperiores est facilis minima! Esse, corrupti. Vero, deleniti labore.</span></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="process.php?delete=<?php echo $post['user_id']; ?>">Delete</a>
                            <a href="edit.php?edit=<?php echo $post['user_id']; ?>">Edit User</a>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </section>

    </div>
        </div>
    </section>

<script src="db2.js"></script> 

</body>
</html>