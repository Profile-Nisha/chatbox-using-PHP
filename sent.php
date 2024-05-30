
<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('location: index.php');
    exit();
}

include_once 'connection.php';

// $limit = 5;
// $page = isset($_GET['page']) ? $_GET['page'] : 1;
// $start = ($page - 1) * $limit;


// $sql = "SELECT id, sender, message FROM compose LIMIT $start, $limit";
// $result = mysqli_query($conn, $sql) or die("Query failed.");


// $sql_total = "SELECT COUNT(*) AS total FROM compose";
// $result_total = mysqli_query($conn, $sql_total);
// $row_total = mysqli_fetch_assoc($result_total);
// $total_records = $row_total['total'];
// $total_pages = ceil($total_records / $limit);
// mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-12 p-0">
                    <div class="chatCon">
                        <h3><i class="bi bi-chat-left-dots-fill"></i>chatbox</h3><br><br>
                        <h5 class="head"><i class="bi bi-person-check"></i><a href="dashboard.php">Profile</a></h5>
                        <hr>
                        <h5><i class="bi bi-pencil"></i><a href="compose.php">Compose</a></h5>
                        <hr>
                        <h5><i class="bi bi-inbox"></i><a href="inbox.php">Inbox</a></h5>
                        <hr>
                        <h5><i class="bi bi-send"></i><a href="sent.php">Sent</a></h5>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-9 col-12 p-0">
                    <div class="mainCon">
                        <h2>Welcome, <?php echo ucfirst($_SESSION['username']); ?></h2>


                        <form action="logout.php" method="post">
                            <button type="submit" class="btnn">Logout</button>
                        </form>
                        <hr>
                        <h4>Sent</h4>
                        <table>
                            <thead class="table_head">
                                <tr>
                                    <td>SN</td>
                                    <td>Sender</td>
                                    <td>Message</td>
                                </tr>
                            </thead>
                            <?php

                            include_once 'connection.php';


                            $sql = "SELECT id, sender, message FROM compose";
                            $result = mysqli_query($conn, $sql);


                            $sn = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $sn++ . "</td>";
                                echo "<td>" . $row['sender'] . "</td>";
                                echo "<td>" . $row['message'] . "</td>";
                                echo "</tr>";
                            }


                            mysqli_close($conn);
                            ?>

                        </table>
                        <?php
                        // $sql = "SELECT * FROM users";
                        // $result1 = mysqli_query($conn, $sql) or die("query failed.");
                        // if (mysqli_num_rows($result1) > 0) {
                        //     $total_records = mysqli_num_rows($result1);
                        //     $limit = 5;
                        //     $total_pages = ceil($total_records / $limit);
                        //     echo '<ul class="pagination">';
                        //     for ($i = 1; $i <= $total_pages; $i++) {
                        //         echo "<li><a href='sent.php?page={$i}'>{$i}</a></li>";
                        //     }
                        //     echo '</ul>';
                        // }
                        // mysqli_close($conn);
                        ?>
                         <!-- <li class="active"><a>1</a></li>  -->
                        </div>
                    </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>