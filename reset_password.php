<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

if (!isset($_GET['email']) || !isset($_GET['token'])) {
    die('Invalid reset link.');
}

$email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
$token = filter_var($_GET['token'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$check = select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `t_expire`>=NOW() LIMIT 1", [$email, $token], "ss");
if (mysqli_num_rows($check) == 0) {
    die('Invalid or expired reset link.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if ($pass !== $cpass) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        $enc_pass = password_hash($pass, PASSWORD_BCRYPT);

        // Update password & clear token
        $update = update("UPDATE `user_cred` SET `password`=?, `token`=NULL, `t_expire`=NULL WHERE `email`=?", [$enc_pass, $email], "ss");
        if ($update) {
            echo "<script>alert('Password reset successfully. You can now login.'); window.location.href='index.php';</script>";
            exit;
        } else {
            echo "<script>alert('Failed to reset password.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset your password</h2>
    <form method="POST">
        <label>New Password:</label><br>
        <input type="password" name="pass" required><br><br>

        <label>Confirm Password:</label><br>
        <input type="password" name="cpass" required><br><br>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
