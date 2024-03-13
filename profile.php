<?php
session_start();
// Database connection details
$host = 'localhost';
$db = 'socialnetwork';
$user = 'root';
$password = '';

// Establish a database connection
$mysqli = new mysqli($host, $user, $password, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the user ID is set in the session
if (isset($_SESSION['userID'])) {
    // Retrieve the user ID from the session
    $userID = $_SESSION['userID'];

    // Fetch user information from the database using the user ID
    $sql = "SELECT * FROM User WHERE UserID = $userID";
    $result = $mysqli->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $userData = $result->fetch_assoc();

            // Now $userData contains all the user information
            // You can use $userData["ColumnName"] to access specific fields

            // Example: Display the user's email
            // echo "User Email: " . $userData["Email"];
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error: " . $mysqli->error;
    }


} else {
    // Redirect to login page if user ID is not set in the session
    header("Location: index.html");
    exit();
}

// Close the database connection
//$mysqli->close();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./Style/profile.css">
</head>

<body>
    <?php include './navbar.html'; ?>
    <div class="profile ">
        <section class="h-100 gradient-custom-2 ">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 offset-lg-3">
                            <div class="card">
                                <div class="rounded-top text-white d-flex flex-row"
                                    style="background-color: #000; height:200px;">
                                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                        <img src="<?php echo $userData["ProfilePicture"] ?>" `
                                            alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                            style="width: 150px; z-index: 1">
                                        <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                                            style="z-index: 1;">
                                            <a href="./editprofile.html">Edit Profile</a>
                                        </button>
                                    </div>
                                    <div class="ms-3" style="margin-top: 130px;">
                                        <h5>
                                            <?php echo $userData["FirstName"] . $userData["LastName"] ?>
                                        </h5>
                                        <p>
                                            <?php echo $userData["Username"] ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="p-4 text-black" style="background-color: #000000">

                                    <div class="d-flex justify-content-end text-center py-1">
                                        <?php

                                        if ($userData["ProfilePicture"] != "") {
                                            echo '<form action="./PHP/deletepic.php">
                                            <button type="submit" type="button" class="btn btn-light"
                                                data-mdb-ripple-init>Delete Profile Pic</button>
                                        </form>';
                                        }

                                        ?>

                                        <!--<div>
                                        <p class="mb-1 h5">253</p>
                                        <p class="small text-muted mb-0">Photos</p>
                                    </div>
                                    <div class="px-3">
                                        <p class="mb-1 h5">1026</p>
                                        <p class="small text-muted mb-0">Followers</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 h5">478</p>
                                        <p class="small text-muted mb-0">Following</p>
                                    </div>-->
                                    </div>
                                </div>
                                <div class="card-body p-4 text-black">
                                    <div class="mb-5">
                                        <p class="lead fw-normal mb-1">Bio</p>
                                        <div class="p-4" style="background-color: #f8f9fa;">
                                            <?php echo $userData["Bio"] ?>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6>Information</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Email</h6>
                                                    <p class="text-muted">
                                                        <?php echo $userData["Email"] ?>
                                                    </p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Joined</h6>
                                                    <p class="text-muted">
                                                        <?php echo $userData["RegistrationDate"] ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <h6>Projects</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Location</h6>
                                                    <p class="text-muted">
                                                        <?php echo $userData["Location"] ?>
                                                    </p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Most Viewed</h6>
                                                    <p class="text-muted">Dolor sit amet</p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="<?php echo $userData['FacebookLink'] ?>"><i
                                                        class="fab fa-facebook-f fa-lg me-3"></i></a>
                                                <a href="<?php echo $userData['FacebookLink'] ?>"><i
                                                        class="fab fa-twitter fa-lg me-3"></i></a>
                                                <a href="<?php echo $userData['FacebookLink'] ?>"><i
                                                        class="fab fa-instagram fa-lg"></i></a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <p class="lead fw-normal mb-0">Recent photos</p>
                                            <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                                        </div>
                                        <?php
                                        // SQL query to select 'PostMedia' for the given UserID
                                        $query = "SELECT PostMedia FROM Post WHERE UserID = $userID";

                                        // Execute the query
                                        $result = $mysqli->query($query);

                                        // Check if the query was successful
                                        if ($result) {
                                            // Fetch and display the 'PostMedia' values
                                        

                                            for ($i = 0; $i < $result->num_rows; $i += 2) {
                                                $row1 = $result->fetch_assoc(); // Fetch i-th row
                                                $row2 = $result->fetch_assoc(); // Fetch i+1-th row
                                        
                                                $postMedia1 = '';
                                                $postMedia2 = '';

                                                if (!is_null($row1))
                                                    $postMedia1 = $row1['PostMedia'];
                                                if (!is_null($row2))
                                                    $postMedia2 = $row2['PostMedia'];

                                                // Print both values
                                                echo '<div class="row g-2">
                                            <div class="col mb-2">
                                                <img  src="' . $postMedia1 . '"
                                                    alt="" class="w-100 rounded-3">
                                            </div>
                                            <div class="col mb-2">
                                                <img  src="' . $postMedia2 . '"
                                                    alt="" class="w-100 rounded-3">
                                            </div>
                                        </div>';
                                            }

                                            // Free the result set
                                            //$result->free();
                                        } else {
                                            echo "Error executing query: " . $mysqli->error;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xl-3">

                            <!-------------------- frinds -------------------->
                            <div class="card" style="width: 30rem;">
                                <div class="card-header">
                                    <h3 class="card-title">Friends</h3>
                                </div>
                                <div class="card-body">

                                    <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "socialnetwork";

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Get the logged-in user's ID
                                    $selfID = $_SESSION['userID'];

                                    // SQL query to get friends of the logged-in user from Friendship table
                                    $sql = "SELECT u.* FROM Friendship f
                        JOIN User u ON (f.UserID1 = u.UserID OR f.UserID2 = u.UserID)
                        WHERE (f.UserID1 = $selfID OR f.UserID2 = $selfID)
                          AND u.UserID <> $selfID
                        LIMIT 5";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data for each friend
                                        while ($row = $result->fetch_assoc()) {
                                            echo '
                        <div class="d-flex text-black">
                            <div class="flex-shrink-0">
                                <a href="./showProfile.php?userid=' . $row["UserID"] . '">
                                    <img src="' . $row["ProfilePicture"] . '"
                                        alt="Generic placeholder image" class="img-fluid"
                                        style="width: 120px; border-radius: 10px;">
                                </a>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">' . $row["FirstName"] . ' ' . $row["LastName"] . '</h5>
                                <p class="mb-2" style="color: #2b2a2a;">' . $row["Username"] . '</p>
                                <p class="mb-2 " style="color: #2b2a2a;">' . $row["Location"] . '</p>
                                                        
                                <div class="d-flex pt-1">
                                    <button type="button" class="btn btn-primary flex-grow-1"><a style="color:white;" href="./message.php?CHATTING_WITH=' . $row["UserID"] . '&MY_ID=' . $selfID . '">Chat</a></button>
                                </div>
                            </div>
                        </div>';
                                        }
                                    } else {
                                        echo "No friends found";
                                    }

                                    // Close the database connection
                                    $conn->close();
                                    ?>



                                </div>
                            </div>


                            <!-------------------- Requets -------------------->
                            <div class="card" style="width: 30rem; margin-top: 20px;">
                                <div class="card-header">
                                    <h3 class="card-title">Requests</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    // Assuming your database connection details
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "socialnetwork";

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Get the logged-in user's ID
                                    $selfID = $_SESSION['userID'];


                                    // SQL query to get friend requests received by the logged-in user
                                    $sql = "SELECT u.*, fr.RequestID
        FROM FriendRequest fr
        JOIN User u ON fr.SenderID = u.UserID
        WHERE fr.ReceiverID = $selfID
          AND fr.Status = 'Pending'
        LIMIT 5";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data for each friend request
                                        while ($row = $result->fetch_assoc()) {
                                            $profilePicture = !empty($row["ProfilePicture"]) ? $row["ProfilePicture"] : "./uploads/noimg.jpg";
                                            echo '
        <div class="d-flex text-black">
            <div class="flex-shrink-0">
                <a href="./showProfile.php?userid=' . $row["UserID"] . '">
                    <img src="' . $profilePicture . '"
                        alt="Generic placeholder image" class="img-fluid"
                        style="width: 120px; border-radius: 10px;">
                </a>
            </div>
            <div class="flex-grow-1 ms-3">
                <h5 class="mb-1">' . $row["FirstName"] . ' ' . $row["LastName"] . '</h5>
                <p class="mb-2" style="color: #2b2a2a;">' . $row["Username"] . '</p>
                <p class="mb-2 " style="color: #2b2a2a;">' . $row["Location"] . '</p>

                <div class="d-flex pt-1">
                    <button type="button" class="btn btn-outline-primary me-1 flex-grow-1"><a href="./PHP/acceptRequest.php?receiver=' . $selfID . '&sender=' . $row["UserID"] . '&choice=' . 'Accept' . '">Accept</a></button>
                    <button type="button" class="btn btn-outline-primary me-1 flex-grow-1"><a href="./PHP/acceptRequest.php?receiver=' . $selfID . '&sender=' . $row["UserID"] . '&choice=' . 'Reject' . '">Rejected</a></button>
                </div>
            </div>
        </div>';
                                        }
                                    } else {
                                        echo "No friend requests to show";
                                    }

                                    // Close the database connection
                                    $conn->close();
                                    ?>


                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>