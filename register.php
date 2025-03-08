<?php
$host = "localhost";
$user = "root"; 
$password = ""; 
$database = "medical_id_system"; 


$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $medications = $conn->real_escape_string($_POST['medications']);
    $conditions = $conn->real_escape_string($_POST['conditions']);
    $medicalId = $conn->real_escape_string($_POST['medical_id']); 

    $sql = "INSERT INTO users (name, email, address, medications, conditions, medical_id) 
            VALUES ('$name', '$email', '$address', '$medications', '$conditions', '$medicalId')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration Successful! Your Medical ID is: $medicalId'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Registration - Emergency Medical ID</title>
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
            min-height: 100vh;
            color: #333;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 600px;
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

        input[type="text"],
        input[type="email"] {
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
            margin-top: 1rem;
        }

        .generate-btn {
            background: #28a745;
            margin-top: 0.5rem;
        }
    </style>
    <script>
        function generateMedicalID() {
            var medicalID = "EMID-" + Math.floor(1000 + Math.random() * 9000);
            document.getElementById("medical_id").value = medicalID;
        }
    </script>
</head>
<body>

    <div class="container">
        <h1>New Registration</h1>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>

            <div class="form-group">
                <label for="medications">Current Medications:</label>
                <input type="text" id="medications" name="medications" placeholder="Separate with commas">
            </div>

            <div class="form-group">
                <label for="conditions">Medical Conditions:</label>
                <input type="text" id="conditions" name="conditions" placeholder="Separate with commas">
            </div>

            <div class="form-group">
                <label for="medical_id">Medical ID:</label>
                <input type="text" id="medical_id" name="medical_id" readonly required>
                <button type="button" class="generate-btn" onclick="generateMedicalID()">Generate ID</button>
            </div>

            <button type="submit">Save Information</button>
            <button type="button" class="back-button" onclick="window.location.href='index.php'">Back</button>
        </form>
    </div>

</body>
</html>
