<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: index.php');
}
include_once 'connection.php';
$id = $_SESSION['id'];


$sql = "SELECT * FROM users where id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

                        <h2>Welcome, <?php echo ucfirst($_SESSION['name']); ?></h2>

                        <form action="logout.php" method="post">
                            <button type="submit" class="btnn">Logout</button>
                        </form>

                        <hr>
                        <h4>Profile</h4>
                        <table>
                            <thead class="table_head">
                                <tr>
                                    <td>SN</td>
                                    <td>Username</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>phone</td>

                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = 1;
                                ?>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['firstname'] ?></td>
                                            <td><?php echo $row['lastname'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>


                                        </tr>

                                <?php

                                    }
                                } ?>

                            </tbody>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </section>

    <script src="project1/assets/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>