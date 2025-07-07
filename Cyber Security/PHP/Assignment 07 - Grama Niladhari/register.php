<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Registration</title>
</head>
<body>
    <style>
    :root {
        --primary: #6a11cb;
        --secondary: #2575fc;
        --accent: #ff4e50;
        --success: #38ef7d;
        --warning: #f9d423;
        --danger: #ff416c;
        --light: #f8f9fa;
        --dark: #212529;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        color: var(--dark);
    }

    .registration-container {
        background: rgba(255, 255, 255, 0.95);
        width: 100%;
        max-width: 700px;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        margin: 30px 0;
        border-top: 8px solid var(--accent);
        animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .form-title {
        font-size: 2.5rem;
        margin-bottom: 10px;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .form-subtitle {
        color: #6c757d;
        font-size: 1.1rem;
        font-weight: 500;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-row {
        display: flex;
        gap: 25px;
        margin-bottom: 25px;
    }

    .form-col {
        flex: 1;
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: var(--dark);
        font-weight: 600;
        font-size: 1rem;
    }

    input, select, textarea {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        background-color: var(--light);
    }

    input:focus, select:focus, textarea:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 4px rgba(106, 17, 203, 0.2);
        background-color: white;
        transform: translateY(-2px);
    }

    .submit-btn {
        background: linear-gradient(45deg, var(--primary), var(--secondary));
        color: white;
        border: none;
        padding: 18px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 12px;
        cursor: pointer;
        width: 100%;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 8px 20px rgba(106, 17, 203, 0.3);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 20px;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(106, 17, 203, 0.4);
        background: linear-gradient(45deg, var(--secondary), var(--primary));
    }

    .submit-btn:active {
        transform: translateY(1px);
    }

    .error {
        color: var(--danger);
        font-size: 0.9rem;
        margin-top: 8px;
        display: block;
        font-weight: 500;
        animation: shake 0.5s;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20%, 60% { transform: translateX(-5px); }
        40%, 80% { transform: translateX(5px); }
    }

    .success-message {
        padding: 15px;
        background-color: rgba(56, 239, 125, 0.2);
        color: var(--success);
        border: 2px solid var(--success);
        border-radius: 10px;
        margin: 20px 0;
        text-align: center;
        font-weight: 600;
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .home-link {
        display: inline-block;
        margin-top: 25px;
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        border-bottom: 2px solid transparent;
    }

    .home-link:hover {
        color: var(--secondary);
        border-bottom: 2px solid var(--secondary);
    }

    select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 15px;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 0;
        }
        
        .registration-container {
            padding: 30px 20px;
        }
        
        .form-title {
            font-size: 2rem;
        }
    }
</style>
    <?php
$fullnameerr = $doberr = $nicerr = $addresserr = $phoneerr = $emailerr = $gendererr = "";
$fullname = $dob = $nic = $address = $phone = $email = $gender = $occupation = "";

// Input sanitization function
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include("config.php"); // Include DB connection

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Full name validation
    if (empty($_POST["fullname"])) {
        $fullnameerr = "Full Name is required";
    } else {
        $fullname = test_input($_POST["fullname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fullname)) {
            $fullnameerr = "Only letters and white space allowed";
        }
    }

    // Date of birth
    if (empty($_POST["dob"])) {
        $doberr = "Date of birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
    }

    // NIC validation
    if (empty($_POST["nic"])) {
        $nicerr = "NIC is required";
    } else {
        $nic = test_input($_POST["nic"]);
        if (!preg_match("/^([0-9]{9}[VXvx]|[0-9]{12})$/", $nic)) {
            $nicerr = "Invalid NIC. Format must be 9 digits + V/X or 12 digits";
        }
    }

    // Address
    if (empty($_POST["address"])) {
        $addresserr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }

    // Phone validation
    if (empty($_POST["phone"])) {
        $phoneerr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $phoneerr = "Invalid phone number. Only 10 digits allowed";
        }
    }

    // Email validation
    if (empty($_POST["email"])) {
        $emailerr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Invalid email format";
        }
    }

    // Gender validation
    if (empty($_POST["gender"])) {
        $gendererr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // Occupation (optional)
    if (!empty($_POST["occupation"])) {
        $occupation = test_input($_POST["occupation"]);
    }

    // Proceed only if all error variables are empty
    if (empty($fullnameerr) && empty($doberr) && empty($nicerr) && empty($addresserr) && empty($phoneerr) && empty($emailerr) && empty($gendererr)) {

        // Check for duplicate NIC
        $check_nic = mysqli_query($mysqli, "SELECT nic FROM residents WHERE nic = '$nic'");
        if (mysqli_num_rows($check_nic) > 0) {
            $nicerr = "NIC already exists in the system";
        } else {
            // Insert data
            $result = mysqli_query($mysqli, "INSERT INTO residents (full_name, dob, nic, address, phone, email, occupation, gender) 
                         VALUES ('$fullname', '$dob', '$nic', '$address', '$phone', '$email', '$occupation', '$gender')");

            if ($result) {
                echo '<div style="padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin: 10px 0;">Data stored successfully</div>';
                // Optionally reset form values
                $fullname = $dob = $nic = $address = $phone = $email = $gender = $occupation = "";
            } else {
                echo '<div style="color:red;">Data not stored: ' . mysqli_error($mysqli) . '</div>';
            }
        }
    }
}
?>


    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <h3>Register Form</h3>

    <label>Full Name <input type="text" name="fullname" id="fullname" ></label>
    <span class="error">* <?php echo $fullnameerr;?></span>

    <label>Date Of Birth <input type="date" name="dob" id="dob" ></label>
    <span class="error">* <?php echo $doberr;?></span>

    <label>NIC <input type="text" name="nic" id="nic" ></label>
    <span class="error">* <?php echo $nicerr;?></span>

    <label>Address <input type="textarea" name="address" id="address" ></label>
    <span class="error">* <?php echo $addresserr;?></span>


    <label>Phone <input type="tel" name="phone" id="phone" ></label>
    <span class="error">* <?php echo $phoneerr;?></span>


    <label>Email <input type="email" name="email" id="email" ></label>
    <span class="error">* <?php echo $emailerr;?></span>

    <label>Occupation <input type="text" name="occupation" id="occupation" ></label>

    <label>Gender 
    <select name="gender" id="gender">
        <option value="">Select gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>
    </label>
    <span class="error">* <?php echo $gendererr;?></span>


    <button type="submit" name="submit">Register Resident</button>

    <a href="index.php">Go to Home</a>
    </form>


</body>
</html>