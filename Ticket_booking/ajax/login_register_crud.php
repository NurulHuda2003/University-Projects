<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

if (isset($_POST['register'])) {
    $data = filteration($_POST);
    // match pasword and cofirm pass
    if ($data['pass'] != $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }
    //check user exists or not
    $u_exist = select(
        "SELECT * FROM `user_cred` WHERE `email` =? AND `phonenum`=? limit 1",
        [$data['email'], $data['phonenum']],
        "ss"
    );

    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    }
    //upload image to server
    uploadUserImage($_FILES['profile']);
    $img = uploadUserImage($_FILES['profile']);
    if ($img == 'inv_image') {
        echo 'inv_image';
        exit;
    } else if ($img == 'upd_failed') {
        echo 'upd_failed';
        exit;
    }

    $token = bin2hex(random_bytes(16));
    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);
    $query = "INSERT INTO `user_cred`(`name`, `address`, `phonenum`, `pincode`, `dob`, 
    `profile`, `password`, `token`,  `email`) VALUES (?,?,?,?,?,?,?,?,?)";
    $values = [
        $data['name'],
        $data['address'],
        $data['phonenum'],
        $data['pincode'],
        $data['dob'],
        $img,
        $enc_pass,
        $token,
        $data['email']
    ];
    if (insert($query, $values, 'sssssssss')) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    } else {
        echo 'ins_failed';
    }
}

if (isset($_POST['login'])) {
    $data = filteration($_POST);


    $u_exist = select(
        "SELECT * FROM `user_cred` WHERE `email` =? or `phonenum`=? limit 1",
        [$data['email_mob'], $data['email_mob']],
        "ss"
    );
    if (mysqli_num_rows($u_exist) == 0) {
        echo 'inv_email/mobile num';
    } else {
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if ($u_fetch['status'] == 0) {
            echo 'inactive';
        } else {
            if (!password_verify($data['pass'], $u_fetch['password'])) {
                echo 'inv_pass';
            } else {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['uId'] = $u_fetch['id'];
                $_SESSION['uname'] = $u_fetch['name'];
                $_SESSION['uPic'] = $u_fetch['profile'];
                $_SESSION['uPhone'] = $u_fetch['phonenum'];
                echo 1;
            }
        }
    }
}



// if (isset($_POST['forgot_pass'])) {
//     $data = filteration($_POST);

//     // Check user existence by email/phone
//     $u_exist = select(
//         "SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1",
//         [$data['email_mob'], $data['email_mob']],
//         "ss"
//     );

//     if (mysqli_num_rows($u_exist) == 0) {
//         echo 'not_found';
//     } else {
//         $u_fetch = mysqli_fetch_assoc($u_exist);

//         // Generate a fresh reset token
//         $reset_token = bin2hex(random_bytes(16));

//         // Update the user's token & token expiry in the DB
//         $query = "UPDATE `user_cred` SET `token`=?, `t_expire`=DATE_ADD(NOW(), INTERVAL 30 MINUTE) WHERE `id`=?";
//         $values = [$reset_token, $u_fetch['id']];

//         if (update($query, $values, "si")) {
//             // Build reset link (change domain/path as needed!)
//             $reset_link = "http://localhost/Ticket_booking/reset_password.php?email={$u_fetch['email']}&token=$reset_token";

//             // OPTIONAL: Send email with PHP mailer here.
//             // mail($u_fetch['email'], "Password Reset", "Reset your password here: $reset_link");

//             // For development/debug, simply echo the reset link:
//             echo "reset_link:" . $reset_link;
//         } else {
//             echo 'upd_failed';
//         }
//     }
// }
