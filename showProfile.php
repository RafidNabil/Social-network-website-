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
if (isset($_GET['userid'])) {
    // Retrieve the user ID from the session
    $userID = $_GET['userid'];

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
    <div class="profile">
        <section class="h-100 gradient-custom-2">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-9 col-xl-7">
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
                                    <div class="d-flex pt-1">
                                        <button type="button"
                                            class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                                        <button type="button" class="btn btn-primary flex-grow-1">Send Request</button>
                                    </div>

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


                                    <!-- <div class="row g-2">
                                        <div class="col">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                                                alt="image 1" class="w-100 rounded-3">
                                        </div>
                                        <div class="col">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                                                alt="image 1" class="w-100 rounded-3">
                                        </div>
                                        
                                    </div>

                                    <div class="row g-2">
                                        <div class="col">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                                                alt="image 1" class="w-100 rounded-3">
                                        </div>
                                        <div class="col">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                                                alt="image 1" class="w-100 rounded-3">
                                        </div>
                                    </div> -->
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