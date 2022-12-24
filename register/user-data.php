<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="data.css">
    <title>Document</title>
</head>
<body>
    
<table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php 

            require('config.php');
            require('connect.php');

            $query = 'SELECT * FROM users';

            // Get Results
            $result = mysqli_query($conn, $query);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo    "<tr><td>" 
                        . $row["user_id"] .   
                    "</td><td>" 
                        . $row["username"] . 
                    "</td><td>"
                        . $row["email"] . 
                    "</td><td>"
                        . $row["password"] . 
                    "</td></tr>";
            }
            echo "</table>";
            } else { echo "0 results"; }

            // Fetch data
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // var_dump($data);

            // Free Result
            mysqli_free_result($result);

            // Close Connection
            mysqli_close($conn);
        ?>
    </table>
    
    <?php 

        require('config.php');
        require('connect.php');

        $query = 'SELECT * FROM users';

        // Get Results
        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    ?>

    <tr>

        <td><?php echo '<img src="data:image;base64;base64, '.base64_encode($row['image']).'" alt="ella-pic" style="width:100px; height:100px;">' ?></td>
        <td><?php echo $row['user_id'] ?></td>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['password'] ?></td>

    </tr>
    <?php 

    }

    ?>
    </table>;
    <?php
    } else { echo "0 results"; }

        // Fetch data
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // var_dump($data);

        // Free Result
        mysqli_free_result($result);

        // Close Connection
        mysqli_close($conn);

    ?>;    


</body>
</html>