<?php 
session_start();


if (!isset($_SESSION['username'])) {
    header('location: index.php');
    exit();
}

include_once 'connection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
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
                        <h4>Inbox</h4>
                        <table>
                            <thead class="table_head">
                                <tr>
                                    <td>SN</td>
                                    <td>Reciever</td>
                                    <td>Message</td>

                                </tr>
                            </thead>
                            <?php

                            include_once 'connection.php';


                            $sql = "SELECT id, receiver, message FROM compose";
                            $result = mysqli_query($conn, $sql);


                            $sn = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $sn++ . "</td>";
                                echo "<td>" . $row['receiver'] . "</td>";
                                echo "<td>" . $row['message'] . "</td>";
                                echo "</tr>";
                            }


                            mysqli_close($conn);
                            ?>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>