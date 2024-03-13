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



    <section style="background-color: #eee;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card">
          <div class="card-body">
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
                            if(isset($_GET['postid'], $_GET['fname'], $_GET['lname'], $_GET['uname'], $_GET['pp'])){
                                $userID = $_SESSION['userID'];
                                $PostID = $_GET['postid'];
                                $fname = $_GET['fname'];
                                $lname = $_GET['lname'];
                                $uname = $_GET['uname'];
                                $pp = $_GET['pp'];

                                // Fetch posts and user details using JOIN
                                $query = "SELECT * FROM `post` WHERE PostID = ".$PostID.";";
    
                                $result = $mysqli->query($query);

                                
    
                                if ($result) {
                                    // Display the posts and user details
                                    while ($row = $result->fetch_assoc()) {
                                        $PostID =  $row['PostID'];
                                        // echo "PostMedia: " . $row['PostMedia'] . "<br>";
                                        // echo "Timestamp: " . $row['Timestamp'] . "<br>";
                                        // echo "User ID: " . $row['UserID'] . "<br>";
                                        // echo "User First Name: " . $row['FirstName'] . "<br>";
                                        // echo "User Last Name: " . $row['LastName'] . "<br>";
                                        // echo "User Username: " . $row['Username'] . "<br>";
                                        // echo "User Profile Picture: " . $row['ProfilePicture'] . "<br>";
                                        // echo "---------------------------------------<br>";
                            
    
    
                                        echo '<a href="./showPost.php?postid='.$PostID.'"><div class="d-flex p-3 border-bottom">
                                        <img src="' . $pp . '"
                                            height="50" alt="Avatar" loading="lazy" />
                                        <div class="d-flex w-100 ps-3">
                                            <div>
                                                <a href="">
                                                    <h6 class="text-body">
                                                        ' . $fname . ' ' . $lname . '
                                                        <span class="small text-muted font-weight-normal">' . $uname . '</span>
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
                            }
                            else{

                            }
                        } else {
                            echo "User not logged in.";
                        }
                    

                        // Close the database connection
                        $mysqli->close();
                        ?>

           

            <div class="small d-flex justify-content-start">
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-thumbs-up me-2"></i>
                <p class="mb-0">Like</p>
              </a>
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-comment-dots me-2"></i>
                <p class="mb-0">Comment</p>
              </a>
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="fas fa-share me-2"></i>
                <p class="mb-0">Share</p>
              </a>
            </div>
          </div>



          <!--------------- comments --------------->
          <div class="card-body p-4">
            <h4 class="text-center mb-4 pb-2">Comments</h4>

            <div class="row">
              <div class="col">
                

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

// Check if the user is logged in
if (isset($_SESSION['userID']) && isset($_GET['postid'])) {
    $userID = $_SESSION['userID'];
    $postID = $_GET['postid']; // Assuming the post ID is passed as a parameter in the URL

    // Fetch comments and user details using JOIN, and filter by post ID
    $query = "SELECT comment.*, User.Username, User.ProfilePicture
              FROM comment 
              JOIN User ON comment.UserID = User.UserID
              WHERE comment.PostID = $postID
              ORDER BY comment.Timestamp DESC"; // Order by timestamp to show the latest comments first

    $result = $mysqli->query($query);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo '<li class="d-flex justify-content-between mb-4">
                      <img src="' . $row['ProfilePicture'] . '" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
                      <div class="card mask-custom w-100">
                           <div class="card-header d-flex justify-content-between p-3" style="border-bottom: 1px solid rgba(255,255,255,.3);">
                                <p class="fw-bold mb-0">' . $row['Username'] . '</p>
                                <p class="text-light small mb-0"><i class="far fa-clock"></i> ' . $row['Timestamp'] . '</p>
                           </div>
                           <div class="card-body">
                                <p class="mb-0">' . $row['Content'] . '</p>
                           </div>
                      </div>
                  </li>';
        }

        $mysqli->close();
    } else {
        echo "Error retrieving comments: " . $mysqli->error;
    }
}
?>

              </div>
            </div>
          </div>




          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              <img class="rounded-circle shadow-1-strong me-3"
                src=<?php echo $userData['ProfilePicture'] ?>  alt="avatar" width="40"
                height="40" />

                <div class="form-outline w-100">

                <form action="./PHP/addComment.php?postid=<?php echo $PostID; ?>&fname=<?php echo $fname; ?>&lname=<?php echo $lname; ?>&uname=<?php echo $uname; ?>&pp=<?php echo $pp; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="postid" value="<?php echo $PostID; ?>">
    <textarea class="form-control" id="textAreaExample" name="content" rows="4" style="background: #fff;"></textarea>
    <label class="form-label" for="textAreaExample">Message</label>
    <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
</form>

</div>

        </div>
      </div>
    </div>
  </div>
</section>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>