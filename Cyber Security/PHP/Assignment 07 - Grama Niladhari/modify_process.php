<html>
    <head>
        <style>
            body {
                background: #4546E5;
            }
            h1 {
                color: #fff;
                text-align: center;
                font-size: 20px;
                font-weight: bold;
            }

            h2{
                color: #fff;
                text-align: center;
                font-size: 20px;
                font-weight: bold;
            }

            .success-message {
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
    padding: 15px;
    margin: 20px 0;
    font-family: Arial, sans-serif;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.error-message {
    color: #721c24;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    border-radius: 4px;
    padding: 15px;
    margin: 20px 0;
    font-family: Arial, sans-serif;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Animation for the messages */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.success-message, .error-message {
    animation: fadeIn 0.3s ease-out;
}

/* Optional: Add an icon before the message */
.success-message::before {
    content: "✓ ";
    font-weight: bold;
}

.error-message::before {
    content: "✗ ";
    font-weight: bold;
}

        </style>
    </head>
    <body>
<?php
       include("config.php");
    if(isset($_SESSION['row_data'])){
        $row = $_SESSION['row_data']; // get the row data from session
        $id = $_POST['id'];

        $fullname = $_POST['fullname'];
        $dob = $_POST['dob'];
        $nic = $_POST['nic'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $occupation = $_POST['occupation'];
        $gender = $_POST['gender'];

        $result = mysqli_query($mysqli, "UPDATE residents SET full_name='$fullname', dob='$dob', nic='$nic', address='$address', phone='$phone', email='$email', occupation='$occupation', gender='$gender' WHERE id=$id");

        if($result){
            echo "<style>.success-message {Resident Details Updated Successfully!}</style>";
        }
        else{
            echo "<h2>Could not update resident details. Please try again.</h2>";
        }
    }


    ?> 
    <a href="index.php" style="font-size: 28px">Go to Home</a>
    </body>
</html>