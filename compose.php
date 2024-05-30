<?php

session_start();

include_once 'connection.php';



$username = $_SESSION['username'];

$sql = "SELECT username FROM users";

$usernames_result = mysqli_query($conn, $sql);

$usernames = [];


while ($row = mysqli_fetch_assoc($usernames_result)) {
    $usernames[] = $row['username'];
}


if (isset($_POST['submit'])) {

    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $message = $_POST['message'];


    $sql = "INSERT INTO compose (sender, receiver, message) VALUES ('$sender', '$receiver', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    mysqli_close($conn);
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>compose</title>
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
                        <h4>Compose</h4>
                        <form method="post" action="compose.php">
                            <div class="email-form">

                                <div class="form-group">
                                    <label for="to">From:</label>
                                    <input type="text" value="<?php echo $_SESSION['username']  ?>" name="sender" id="from">
                                </div>

                                <div class="form-group">
                                    <label for="to">To:</label>

                                    <select class="form-select" aria-label="Default select example" name="receiver" id="to">
                                        <option value="">select user</option>
                                        <?php
                                        
                                        foreach ($usernames as $name) {
                                            echo "<option value=\"$name\">$name</option>";
                                        }
                                        ?>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message"></textarea>
                                </div>
                                <button name="submit" class="btn-send" id="sendBtn">Send</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="./assets/js/custom.js"></script>
</body>

</html>