<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Residents</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }
        
        .container {
            background: white;
            width: 100%;
            max-width: 600px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .search-container {
            width: 100%;
        }
        
        .search-box {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        input[type="text"] {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        
        input[type="text"]:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        
        .search-button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 14px 20px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        
        .search-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Residents</h1>
        
        <form method="POST" action="search_results.php">
            <div class="search-container">
                <div class="search-box">
                    <input type="text" name="fullname" id="searchInput" placeholder="Search by Full Name">
                    <input type="text" name="nic" id="searchInput" placeholder="Search by NIC Number">
                    <input type="text" name="address" id="searchInput" placeholder="Search by Address">
                    <button type="submit" class="search-button" name="submit">Search</button>
                </div>
            </div>
            <a href="index.php">Go to Home</a>
        </form>
    </div>
</body>
</html>