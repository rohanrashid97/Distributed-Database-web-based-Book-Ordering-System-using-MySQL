<?php
include 'config.php';

error_reporting(0);
session_start();

$user_id = $_SESSION['user_id'];
if (isset($_POST['add_to_cart'])) {
    if (!isset($user_id)) {
        $message[] = 'Please Login to get your books';
    } else {
        $book_name = $_POST['book_name'];
        $book_id = $_POST['book_id'];
        $book_image = $_POST['book_image'];
        $book_price = $_POST['book_price'];
        $book_quantity = '1';
        $total_price = number_format($book_price * $book_quantity);
        if ($_SESSION['user_branch'] == "Dhaka") {
            $select_book = $conn1->query("SELECT * FROM cart WHERE book_id= '$book_id' AND user_id='$user_id' ") or die('query failed');
        } elseif ($_SESSION['user_branch'] == "Rajshahi") {
            $select_book = $conn2->query("SELECT * FROM cart WHERE book_id= '$book_id' AND user_id='$user_id' ") or die('query failed');
        } else {
            $select_book = $conn3->query("SELECT * FROM cart WHERE book_id= '$book_id' AND user_id='$user_id' ") or die('query failed');
        }

        // $select_book = $conn1->query("SELECT * FROM cart WHERE book_id= '$book_id' AND user_id='$user_id' ") or die('query failed');

        if (mysqli_num_rows($select_book) > 0) {
            $message[] = 'This Book is alredy in your cart';
        } else {
            $conn1->query("INSERT INTO cart (`user_id`,`book_id`,`name`, `price`, `image`,`quantity` ,`total`) VALUES('$user_id','$book_id','$book_name','$book_price','$book_image','$book_quantity', '$total_price')") or die('Add to cart Query failed');
            $conn2->query("INSERT INTO cart (`user_id`,`book_id`,`name`, `price`, `image`,`quantity` ,`total`) VALUES('$user_id','$book_id','$book_name','$book_price','$book_image','$book_quantity', '$total_price')") or die('Add to cart Query failed');
            $conn3->query("INSERT INTO cart (`user_id`,`book_id`,`name`, `price`, `image`,`quantity` ,`total`) VALUES('$user_id','$book_id','$book_name','$book_price','$book_image','$book_quantity', '$total_price')") or die('Add to cart Query failed');
            $message[] = 'Book Added To Cart Successfully';
            header('location:index.php');
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/hello.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href="css/fontawesome.min.css">
    <title>Book Ordering System</title>

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
    <?php include 'index_header.php' ?>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
        <div class="message" id= "messages"><span>' . $message . '</span>
        </div>
        ';
        }
    }
    ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 " src="bgimg/1.jpg" alt="First slide">
            </div>
            <div class="carousel-item active">
                <img class="d-block w-100 " src="bgimg/2.jpg" alt="First slide">
            </div>
               <div class="carousel-item active">
                <img class="d-block w-100 " src="bgimg/3.jpg" alt="First slide">
            </div>
 
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section id="New">

        <div class="container px-5 mx-auto">
            <h2 class="m-8 font-extrabold text-4xl text-center border-t-2 " style="color: rgb(0, 167, 245);">
                New Arrived
            </h2>
        </div>
    </section>
    <section class="show-products">
        <div class="box-container">
            <?php
            switch ($_SESSION['user_branch']) {
                case "Dhaka":
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid ORDER BY date DESC LIMIT 8") or die('query failed');
                    break;
                case "Chattagram":
                    $select_book = mysqli_query($conn2, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid ORDER BY date DESC LIMIT 8");
                    break;
                case "Rajshahi":
                    $select_book = mysqli_query($conn3, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid ORDER BY date DESC LIMIT 8");
                    break;
                default:
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid ORDER BY date DESC LIMIT 8");
                    break;
            }
            if (mysqli_num_rows($select_book) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book)) {
            ?>

                    <div class="box" style="width: 255px; height:355px;">
                        <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                            echo '-name=', $fetch_book['name']; ?>"> <img style="height: 200px;width: 125px;margin: auto;" class="books_images" src="added_books/<?php echo $fetch_book['image']; ?>" alt=""></a>
                        <div style="text-align:left ;">

                            <div style="font-weight: 500; font-size:18px; text-align: center; " class="name"> <?php echo $fetch_book['name']; ?></div>
                        </div>
                        <div class="price">Price: TK <?php echo $fetch_book['price']; ?>/-</div>
                        <div><?php if($fetch_book['available_qty'] > 0){echo "Available: ".$fetch_book['available_qty']."pcs";}else{echo '<td class="text-center" data-status="4"><span class="badge badge-danger">Out of Stock</span></td>';} ?></div>
                        
                        <form action="" method="POST">
                            <input class="hidden_input" type="hidden" name="book_name" value="<?php echo $fetch_book['name'] ?>">
                            <input class="hidden_input" type="hidden" name="book_id" value="<?php echo $fetch_book['bid'] ?>">
                            <input class="hidden_input" type="hidden" name="book_image" value="<?php echo $fetch_book['image'] ?>">
                            <input class="hidden_input" type="hidden" name="book_price" value="<?php echo $fetch_book['price'] ?>">
                           <?php if ($fetch_book['available_qty'] > 0) { ?>
                                <button onclick="myFunction()" name="add_to_cart">
                                    <img src="./images/cart2.png" alt="Add to cart">
                                </button>
                                <a href="book_details.php?details=<?php echo $fetch_book['bid']; ?>&name=<?php echo urlencode($fetch_book['name']); ?>" class="update_btn">View Details</a>
                            <?php } else { ?>
                                <p class='text-danger'>Out of stock</p>
                            <?php } ?>
                        </form>
                        <!-- <button name="add_to_cart" ><img src="./images/cart2.png" alt="Add to cart"></button> -->
                        <!-- <input type="submit" name="add_cart" value="cart"> -->
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </section>
    <section id="Adventure">
        </div>

        <div class="container px-5 mx-auto">
            <h2 class="text-gray-400 m-8 font-extrabold text-4xl text-center border-t-2 text-red-800" style="color: rgb(0, 167, 245);" >
                Adventure
            </h2>
        </div>
    </section>
    <section class="show-products">
        <div class="box-container">

            <?php
            switch ($_SESSION['user_branch']) {
                case "Dhaka":
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Adventure'") or die('query failed');
                    break;
                case "Chattagram":
                    $select_book = mysqli_query($conn2, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Adventure'");
                    break;
                case "Rajshahi":
                    $select_book = mysqli_query($conn3, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Adventure'");
                    break;
                default:
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Adventure'");
                    break;
            }   
            
            if (mysqli_num_rows($select_book) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book)) {
            ?>

                    <div class="box" style="width: 255px;height: 355px;">
                        <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                            echo '-name=', $fetch_book['name']; ?>"> <img style="height: 200px;width: 125px;margin: auto;" class="books_images" src="added_books/<?php echo $fetch_book['image']; ?>" alt=""></a>
                        <div style="text-align:left ;">

                            <div style="font-weight: 500; font-size:18px; text-align: center; " class="name"> <?php echo $fetch_book['name']; ?></div>
                        </div>
                        <div class="price">Price: TK <?php echo $fetch_book['price']; ?>/-</div>
                        <div><?php if($fetch_book['available_qty'] > 0){echo "Available: ".$fetch_book['available_qty']."pcs";}else{echo '<td class="text-center" data-status="4"><span class="badge badge-danger">Out of Stock</span></td>';} ?></div>
                        <!-- <button name="add_cart"><img src="./images/cart2.png" alt=""></button> -->
                        <form action="" method="POST">
                            <input class="hidden_input" type="hidden" name="book_name" value="<?php echo $fetch_book['name'] ?>">
                            <input class="hidden_input" type="hidden" name="book_image" value="<?php echo $fetch_book['image'] ?>">
                            <input class="hidden_input" type="hidden" name="book_price" value="<?php echo $fetch_book['price'] ?>">
                            <?php if ($fetch_book['available_qty'] > 0) { ?>
                                <button onclick="myFunction()" name="add_to_cart">
                                    <img src="./images/cart2.png" alt="Add to cart">
                                </button>
                                <a href="book_details.php?details=<?php echo $fetch_book['bid']; ?>&name=<?php echo urlencode($fetch_book['name']); ?>" class="update_btn">View Details</a>
                            <?php } else { ?>
                                <p class='text-danger'>Out of stock</p>
                            <?php } ?>
                        </form>
                        <!-- <button name="add_to_cart" ><img src="./images/cart2.png" alt="Add to cart"></button> -->
                        <!-- <input type="submit" name="add_cart" value="cart"> -->
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </section>
    <hr style="color: black; width:5px;">
    <section id="Magical">

        <div class="container px-5 mx-auto">
            <h2 class="text-gray-400 m-8 font-extrabold text-4xl text-center border-t-2 text-red-800"style="color: rgb(0, 167, 245);">
                Magical
            </h2>
        </div>
    </section>
    <section class="show-products">
        <div class="box-container">

            <?php
            switch ($_SESSION['user_branch']) {
                case "Dhaka":
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Magic'") or die('query failed');
                    break;
                case "Chattagram":
                    $select_book = mysqli_query($conn2, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Magic'");
                    break;
                case "Rajshahi":
                    $select_book = mysqli_query($conn3, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Magic'");
                    break;
                default:
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Magic'");
                    break;
            }
            if (mysqli_num_rows($select_book) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book)) {
            ?>
                    <div class="box" style="width: 255px;height: 355px;">
                        <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                            echo '-name=', $fetch_book['name']; ?>"> <img style="height: 200px;width: 125px;margin: auto;" class="books_images" src="added_books/<?php echo $fetch_book['image']; ?>" alt=""></a>
                        <div style="text-align:left ;">

                            <div style="font-weight: 500; font-size:18px; text-align: center;" class="name"> <?php echo $fetch_book['name']; ?></div>
                        </div>
                        <div class="price">Price: TK <?php echo $fetch_book['price']; ?>/-</div>
                        <div><?php if($fetch_book['available_qty'] > 0){echo "Available: ".$fetch_book['available_qty']."pcs";}else{echo '<td class="text-center" data-status="4"><span class="badge badge-danger">Out of Stock</span></td>';} ?></div>
                        <!-- <button name="add_cart"><img src="./images/cart2.png" alt=""></button> -->
                        <form action="" method="POST">
                            <input class="hidden_input" type="hidden" name="book_name" value="<?php echo $fetch_book['name'] ?>">
                            <input class="hidden_input" type="hidden" name="book_image" value="<?php echo $fetch_book['image'] ?>">
                            <input class="hidden_input" type="hidden" name="book_price" value="<?php echo $fetch_book['price'] ?>">
                            <?php if ($fetch_book['available_qty'] > 0) { ?>
                                <button onclick="myFunction()" name="add_to_cart">
                                    <img src="./images/cart2.png" alt="Add to cart">
                                </button>
                                <a href="book_details.php?details=<?php echo $fetch_book['bid']; ?>&name=<?php echo urlencode($fetch_book['name']); ?>" class="update_btn">View Details</a>
                            <?php } else { ?>
                                <p class='text-danger'>Out of stock</p>
                            <?php } ?>
                        </form>
                        <!-- <button name="add_to_cart" ><img src="./images/cart2.png" alt="Add to cart"></button> -->
                        <!-- <input type="submit" name="add_cart" value="cart"> -->
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </section>
    <section id="Horor">
        <div class="container px-5 mx-auto">
            <h2 class="text-gray-400 m-8 font-extrabold text-4xl text-center border-t-2 text-red-800" style="color: rgb(0, 167, 245);">
                Horor
            </h2>
        </div>
    </section>
    <section class="show-products">
        <div class="box-container">
            <?php
            switch ($_SESSION['user_branch']) {
                case "Dhaka":
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Horror'") or die('query failed');
                    break;
                case "Chattagram":
                    $select_book = mysqli_query($conn2, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Horror'");
                    break;
                case "Rajshahi":
                    $select_book = mysqli_query($conn3, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Horror'");
                    break;
                default:
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Horror'");
                    break;
            } 
            if (mysqli_num_rows($select_book) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book)) {
            ?>

                    <div class="box" style="width: 255px;height: 355px;">
                        <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                            echo '-name=', $fetch_book['name']; ?>"> <img style="height: 200px;width: 125px;margin: auto;" class="books_images" src="added_books/<?php echo $fetch_book['image']; ?>" alt=""></a>
                        <div style="text-align:left ;">
                            <div style="font-weight: 500; font-size:18px; text-align: center;" class="name"> <?php echo $fetch_book['name']; ?></div>
                        </div>
                        <div class="price">Price: TK <?php echo $fetch_book['price']; ?>/-</div>
                        <div><?php if($fetch_book['available_qty'] > 0){echo "Available: ".$fetch_book['available_qty']."pcs";}else{echo '<td class="text-center" data-status="4"><span class="badge badge-danger">Out of Stock</span></td>';} ?></div>
                        <!-- <button name="add_cart"><img src="./images/cart2.png" alt=""></button> -->
                        <form action="" method="POST">
                            <input class="hidden_input" type="hidden" name="book_name" value="<?php echo $fetch_book['name'] ?>">
                            <input class="hidden_input" type="hidden" name="book_image" value="<?php echo $fetch_book['image'] ?>">
                            <input class="hidden_input" type="hidden" name="book_price" value="<?php echo $fetch_book['price'] ?>">
                            <?php if ($fetch_book['available_qty'] > 0) { ?>
                                <button onclick="myFunction()" name="add_to_cart">
                                    <img src="./images/cart2.png" alt="Add to cart">
                                </button>
                                <a href="book_details.php?details=<?php echo $fetch_book['bid']; ?>&name=<?php echo urlencode($fetch_book['name']); ?>" class="update_btn">View Details</a>
                            <?php } else { ?>
                                <p class='text-danger'>Out of stock</p>
                            <?php } ?>
                        </form>
                        <!-- <button name="add_to_cart" ><img src="./images/cart2.png" alt="Add to cart"></button> -->
                        <!-- <input type="submit" name="add_cart" value="cart"> -->
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </section>
    <section id="Knowledge">
        <div class="container px-5 mx-auto">
            <h2 class="text-gray-400 m-8 font-extrabold text-4xl text-center border-t-2 text-red-800" style="color: rgb(0, 167, 245);">
                Knowledge
            </h2>
        </div>
    </section>
    <section class="show-products">
        <div class="box-container">

            <?php
            switch ($_SESSION['user_branch']) {
                case "Dhaka":
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='knowledge'") or die('query failed');
                    break;
                case "Chattagram":
                    $select_book = mysqli_query($conn2, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='knowledge'");
                    break;
                case "Rajshahi":
                    $select_book = mysqli_query($conn3, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='knowledge'");
                    break;
                default:
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='knowledge'");
                    break;
            }   
            if (mysqli_num_rows($select_book) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book)) {
            ?>

                    <div class="box" style="width: 255px;height: 355px;">
                        <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                            echo '-name=', $fetch_book['name']; ?>"> <img style="height: 200px;width: 125px;margin: auto;" class="books_images" src="added_books/<?php echo $fetch_book['image']; ?>" alt=""></a>
                        <div style="text-align:left ;">

                            <div style="font-weight: 500; font-size:18px; text-align: center;" class="name"> <?php echo $fetch_book['name']; ?></div>
                        </div>

                        <div class="price">Price: TK <?php echo $fetch_book['price']; ?>/-</div>
                        <div><?php if($fetch_book['available_qty'] > 0){echo "Available: ".$fetch_book['available_qty']."pcs";}else{echo '<td class="text-center" data-status="4"><span class="badge badge-danger">Out of Stock</span></td>';} ?></div>
                        <!-- <button name="add_cart"><img src="./images/cart2.png" alt=""></button> -->
                        <form action="" method="POST">
                            <input class="hidden_input" type="hidden" name="book_name" value="<?php echo $fetch_book['name'] ?>">
                            <input class="hidden_input" type="hidden" name="book_image" value="<?php echo $fetch_book['image'] ?>">
                            <input class="hidden_input" type="hidden" name="book_price" value="<?php echo $fetch_book['price'] ?>">
                            <?php if ($fetch_book['available_qty'] > 0) { ?>
                                <button onclick="myFunction()" name="add_to_cart">
                                    <img src="./images/cart2.png" alt="Add to cart">
                                </button>
                                <a href="book_details.php?details=<?php echo $fetch_book['bid']; ?>&name=<?php echo urlencode($fetch_book['name']); ?>" class="update_btn">View Details</a>
                            <?php } else { ?>
                                <p class='text-danger'>Out of stock</p>
                            <?php } ?>
                        </form>
                        <!-- <button name="add_to_cart" ><img src="./images/cart2.png" alt="Add to cart"></button> -->
                        <!-- <input type="submit" name="add_cart" value="cart"> -->
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </section>
    <section id="Academic">
        <div class="container px-5 mx-auto">
            <h2 class="text-gray-400 m-8 font-extrabold text-4xl text-center border-t-2 text-red-800" style="color: rgb(0, 167, 245);" >
            Academic
            </h2>
        </div>
    </section>
    <section class="show-products">
        <div class="box-container">
            <?php
            switch ($_SESSION['user_branch']) {
                case "Dhaka":
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Academic'") or die('query failed');
                    break;
                case "Chattagram":
                    $select_book = mysqli_query($conn2, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Academic'");
                    break;
                case "Rajshahi":
                    $select_book = mysqli_query($conn3, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Academic'");
                    break;
                default:
                    $select_book = mysqli_query($conn1, "SELECT * FROM `book_info` BI inner join book_stock_view bsv on BI.bid = bsv.bid where BI.category='Academic'");
                    break;
            }   
            if (mysqli_num_rows($select_book) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book)) {
            ?>

                    <div class="box" style="width: 255px;height: 355px;">
                        <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                            echo '-name=', $fetch_book['name']; ?>"> <img style="height: 200px;width: 125px;margin: auto;" class="books_images" src="added_books/<?php echo $fetch_book['image']; ?>" alt=""></a>
                        <div style="text-align:left ;">

                            <div style="font-weight: 500; font-size:18px; text-align: center; " class="name"> <?php echo $fetch_book['name']; ?></div>
                        </div>
                        <div class="price">Price: TK <?php echo $fetch_book['price']; ?>/-</div>
                        <div><?php if($fetch_book['available_qty'] > 0){echo "Available: ".$fetch_book['available_qty']."pcs";}else{echo '<td class="text-center" data-status="4"><span class="badge badge-danger">Out of Stock</span></td>';} ?></div>
                        <!-- <button name="add_cart"><img src="./images/cart2.png" alt=""></button> -->
                        <form action="" method="POST">
                            <input class="hidden_input" type="hidden" name="book_name" value="<?php echo $fetch_book['name'] ?>">
                            <input class="hidden_input" type="hidden" name="book_image" value="<?php echo $fetch_book['image'] ?>">
                            <input class="hidden_input" type="hidden" name="book_price" value="<?php echo $fetch_book['price'] ?>">
                            <?php if ($fetch_book['available_qty'] > 0) { ?>
                                <button onclick="myFunction()" name="add_to_cart">
                                    <img src="./images/cart2.png" alt="Add to cart">
                                </button>
                                <a href="book_details.php?details=<?php echo $fetch_book['bid']; ?>&name=<?php echo urlencode($fetch_book['name']); ?>" class="update_btn">View Details</a>
                            <?php } else { ?>
                                <p class='text-danger'>Out of stock</p>
                            <?php } ?>
                        </form>
                        <!-- <button name="add_to_cart" ><img src="./images/cart2.png" alt="Add to cart"></button> -->
                        <!-- <input type="submit" name="add_cart" value="cart"> -->
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </section>
    <?php include 'index_footer.php'; ?>

    <script>
        setTimeout(() => {
            const box = document.getElementById('messages');
            // 👇️ hides element (still takes up space on page)
            box.style.display = 'none';
        }, 8000);
    </script>
</body>
</html>