<?php
include 'config.php';
session_start();

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn1, $_POST['email']);
    $password = mysqli_real_escape_string($conn1, $_POST['password']);


   $select_users = $conn1->query("SELECT * FROM users_info WHERE email = '$email' and password='$password' ") or die('query failed');

    if (mysqli_num_rows($select_users) ==1) {

        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] == 'Admin') {
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['Id'];
            $_SESSION['user_branch'] = $row['branch'];
            header('location:admin_index.php');

        } elseif ($row['user_type'] == 'User') {
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['Id'];
                $_SESSION['user_branch'] = $row['branch'];
                header('location:index.php');
            }
        }
        else {
            $message[] = 'Incorrect Email Id or Password!';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/register.css" />
    <link rel="stylesheet" href="css/hello.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Login Here</title>
    <style>
       .container form .link{
            text-decoration: none; color:white;  border-radius: 17px; padding: 8px 18px; margin: 0px 10px; background: rgb(0, 0, 0); font-size: 20px;
        }
        .container form .link:hover{
            background: rgb(0, 167, 245);
        }
    </style>
    <style>
        img {
            border: none;
        }
        .message {
            position: sticky;
            top: 0;
            margin: 0 auto;
            width: 61%;
            background-color: #fff;
            padding: 6px 9px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 100;
            gap: 0px;
            border: 2px solid rgb(68, 203, 236);
            border-top-right-radius: 8px;
            border-bottom-left-radius: 8px;
        }
        .message span {
            font-size: 22px;
            color: rgb(240, 18, 18);
            font-weight: 400;
        }
        .message i {
            cursor: pointer;
            color: rgb(3, 227, 235);
            font-size: 15px;
        }
    </style>
    
</head>

<body>
<?php
  include 'index_header.php';
  ?>
    <?php
if(isset($message)){
      foreach($message as $message){
        echo '
        <div class="message" id="messages"><span>'.$message.'</span>
        </div>
        ';
      }
    }
    ?>
    <div class="container">
        <form action="" method="post">
            <h3 style="color:white">Sign In to <a href="index.php"><span>Book </span><span>Ordering System</span></a></h3>
            <input type="email" name="email" placeholder="Enter Email Id" required class="text_field">
            <input type="password" name="password" placeholder="Enter password" required class="text_field">
            <input type="submit" value="Sign In" name="login" class="btn text_field">
            <p>Don't have an Account? <br> <a class="link" href="Register.php">Sign Up</a><a class="link" href="index.php">Back</a></p>
        </form>
    </div>


    <script>
setTimeout(() => {
  const box = document.getElementById('messages');

  // 👇️ hides element (still takes up space on page)
  box.style.display = 'none';
}, 8000);
</script>
</body>

</html>