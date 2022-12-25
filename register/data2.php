<?php 

session_start();

if(!isset($_SESSION['name'])){
    header("location:in.php");
}

require('connect.php');

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
} 

$results_per_page = 5;  
$page_first_result = ($page-1) * $results_per_page; 

$query = "SELECT * FROM users ORDER BY user_id DESC";  
$result = mysqli_query($conn, $query);  
$count = mysqli_num_rows($result);  
  
//determine the total number of pages available  
$number_of_page = ceil ($count / $results_per_page);

$query = "SELECT * FROM users LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query); 

// users-query
// $query = mysqli_query($conn, "SELECT * FROM users ORDER BY user_id DESC LIMIT $page1,5");

// users Number of Pages
// $query1 = mysqli_query($conn, "SELECT * FROM users ORDER BY user_id DESC");

// $count = mysqli_num_rows($query1);

// $a = ceil($count/5);


// Get Results

// Fetch Data
// $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($posts);

// Free Result
// mysqli_free_result($result);

// Close Connection
// mysqli_close($conn);


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
            <div class="user-data">
                <!-- search-engine -->
                <div class="middle">
                    <form action="" method="POST">
                        <div class="search-content">
                            <input type="text" name="id" placeholder="Enter Username">
                            <input class="submit" type="submit" name="search" value="Search">
                        </div>    
                    </form>
                </div>

                <table>

                    <tr>
                        <th>Profile Pic</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>

                    <?php 
                    require('connect.php');

                    if(isset($_POST['search'])){
                        $id = $_POST['id'];

                        $query = "SELECT * FROM users WHERE username = '$id' ";
                        $result = mysqli_query($conn, $query);

                    ?>    

                        <?php while($post = mysqli_fetch_array($result)) : ?> 

                            <tr>
                                <td><?php echo '<img src="data:image;base64;base64, '.base64_encode($post['profile']).'" alt="Profile Pic" style="width:50px; height:50px; border-radius:50%;">' ?></td>
                                <td><a href="details2.php?user_id=<?php echo $post['user_id']; ?>"><?php echo $post['user_id'] ?></a></td>
                                <td><?php echo $post['username'] ?></td>
                                <td><?php echo $post['email'] ?></td>
                                <td><?php echo $post['password'] ?></td>
                            </tr>
                        

                        <?php endwhile ?>   

                    <?php

                    }
                    
                    ?>

                    <?php while($post = mysqli_fetch_array($result)) : ?> 
                    
                        <tr style="z-index: 2 !important;">
                            <td><?php echo '<img src="data:image;base64;base64, '.base64_encode($post['profile']).'" alt="Profile Pic" style="width:50px; height:50px; border-radius:50%;">' ?></td>
                            <td><a href="details2.php?user_id=<?php echo $post['user_id']; ?>"><?php echo $post['user_id'] ?></a></td>
                            <td><?php echo $post['username'] ?></td>
                            <td><?php echo $post['email'] ?></td>
                            <td><?php echo $post['password'] ?></td>
                        </tr>

                    <?php endwhile ?>   


                </table>
                <br>
                <div class="trek">
                    <div class="wild">


                        <?php 
                    
                            for($page=1; $page<=$number_of_page; $page++)
                        {

                        ?>
                                <?php echo '<a href = "data2.php?page=' . $page . '">' . $page . ' </a>'; ?>
                        <?php

                        }
                    
                        ?> 
                    </div>

                </div>

            </div>

        </div>
    </section>

    </div>
        </div>
    </section>

<script src="db.js"></script> 

</body>
</html>
