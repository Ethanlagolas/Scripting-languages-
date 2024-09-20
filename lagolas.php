<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            padding: 10px;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #DE3163;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #DE3163;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color:#DE3163;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #DE3163;
            border-left: 5px solid #4CAF50;
            border-radius: 5px;
            font-size: 18px;
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 20px;
            }

            input[type="submit"] {
                font-size: 14px;
                padding: 10px;
            }

            input[type="text"],
            input[type="date"] {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Synthetic welcome </h1>
        <form method="POST" action="">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="address">Home Address:</label>
            <input type="text" id="address" name="address" required>

            <input type="submit" value="Submit">
        </form>

        <?php
        function calculateUserAge($dob) {
            $dobTimestamp = strtotime($dob);
            $currentTimestamp = time();
            return floor(($currentTimestamp - $dobTimestamp) / (365*24*60*60));
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars(trim($_POST['name']));
            $dob = $_POST['dob'];
            $address = htmlspecialchars(trim($_POST['address']));

            $age = calculateUserAge($dob);
            echo "<div class='result'>Greetings, $name! You've arrived at $address. Today, you are $age years old!</div>";
        }
        ?>
    </div>

</body>
</html>
