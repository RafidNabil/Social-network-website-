<?php
session_start();
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
    <link rel="stylesheet" href="./Style/news-feed.css">
</head>

<body>

    <?php include './navbar.html'; ?>

    <div class="main-container">
        <div class="news-feed">

            <div class="card" style="width: 68rem">
                <div class="border border-left border-right px-0">
                    <!-- <div class="p-3 border-bottom">
            <h4 class="d-flex align-items-center mb-0">
                Home <i class="far fa-xs fa-star ms-auto text-primary"></i>
            </h4>
        </div> -->
                    <div>
                        <div class="card shadow-0">
                            <div class="card-body border-bottom pb-2">
                                <div class="d-flex">
                                    <img src="<?php echo $_SESSION['ProfilePic'] ?>" class="rounded-circle" height="50"
                                        alt="Avatar" loading="lazy" />
                                    <div class="d-flex align-items-center w-100 ps-3">
                                        <div class="w-100">
                                            <form action="./PHP/post.php" method="post" enctype="multipart/form-data">
                                                <input type="text" name="content" id="form143"
                                                    class="form-control form-status border-0 py-1 px-0"
                                                    placeholder="What's happening" />
                                                <br>
                                                <label for="photo">Select photo</label>
                                                <input style="width: 20rem" type="file" id="photo" name="photo"
                                                    class="form-control" />
                                                <br>
                                                <div class="d-flex align-items-center">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-rounded">Post</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <ul class="list-unstyled d-flex flex-row ps-3 pt-3" style="margin-left: 50px;">
                                        <!--<li>
                                <a href=""><i class="far fa-image pe-2"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fas fa-photo-video px-2"></i></a>
                            </li>
                             <li>
                                <a href=""><i class="fas fa-chart-bar px-2"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="far fa-smile px-2"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="far fa-calendar-check px-2"></i></a>
                            </li> -->
                                    </ul>
                                    <!-- <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-primary btn-rounded">Post</button>
                        </div> -->
                                </div>
                            </div>
                        </div>
                        <div>


                            <?php


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

                            // Check if the user is logged in (you might need to modify this based on your authentication mechanism)
                            if (isset($_SESSION['userID'])) {
                                $userID = $_SESSION['userID'];

                                // Fetch posts and user details using JOIN
                                $query = "SELECT Post.*, User.FirstName, User.LastName, User.Username, User.ProfilePicture 
      FROM Post 
      JOIN User ON Post.UserID = User.UserID 
      ORDER BY Post.Timestamp DESC";

                                $result = $mysqli->query($query);

                                if ($result) {
                                    // Display the posts and user details
                                    while ($row = $result->fetch_assoc()) {
                                        // echo "PostID: " . $row['PostID'] . "<br>";
                                        // echo "PostMedia: " . $row['PostMedia'] . "<br>";
                                        // echo "Timestamp: " . $row['Timestamp'] . "<br>";
                                        // echo "User ID: " . $row['UserID'] . "<br>";
                                        // echo "User First Name: " . $row['FirstName'] . "<br>";
                                        // echo "User Last Name: " . $row['LastName'] . "<br>";
                                        // echo "User Username: " . $row['Username'] . "<br>";
                                        // echo "User Profile Picture: " . $row['ProfilePicture'] . "<br>";
                                        // echo "---------------------------------------<br>";
                                        $FirstName = $row['FirstName'];
                                        $LastName = $row['LastName'];
                                        $UserName = $row['Username'];
                                        $Profilepic = $row['ProfilePicture'];



                                        echo '<a href="./showPost.php?postid=' . $row['PostID'] . '&fname=' . $FirstName . '&lname=' . $LastName . '&uname=' . $UserName . '&pp=' . $Profilepic . '"><div class="d-flex p-3 border-bottom">
                            <img src="' . $row['ProfilePicture'] . '"
                                height="50" alt="Avatar" loading="lazy" />
                            <div class="d-flex w-100 ps-3">
                                <div>
                                    <a href="">
                                        <h6 class="text-body">
                                            ' . $row['FirstName'] . ' ' . $row['LastName'] . '
                                            <span class="small text-muted font-weight-normal">' . $row['Username'] . '</span>
                                            <span class="small text-muted font-weight-normal"> • </span>
                                            <span class="small text-muted font-weight-normal">' . $row['Timestamp'] . '</span>
                                            <span><i class="fas fa-angle-down float-end"></i></span>
                                        </h6>
                                    </a>
                                    <p style="line-height: 1.2;">
                                        ' . $row['Content'] . '
                                    </p>
                                    ';
                                        if ($row['PostMedia'] != '') {
                                            echo '<img
                                src="' . $row['PostMedia'] . '"
                                class="img-thumbnail"
                                alt="img"
                              />';
                                        }

                                        echo '<ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                            <li>
                                <i class="far fa-comment"></i>
                            </li>
                            <li><i class="fas fa-retweet"></i><span class="small ps-2">7</span></li>
                            <li><i class="far fa-heart"></i><span class="small ps-2">35</span></li>
                            <li>
                                <i class="far fa-share-square"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div></a>';
                                    }

                                    $result->free();
                                } else {
                                    echo "Error retrieving posts: " . $mysqli->error;
                                }
                            } else {
                                echo "User not logged in.";
                            }

                            // Close the database connection
                            $mysqli->close();
                            ?>

                            <div class="d-flex p-3 border-bottom">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (29).webp"
                                    class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
                                <div class="d-flex w-100 ps-3">
                                    <div>
                                        <a href="">
                                            <h6 class="text-body">
                                                Miley Cyrus
                                                <span class="small text-muted font-weight-normal">@mileycyrus</span>
                                                <span class="small text-muted font-weight-normal"> • </span>
                                                <span class="small text-muted font-weight-normal">2h</span>
                                                <span><i class="fas fa-angle-down float-end"></i></span>
                                            </h6>
                                        </a>
                                        <p style="line-height: 1.2;">
                                            Lorem ipsum dolor, sit amet <a href="">#consectetur</a> adipisicing elit.
                                            Nobis assumenda eveniet ipsum libero mollitia vero doloremque
                                            <a href="">#perspiciatis</a> molestiae omnis, quam iure dicta reprehenderit
                                            distinctio facere labore atque, sit <a href="">#ratione</a> quo.
                                        </p>
                                        <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                                            <li>
                                                <i class="far fa-comment"></i>
                                            </li>
                                            <li><i class="fas fa-retweet"></i><span class="small ps-2">7</span></li>
                                            <li><i class="far fa-heart"></i><span class="small ps-2">35</span></li>
                                            <li>
                                                <i class="far fa-share-square"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex p-3 border-bottom">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (29).webp"
                                    class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
                                <div class="d-flex w-100 ps-3">
                                    <div>
                                        <a href="#">
                                            <h6 class="text-body">
                                                Miley Cyrus
                                                <span class="small text-muted font-weight-normal">@mileycyrus</span>
                                                <span class="small text-muted font-weight-normal"> • </span>
                                                <span class="small text-muted font-weight-normal">3h</span>
                                                <span><i class="fas fa-angle-down float-end"></i></span>
                                            </h6>
                                        </a>
                                        <p style="line-height: 1.2;">
                                            Nobis assumenda eveniet ipsum libero mollitia vero doloremque molestiae
                                            reprehenderit.
                                        </p>
                                        <div class="card border mb-3 shadow-0" style="max-width: 540px;">
                                            <div class="row g-0">
                                                <div class="col-md-3">
                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (21).webp"
                                                        alt="Avatar" class="img-fluid rounded-left" />
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <p class="card-text" style="line-height: 1;">
                                                            Title of the news
                                                        </p>
                                                        <p class="card-text small mb-0" style="line-height: 1.2;">
                                                            This is a wider card with supporting text below as a natural
                                                            lead-in
                                                            to additional content.
                                                        </p>
                                                        <p class="card-text small mb-0" style="line-height: 1.2;">
                                                            <i class="fas fa-link fa-xs pe-1"></i>example.pl
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                                            <li>
                                                <i class="far fa-comment"></i>
                                            </li>
                                            <li><i class="fas fa-retweet"></i><span class="small ps-2">51</span></li>
                                            <li><i class="far fa-heart"></i><span class="small ps-2">185</span></li>
                                            <li>
                                                <i class="far fa-share-square"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex p-3 border-bottom">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (22).webp"
                                    class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
                                <div class="d-flex w-100 ps-3">
                                    <div>
                                        <a href="#">
                                            <h6 class="text-body">
                                                Bob Marley
                                                <span class="small text-muted font-weight-normal">@bobmarley</span>
                                                <span class="small text-muted font-weight-normal"> • </span>
                                                <span class="small text-muted font-weight-normal">5h</span>
                                                <span><i class="fas fa-angle-down float-end"></i></span>
                                            </h6>
                                        </a>
                                        <p style="line-height: 1.2;">
                                            Lorem ipsum dolor, sit amet <a href="">#consectetur</a> adipisicing elit.
                                            Officiis, <a href="">#repellat</a>. Error cumque temporibus eum pariatur
                                            ducimus facere? Obcaecati fugit, nobis eos <a href="">#deserunt</a> odit
                                            libero voluptatibus, iste laudantium, tempore ratione ut.
                                        </p>
                                        <div class="card border mb-3 shadow-0" style="max-width: 540px;">
                                            <div class="row g-0">
                                                <div class="col-md-3">
                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (20).webp"
                                                        alt="Avatar" class="img-fluid rounded-left" />
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <p class="card-text" style="line-height: 1;">
                                                            Title of the news
                                                        </p>
                                                        <p class="card-text small mb-0" style="line-height: 1.2;">
                                                            This is a wider card with supporting text below as a natural
                                                            lead-in
                                                            to additional content.
                                                        </p>
                                                        <p class="card-text small mb-0" style="line-height: 1.2;">
                                                            <i class="fas fa-link fa-xs pe-1"></i>example.pl
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                                            <li>
                                                <i class="far fa-comment"></i>
                                            </li>
                                            <li><i class="fas fa-retweet"></i><span class="small ps-2">8</span></li>
                                            <li><i class="far fa-heart"></i><span class="small ps-2">97</span></li>
                                            <li>
                                                <i class="far fa-share-square"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex p-3 border-bottom">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (24).webp"
                                    class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
                                <div class="d-flex w-100 ps-3">
                                    <div>
                                        <a href="">
                                            <h6 class="text-body">
                                                Anna Doe
                                                <span class="small text-muted font-weight-normal">@annadoe</span>
                                                <span class="small text-muted font-weight-normal"> • </span>
                                                <span class="small text-muted font-weight-normal">7h</span>
                                                <span><i class="fas fa-angle-down float-end"></i></span>
                                            </h6>
                                        </a>
                                        <p style="line-height: 1.2;">
                                            Error cumque temporibus eum pariatur ducimus facere? Obcaecati fugit, nobis
                                            eos <a href="">#deserunt</a> odit libero voluptatibus, iste laudantium,
                                            tempore ratione ut.
                                        </p>
                                        <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp"
                                            class="img-fluid rounded mb-3" alt="Fissure in Sandstone" />
                                        <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                                            <li>
                                                <i class="far fa-comment"></i>
                                            </li>
                                            <li><i class="fas fa-retweet"></i><span class="small ps-2">11</span></li>
                                            <li><i class="far fa-heart"></i><span class="small ps-2">65</span></li>
                                            <li>
                                                <i class="far fa-share-square"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex p-3 border-bottom mb-5">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (3).webp"
                                    class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
                                <div class="d-flex w-100 ps-3">
                                    <div>
                                        <a href="">
                                            <h6 class="text-body">
                                                Mark Twain
                                                <span class="small text-muted font-weight-normal">@marktawin</span>
                                                <span class="small text-muted font-weight-normal"> • </span>
                                                <span class="small text-muted font-weight-normal">10h</span>
                                                <span><i class="fas fa-angle-down float-end"></i></span>
                                            </h6>
                                        </a>
                                        <p style="line-height: 1.2;">
                                            Obcaecati fugit, nobis eos odit libero voluptatibus, iste laudantium,
                                            tempore ratione ut.
                                        </p>
                                        <div class="ratio ratio-16x9 mb-3">
                                            <iframe src="https://www.youtube.com/embed/vlDzYIIOYmM"
                                                title="YouTube video" allowfullscreen></iframe>
                                        </div>
                                        <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                                            <li>
                                                <i class="far fa-comment"></i>
                                            </li>
                                            <li><i class="fas fa-retweet"></i><span class="small ps-2">34</span></li>
                                            <li><i class="far fa-heart"></i><span class="small ps-2">159</span></li>
                                            <li>
                                                <i class="far fa-share-square"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Section: Newsfeed-->
        <section class="suggestions">
            <div class="card" style="max-width: 30rem;">
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

                    // Get the logged-in user's ID and location
                    $selfID = $_SESSION['userID'];
                    $selfLocation = $_SESSION['Location'];

                    // SQL query to get users who are not friends, and no friend request has been sent or received
                    $sql = "SELECT *
        FROM User u
        WHERE u.Location = '$selfLocation'
          AND u.UserID <> '$selfID'
          AND NOT EXISTS (
              SELECT 1
              FROM Friendship f
              WHERE (f.UserID1 = '$selfID' AND f.UserID2 = u.UserID)
                 OR (f.UserID1 = u.UserID AND f.UserID2 = '$selfID')
          )
          AND NOT EXISTS (
              SELECT 1
              FROM FriendRequest fr
              WHERE (fr.SenderID = '$selfID' AND fr.ReceiverID = u.UserID AND fr.Status = 'Pending')
                 OR (fr.SenderID = u.UserID AND fr.ReceiverID = '$selfID' AND fr.Status = 'Pending')
          )
        LIMIT 5";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data for each row
                        while ($row = $result->fetch_assoc()) {
                            echo '
        <div class="d-flex text-black" style="margin-top: 20px;">
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
                    <button type="button" class="btn btn-primary flex-grow-1"><a href="./PHP/sendRequest.php?sender=' . $selfID . '&receiver=' . $row["UserID"] . '" style="color:white;">Send Request</a></button>
                </div>
            </div>
        </div>';
                        }
                    } else {
                        echo "No results found";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>


                </div>
            </div>
        </section>
        <!--Section: Newsfeed-->
    </div>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>

</body>

</html>