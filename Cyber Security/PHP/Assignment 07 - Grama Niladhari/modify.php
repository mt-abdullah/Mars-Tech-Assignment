<?php
session_start();
if (isset($_SESSION['row_data'])) {
    $row = $_SESSION['row_data']; // get the row data from session
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify</title>
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
        label {
            display: block;
            margin-bottom: 10px;
            color: var(--dark);
            font-weight: 600;
            font-size: 1rem;
        }
        input, select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            background-color: var(--light);
        }
        input:focus, select:focus {
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
    </style>
</head>
<body>
    <div class="registration-container">
        <h1 style="text-align:center;">Grama Niladhari Residents Management System</h1>
        <form method="POST" action="modify_process.php">
            <h3>Modify Details</h3>

            <label>Full Name
                <input type="text" name="fullname" id="fullname" value="<?php echo ($row['full_name']); ?>">
            </label>

            <label>Date Of Birth
                <input type="date" name="dob" id="dob" value="<?php echo ($row['dob']); ?>">
            </label>

            <label>NIC
                <input type="text" name="nic" id="nic" value="<?php echo ($row['nic']); ?>">
            </label>

            <label>Address
                <input type="text" name="address" id="address" value="<?php echo ($row['address']); ?>">
            </label>

            <label>Phone
                <input type="tel" name="phone" id="phone" value="<?php echo ($row['phone']) ; ?>">
            </label>

            <label>Email
                <input type="email" name="email" id="email" value="<?php echo($row['email']) ; ?>">
            </label>

            <label>Occupation
                <input type="text" name="occupation" id="occupation" value="<?php echo ($row['occupation']); ?>">
            </label>

            <label>Gender
                <select name="gender" id="gender">
                    <option value="">Select gender</option>
                    <option value="male" <?php if (isset($row['gender']) && $row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if (isset($row['gender']) && $row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                    <option value="other" <?php if (isset($row['gender']) && $row['gender'] == 'other') echo 'selected'; ?>>Other</option>
                </select>
            </label>

            <button type="submit" name="submit" class="submit-btn">Modify</button>

            <a href="index.php" class="home-link">Go to Home</a>
        </form>
    </div>
</body>
</html>
