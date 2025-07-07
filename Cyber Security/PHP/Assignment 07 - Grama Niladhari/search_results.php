<?php
include("config.php");

// Initialize variables
$fullname = $nic = $address = '';
$search_results = [];
$message = '';

if(isset($_POST['submit'])) {
    // Sanitize input data
    $fullname = mysqli_real_escape_string($mysqli, $_POST['fullname'] ?? '');
    $nic = mysqli_real_escape_string($mysqli, $_POST['nic'] ?? '');
    $address = mysqli_real_escape_string($mysqli, $_POST['address'] ?? '');

    // Build the SQL query with conditions for each search field
    $sql = "SELECT * FROM residents WHERE 1=1";
    
    if(!empty($fullname)) {
        $sql .= " AND full_name LIKE '%$fullname%'";
    }
    if(!empty($nic)) {
        $sql .= " AND nic LIKE '%$nic%'";
    }
    if(!empty($address)) {
        $sql .= " AND address LIKE '%$address%'";
    }

    // Execute the query
    $result = mysqli_query($mysqli, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $search_results[] = $row;
        }
        $message = count($search_results) . " resident(s) found!";
    } else {
        $message = "No residents found matching your criteria!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Search Results</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-weight: bold;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .search-again {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .search-again:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <?php
    include("config.php");

    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $nic = $_POST['nic'];
        $address = $_POST['address'];

        $result = mysqli_query($mysqli, "SELECT * FROM residents WHERE full_name LIKE '%$fullname%' AND nic LIKE '%$nic%'AND address LIKE '%$address%'");
    
                    if($result) {
                if(mysqli_num_rows($result) > 0) {
                    echo "Resident Found!";
                    $row = mysqli_fetch_assoc($result);
                    // Process resident data here
                } else {
                    echo "Resident not found!";
                }
            } else {
                echo "Error in query: " . mysqli_error($mysqli);
            }
    }

    ?>
        <H1>Resident Results Found</H1>

        <div class="resident-details">
            <h2>Resident Details</h2>
            <p><strong>Id: <?php echo $row['id']; ?></strong></p>
            <p><strong>Full_name: <?php echo $row['full_name']; ?></strong></p>
            <p><strong>Date of Birth: <?php echo $row['dob']; ?></strong></p>
            <p><strong>NIC: <?php echo $row['nic']; ?></strong></p>
            <p><strong>Address: <?php echo $row['address']; ?></strong></p>
            <p><strong>Phone: <?php echo $row['phone']; ?></strong></p>
            <p><strong>Email: <?php echo $row['email']; ?></strong></p>
            <p><strong>Occupation: <?php echo $row['occupation']; ?></strong></p>
            <p><strong>Gender: <?php echo $row['gender']; ?></strong></p>
            <p><strong>Registered_date: <?php echo $row['registered_date']; ?></strong></p>
        

            <div class="buttons">
            <?php
            session_start();
            $_SESSION['row_data'] = $row; // save in session
            ?>
                <a href="modify.php">
                    <button class = "btn modify-btn" name = "submit">Modify</button>
                </a>
                <a href="delete.php">
                    <button class = "btn delete-btn" name = "clear">Delete</button>
                </a>
            <div>

        </div>
</body>
</html>