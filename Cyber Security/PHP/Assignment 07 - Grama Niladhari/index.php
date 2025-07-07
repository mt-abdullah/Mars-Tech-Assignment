<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grama Niladhari Residential Management</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 320px;
            border-top: 5px solid #3498db;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 5px;
            font-size: 26px;
            background: linear-gradient(to right, #3498db, #2ecc71);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 800;
        }
        h2 {
            color: #7f8c8d;
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 1px;
        }
        .button {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            margin: 15px auto;
            border-radius: 30px;
            width: 80%;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .register-btn {
            background: linear-gradient(to right, #3498db, #2ecc71);
            border: 2px solid #3498db;
        }
        .search-btn {
            background: linear-gradient(to right, #e74c3c, #f39c12);
            border: 2px solid #e74c3c;
        }
        .button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .button:active {
            transform: translateY(1px);
        }
        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #3498db, #2ecc71);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">GN</div>
        <h1>Grama Niladhari Residential</h1>
        <h2>Management System</h2>
        <a href="register.php" class="button register-btn">Register</a>
        <a href="search.php" class="button search-btn">Search</a>
    </div>
</body>
</html>