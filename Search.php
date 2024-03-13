<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>3 x n Cards</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./Style/search.css">
</head>

<body>
    <?php include './navbar.html'; ?>

    <div class="search-bar">
        <form action="" method="post">
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" name="search" />

                <!-- Add a dropdown menu for selecting search criteria -->
                <select class="form-select" name="searchCriteria">
                    <option value="name">Search by Name</option>
                    <option value="location">Search by Location</option>
                </select>

                <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Search</button>
            </div>
        </form>
    </div>

    <div class="container mt-4" style="margin-left: 25%">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if the "search" and "searchCriteria" keys exist in the $_POST array
                if (isset($_POST['search'], $_POST['searchCriteria'])) {
                    // Retrieve the search input value and search criteria
                    $searchValue = $_POST['search'];
                    $searchCriteria = $_POST['searchCriteria'];

                    // Perform a database query based on the selected criteria
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "socialnetwork";

                    // Create a connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check the connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Use prepared statements to prevent SQL injection
                    if ($searchCriteria === "name") {
                        $stmt = $conn->prepare("SELECT * FROM User WHERE Username LIKE ?");
                    } elseif ($searchCriteria === "location") {
                        $stmt = $conn->prepare("SELECT * FROM User WHERE Location LIKE ?");
                    } else {
                        echo "<p>Invalid search criteria</p>";
                        exit;
                    }

                    $searchPattern = "%" . $searchValue . "%";
                    $stmt->bind_param("s", $searchPattern);
                    $stmt->execute();

                    // Get the result set
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Display user cards as needed
                            echo '<div class="card" style="border-radius: 15px; margin: 0.25rem 0.25rem 0.25rem 0.25rem">
                                    <div class="card-body text-center">
                                        <div class="mt-3 mb-4">
                                            <img src="' . $row['ProfilePicture'] . '"
                                                class="rounded-circle img-fluid" style="width: 100px;" />
                                        </div>
                                        <h4 class="mb-2">' . $row['Username'] . '</h4>
                                        <p class="text-muted mb-4">' . $row['Email'] . '</p>
                                        <p class="text-muted mb-4">' . $row['Location'] . '</p>
                                        <div class="mb-4 pb-2">
                                            <button type="button" class="btn btn-outline-primary btn-floating">
                                            <a href="' . $row['FacebookLink'] . '"><i class="fab fa-facebook fa-lg"></i></a>
                                            </button>
                                            <button type="button" class="btn btn-outline-primary btn-floating">
                                            <a href="' . $row['TwitterLink'] . '"><i class="fab fa-twitter fa-lg"></i></a>
                                            </button>
                                            <button type="button" class="btn btn-outline-primary btn-floating">
                                            <a href="' . $row['InstagramLink'] . '"><i class="fab fa-instagram fa-lg"></i></a>
                                            </button>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-rounded btn-lg">
                                            Message now
                                        </button>
                                        <button type="button" class="btn btn-primary btn-rounded btn-lg">
                                            Follow
                                        </button>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo '<p>No matching users found.</p>';
                    }

                    // Close the statement and connection
                    $stmt->close();
                    $conn->close();
                } else {
                    echo "<p>No search value or search criteria submitted</p>";
                }
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>

</body>

</html>
