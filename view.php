<?php
require 'database.php';
$medicalInfo = null;
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicalId = trim($_POST["medicalId"]);

    if (!empty($medicalId)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE medical_id = ?");
        $stmt->bind_param("s", $medicalId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $medicalInfo = $result->fetch_assoc();
        } else {
            $error = "No record found for the entered Medical ID.";
        }

        $stmt->close();
    } else {
        $error = "Please enter a Medical ID.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Medical Information</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            margin-top: 0.25rem;
        }

        button {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
            margin: 0.5rem;
        }

        button:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .back-button {
            background: #666;
        }

        .info-box {
            background: #fff;
            padding: 1rem;
            border-radius: 10px;
            margin-top: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: left;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Medical Information</h1>
        <form method="POST">
            <div class="form-group">
                <label for="medicalId">Enter Medical ID:</label>
                <input type="text" id="medicalId" name="medicalId" placeholder="EMID-1234" required>
            </div>
            <button type="submit">View Info</button>
        </form>
        
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <?php if ($medicalInfo): ?>
            <div class="info-box">
                <p><strong>Name:</strong> <?= htmlspecialchars($medicalInfo['name']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($medicalInfo['email']) ?></p>
                <p><strong>Address:</strong> <?= htmlspecialchars($medicalInfo['address']) ?></p>
                <p><strong>Medications:</strong> <?= htmlspecialchars($medicalInfo['medications']) ?></p>
                <p><strong>Conditions:</strong> <?= htmlspecialchars($medicalInfo['conditions']) ?></p>
            </div>
        <?php endif; ?>

        <a href="index.php"><button class="back-button">Back</button></a>
    </div>
</body>
</html>
