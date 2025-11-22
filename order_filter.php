<?php include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin.css"/>
    <title>Books For You Admin</title>
</head>

<body>
<?php include 'admin_header.php'; ?>
<br/>

<div class="main_box">
    <table class="table">
        <form action="" method="get">
            <tbody>
            <tr>
                <td><label for="">Start Date</label><input class="form-control" type="date" name="start_date" id="">
                </td>
                <td><label for="">End Date</label><input class="form-control" type="date" name="end_date" id=""></td>
                <td><input style="margin-top: 2.2rem" class="btn btn-primary" type="submit" name="submit" id=""
                           value="Filter"></td>
            </tr>
            </tbody>
        </form>
    </table>
</div>


<?php
if (isset($_GET['submit'])) {
$start_date = date('d-m-Y', strtotime($_GET['start_date']));
$end_date = date('d-m-Y', strtotime($_GET['end_date']));

// Ensure dates are properly formatted and quoted for SQL query
$result = $conn->query("SELECT sum(total_price) as total FROM confirm_order WHERE date BETWEEN '$start_date' AND '$end_date'") or die('Query failed');

$row = $result->fetch_assoc(); // Fetch the associative array
?>
<div class="card mx-auto" style="width: 95%;margin-top: 150px; height: 100px">

    <p class="text-center mt-5">
        <?php
        // Output the result
        if ($row && isset($row['total'])) {
            echo "Total price between $start_date and $end_date is: " . $row['total'];
        } else {
            echo "No total found for the given date range.";
        }
        }
        ?>
    </p>
</div>
</body>
</html>