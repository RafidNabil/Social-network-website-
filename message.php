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
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="Style/message.css">

    <style>
        .scrollable-messages {
            max-height: 650px;
            /* Set the maximum height for the messages section */
            overflow-y: auto;
            /* Enable vertical scrolling if content exceeds the height */
            scrollbar-width: thin;
            /* Firefox */
            scrollbar-color: transparent transparent;
            /* Firefox */
            -ms-overflow-style: none;
            /* Internet Explorer 10+ */
        }
    </style>

</head>

<body>

    <section class="gradient-custom">
        <div class="container py-5">

            <div class="row">


                <!-- -------------------------Frirnds List------------------------- list -->

                <div class="col-md-6 col-lg-5 col-xl-5 mb-4 mb-md-0">

                    <h5 class="font-weight-bold mb-3 text-center text-white">Member</h5>

                    <div class="card mask-custom">
                        <div class="card-body">

                            <ul class="list-unstyled mb-0">
                                <li class="p-2 border-bottom"
                                    style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                                    <a href="#!" class="d-flex justify-content-between link-light">
                                        <div class="d-flex flex-row">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp"
                                                alt="avatar"
                                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                width="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">John Doe</p>
                                                <p class="small text-white">Hello, Are you there?</p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-white mb-1">Just now</p>
                                            <span class="badge bg-danger float-end">1</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="p-2 border-bottom"
                                    style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                                    <a href="#!" class="d-flex justify-content-between link-light">
                                        <div class="d-flex flex-row">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-1.webp"
                                                alt="avatar"
                                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                width="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">Danny Smith</p>
                                                <p class="small text-white">Lorem ipsum dolor sit.</p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-white mb-1">5 mins ago</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="p-2 border-bottom"
                                    style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                                    <a href="#!" class="d-flex justify-content-between link-light">
                                        <div class="d-flex flex-row">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp"
                                                alt="avatar"
                                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                width="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">Alex Steward</p>
                                                <p class="small text-white">Lorem ipsum dolor sit.</p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-white mb-1">Yesterday</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="p-2 border-bottom"
                                    style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                                    <a href="#!" class="d-flex justify-content-between link-light">
                                        <div class="d-flex flex-row">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp"
                                                alt="avatar"
                                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                width="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">Ashley Olsen</p>
                                                <p class="small text-white">Lorem ipsum dolor sit.</p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-white mb-1">Yesterday</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="p-2 border-bottom"
                                    style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                                    <a href="#!" class="d-flex justify-content-between link-light">
                                        <div class="d-flex flex-row">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-4.webp"
                                                alt="avatar"
                                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                width="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">Kate Moss</p>
                                                <p class="small text-white">Lorem ipsum dolor sit.</p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-white mb-1">Yesterday</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="p-2 border-bottom"
                                    style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                                    <a href="#!" class="d-flex justify-content-between link-light">
                                        <div class="d-flex flex-row">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                                                alt="avatar"
                                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                width="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">Lara Croft</p>
                                                <p class="small text-white">Lorem ipsum dolor sit.</p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-white mb-1">Yesterday</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="p-2">
                                    <a href="#!" class="d-flex justify-content-between link-light">
                                        <div class="d-flex flex-row">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                                alt="avatar"
                                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                width="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">Brad Pitt</p>
                                                <p class="small text-white">Lorem ipsum dolor sit.</p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-white mb-1">5 mins ago</p>
                                            <span class="text-white float-end"><i class="fas fa-check"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-7 col-xl-7 scrollable-messages">

                    <ul class="list-unstyled text-white">

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
                        if (isset($_SESSION['userID'])) {
                            $userID = $_SESSION['userID'];

                            // Fetch messages and user details using JOIN
                            $query = "SELECT message.*, User.Username, User.ProfilePicture
                                      FROM message 
                                      JOIN User ON message.SenderID = User.UserID";

                            $result = $mysqli->query($query);

                            if ($result) {
                                while ($row = $result->fetch_assoc()) {

                                    if ($row['SenderID'] == $_SESSION['userID']) {
                                        echo $_GET['chatid'];
                                        echo '<li class="d-flex justify-content-between mb-4">
                                            <div class="card mask-custom w-100">
                                                <div class="card-header d-flex justify-content-between p-3"
                                                    style="border-bottom: 1px solid rgba(255,255,255,.3);">
                                                    <p class="fw-bold mb-0">' . $row['Username'] . '</p>
                                                    <p class="text-light small mb-0"><i class="far fa-clock"></i> ' . $row['Timestamp'] . '</p>
                                                </div>
                                                <div class="card-body">
                                                    <p class="mb-0">' . $row['Content'] . '</p>
                                                </div>
                                            </div>
                                            <img src="' . $row['ProfilePicture'] . '" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
                                        </li>';

                                    } else {

                                        echo '<li class="d-flex justify-content-between mb-4">
                                          <img src="' . $row['ProfilePicture'] . '" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
                                                  <div class="card mask-custom w-100">
                                                           <div class="card-header d-flex justify-content-between p-3"
                                                                style="border-bottom: 1px solid rgba(255,255,255,.3);">
                                                                    <p class="fw-bold mb-0">' . $row['Username'] . '</p>
                                                                       <p class="text-light small mb-0"><i class="far fa-clock"></i> ' . $row['Timestamp'] . '</p>
                                                                   </div>
                                                              <div class="card-body">
                                                    <p class="mb-0">' . $row['Content'] . '</p>
                                                         </div>
                                                  </div>
                                           </li>';

                                    }

                                }

                                $mysqli->close();
                            } else {
                                echo "Error retrieving messages: " . $mysqli->error;
                            }
                        }
                        ?>
                        <!-- -------------------------Text Input------------------------- list -->
                        <li class="mb-3">
                            <div class="form-outline form-white">
                                <form action="./PHP/addMsg.php" method="post" enctype="multipart/form-data">
                                    <textarea class="form-control" id="textAreaExample3" name="content" rows="3"
                                        style="background-color: rgba(255, 255, 255, 0.3);"></textarea>
                                    <label class="form-label" for="textAreaExample3">Message</label>
                                    <button type="submit"
                                        class="btn btn-light btn-lg btn-rounded float-end">Send</button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </div>

            </div>

        </div>
    </section>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>