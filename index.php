<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Shop</title>
    <!-- Fixed Bootstrap CSS link (removed nested <link> tag) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>List of clients</h2>
        <a class="btn btn-primary" href="/crud-php/create.php" role="button">New Client</a>
        <br>

        <table class="table table-bordered table-striped"> <!-- Added Bootstrap table classes -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost"; // Fixed variable name (was $username twice)
                    $username = "root";
                    $password = "";
                    $database = "shop_db"; // Added missing semicolon

                    // Create connection
                    $connection = new mysqli($servername, $username, $password, $database); // Added missing connection line

                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }

                    // Read all rows from database table
                    $sql = "SELECT * FROM clients"; // Added missing semicolon
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }

                    // Read data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td> <!-- Fixed array syntax -->
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['created_at']}</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/crud-php/edit.php?id={$row['id']}'>Edit</a> <!-- Fixed quotes and syntax -->
                                <a class='btn btn-danger btn-sm' href='/crud-php/delete.php?id={$row['id']}'>Delete</a> <!-- Fixed quotes and syntax -->
                            </td>
                        </tr>
                        ";
                    }

                    // Close connection (added this important step)
                    $connection->close();
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- Bootstrap JS (recommended for some components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"></script>
</body>
</html>