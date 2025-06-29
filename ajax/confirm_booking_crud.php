<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

session_start();

if (isset($_POST['check_availability'])) {
    $checkin = filter_var($_POST['check_in'], FILTER_SANITIZE_STRING);
    $seats = intval($_POST['seats']);

    if ($seats <= 0) {
        echo json_encode(["status" => 'invalid_seats']);
        exit;
    }

    // Check if check-in date is valid (>= today)
    $today = date('Y-m-d');
    if ($checkin < $today) {
        echo json_encode(["status" => 'check_in_earlier']);
        exit;
    }

    // Calculate payment correctly
    $payment = $_SESSION['room']['price'] * $seats;
    $_SESSION['room']['payment'] = $payment;
    $_SESSION['room']['available'] = true;
    $_SESSION['room']['seats'] = $seats;

    echo json_encode([
        "status" => 'available',
        "seats" => $seats,
        "payment" => $payment
    ]);
    exit;
}
?>
