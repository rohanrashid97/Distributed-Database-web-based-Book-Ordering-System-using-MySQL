<?php
    include '../config.php';
    
    // Initialize variables
    $name = $Sname = $email = $password = $cpassword = $user_type = '';
    $errors = [];
    
    if(isset($_POST['submit'])) {
        // Sanitize and validate input
        $name = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_STRING);
        $Sname = filter_input(INPUT_POST, 'Sname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $user_type = filter_input(INPUT_POST, 'user_type', FILTER_SANITIZE_STRING);
        $branch_type = filter_input(INPUT_POST, 'branch_type', FILTER_SANITIZE_STRING);
        
        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }
        
        // Check if user exists using prepared statement
        $stmt = $conn1->prepare("SELECT * FROM users_info WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0) {
            $errors[] = 'User already exists!';
        } else {
            if($password !== $cpassword) {
                $errors[] = 'Passwords do not match';
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Use prepared statement for insertion
                $stmt = $conn1->prepare("INSERT INTO users_info(name, surname, email, password, user_type,branch) VALUES(?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $name, $Sname, $email, $hashed_password, $user_type,$branch_type);
                
                if($stmt->execute()) {
                    // Only insert into one database
                    $message[] = 'Registration successful!';
                    // Clear form
                    $name = $Sname = $email = $password = $cpassword = '';
                } else {
                    $errors[] = 'Registration failed. Please try again.';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="register.css" />
    <title>Register</title>
    <style>
        .container2 {
            display: flex;
            justify-content: center;
            background-image: linear-gradient(45deg,
                rgba(0, 0, 3, 0.1),
                rgba(0, 0, 0, 0.5)), url(../bgimg/2.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 98vh;
        }
        .container form .link {
            text-decoration: none;
            color: white;
            border-radius: 17px;
            padding: 8px 18px;
            margin: 0px 10px;
            background: rgb(0, 0, 0);
            font-size: 20px;
        }
        .container form .link:hover {
            background: rgb(0, 167, 245);
        }
        .error-message {
            color: #ff0000;
            background: rgba(255, 0, 0, 0.1);
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .success-message {
            color: #00ff00;
            background: rgba(0, 255, 0, 0.1);
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php if(!empty($errors)): ?>
        <div class="error-message">
            <?php foreach($errors as $error): ?>
                <p><?php echo htmlspecialchars($error); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <?php if(isset($message)): ?>
        <div class="success-message">
            <?php foreach($message as $msg): ?>
                <p><?php echo htmlspecialchars($msg); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <form action="" method="post">
            <h3 style="color:white">Register to Use <a href="index.php"><span>Books</span> <span>For You</span></a></h3>
            <input type="text" name="Name" placeholder="Enter Name" required class="text_field" value="<?php echo htmlspecialchars($name); ?>">
            <input type="text" name="Sname" placeholder="Enter Surname" required class="text_field" value="<?php echo htmlspecialchars($Sname); ?>">
            <input type="email" name="email" placeholder="Enter Email Id" required class="text_field" value="<?php echo htmlspecialchars($email); ?>">
            <input type="password" name="password" placeholder="Enter password" required class="text_field">
            <input type="password" name="cpassword" placeholder="Confirm password" required class="text_field">
            <select name="user_type" required class="text_field">
                <option value="Admin">Admin</option>
            </select>
            <select name="branch_type" id="" required class="text_field">
                <option value="Dhaka">Dhaka</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Chattagram">Chattagram</option>
            </select>

            <input type="submit" value="Register" name="submit" class="btn text_field">
            <p>Already have an Account? <br> 
                <a class="link" href="login.php">Login</a>
                <a class="link" href="index.php">Back</a>
            </p>
        </form>
    </div>
</body>
</html>
