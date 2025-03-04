<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Medical ID System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 400px;
            padding: 2rem;
            text-align: center;
        }

        h1 {
            color: #555;
            margin-bottom: 2rem;
        }

        .button {
            display: block;
            width: 100%;
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none;
            text-align: center;
            margin-bottom: 1rem;
            transition: background 0.3s ease;
        }

        .button:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Emergency Medical ID System</h1>
        <a href="view.php" class="button">
            <i class="fas fa-search"></i> View Medical Information
        </a>
        <a href="register.php" class="button">
            <i class="fas fa-user-plus"></i> New Registration
        </a>
    </div>
</body>
</html>
