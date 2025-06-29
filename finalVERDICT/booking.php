<?php
session_start();
require('firstimport.php');

if (!isset($_SESSION['name'])) {
    header("Location: login1.php");
    exit();
}

$tbl_name = "booking";

mysqli_select_db($conn, $db_name) or die("cannot select db");

// Get and validate input parameters safely
$num = $_GET['tno'] ?? '';
$seat = $_GET['selct'] ?? '';
$fromstn = $_GET['fromstn'] ?? '';
$tostn = $_GET['tostn'] ?? '';
$doj = $_GET['doj'] ?? '';
$dob = $_GET['dob'] ?? '';
$uname = $_SESSION['name'] ?? '';

if (empty($num) || empty($seat) || empty($doj) || empty($uname)) {
    die("Missing required booking parameters.");
}

// Validate $seat against allowed columns to prevent SQL injection
$allowedSeats = ['sleeper', 'ac', 'general']; // Replace with your actual seat column names
if (!in_array(strtolower($seat), $allowedSeats)) {
    die("Invalid seat class specified.");
}

// Function to insert a passenger
function insertPassenger($conn, $tbl_name, $uname, $num, $seat, $doj, $dob, $fromstn, $tostn, $name, $age, $sex, $status) {
    $sql = "INSERT INTO $tbl_name(uname, Tnumber, class, doj, DOB, fromstn, tostn, Name, Age, sex, Status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssssssssiss", $uname, $num, $seat, $doj, $dob, $fromstn, $tostn, $name, $age, $sex, $status);
    $stmt->execute();
    if ($stmt->error) {
        die("Execute failed: " . $stmt->error);
    }
    $stmt->close();
}

// Get current seat availability
$sql1 = "SELECT $seat FROM seats_availability WHERE Train_No = ? AND doj = ?";
$stmt1 = $conn->prepare($sql1);
if (!$stmt1) {
    die("Prepare failed: " . $conn->error);
}
$stmt1->bind_param("ss", $num, $doj);
$stmt1->execute();
$result1 = $stmt1->get_result();

if ($row1 = $result1->fetch_assoc()) {
    $value = (int)$row1[$seat];
} else {
    die("Train or date of journey not found in availability.");
}
$stmt1->close();

// Helper function to book or waitlist passenger and update seat count
function bookOrWaitlist(&$value, $conn, $tbl_name, $uname, $num, $seat, $doj, $dob, $fromstn, $tostn, $name, $age, $sex) {
    if (empty($name) && empty($age)) {
        // Skip empty passenger data
        return;
    }
    $status = ($value > 0) ? "Confirmed" : "Waiting";

    insertPassenger($conn, $tbl_name, $uname, $num, $seat, $doj, $dob, $fromstn, $tostn, $name, $age, $sex, $status);

    if ($value > 0) {
        $value -= 1;
        // Update seats_availability
        $sql2 = "UPDATE seats_availability SET $seat = ? WHERE doj = ? AND Train_No = ?";
        $stmt2 = $conn->prepare($sql2);
        if (!$stmt2) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt2->bind_param("iss", $value, $doj, $num);
        $stmt2->execute();
        if ($stmt2->error) {
            die("Execute failed: " . $stmt2->error);
        }
        $stmt2->close();
    }
}

// Now process all passengers (up to 5 as per your code)

for ($i = 1; $i <= 5; $i++) {
    $name = $_GET["name$i"] ?? '';
    $age = $_GET["age$i"] ?? '';
    $sex = $_GET["sex$i"] ?? '';

    bookOrWaitlist($value, $conn, $tbl_name, $uname, $num, $seat, $doj, $dob, $fromstn, $tostn, $name, $age, $sex);
}

echo "Booking processed successfully.";

// Redirect to display page (use proper URL encoding)
header("Location: display.php?tno=" . urlencode($num) . "&doj=" . urlencode($doj) . "&seat=" . urlencode($seat));
exit();

?>
