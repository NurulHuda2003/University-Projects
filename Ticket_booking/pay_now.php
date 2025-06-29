<?php
session_start();
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

if (!(isset($_SESSION['login']) && $_SESSION['login'] === true)) {
    redirect('index.php');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request: please submit the booking form.");
}

// Safety: check form & session data
if (!isset($_SESSION['room']) || empty($_POST['checkin']) || empty($_POST['seats'])) {
    die("Missing booking data. Please fill out the form completely.");
}

$checkin_date = $_POST['checkin'];
$seats = intval($_POST['seats']);
$room_id = $_SESSION['room']['id'];
$user_id = $_SESSION['uId'];
$amount = $_SESSION['room']['price'] * $seats;

// Generate random order id
$order_id = 'ORD' . strtoupper(bin2hex(random_bytes(4)));

// Insert booking and set status to paid directly (simulate payment success)
$insert_sql = "INSERT INTO bookings (user_id, room_id, check_in, seats, amount, payment_status, order_id) 
               VALUES (?, ?, ?, ?, ?, 'paid', ?)";
$stmt = mysqli_prepare($con, $insert_sql);

if (!$stmt) {
    die("Prepare failed: " . mysqli_error($con));
}

mysqli_stmt_bind_param($stmt, 'iisiss', $user_id, $room_id, $checkin_date, $seats, $amount, $order_id);

if (mysqli_stmt_execute($stmt)) {
    $booking_id = mysqli_insert_id($con);
} else {
    die("Booking failed: " . mysqli_stmt_error($stmt));
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="/Ticket_booking/css/common.css">
</head>
<body class="bg-light">
    <div class="container text-center mt-5">
        <div class="card p-5 shadow">
            <h1 class="text-success mb-4">Payment Successful!</h1>
            <h3 class="mb-3">Your Order ID:</h3>
            <h2 class="fw-bold text-primary mb-4"><?php echo htmlspecialchars($order_id); ?></h2>
            <p class="fs-5 text-dark">Your booking is confirmed. Thank you for choosing us!</p>
            <a href="index.php" class="btn btn-success mt-4">Return to Home</a>
        </div>
    </div>
</body>
</html>
