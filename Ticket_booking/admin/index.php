<?php
require('inc/essentials.php');
require('inc/db_config.php');

session_start();
if((isset($_SESSION['adminLogin'])&& $_SESSION['adminLogin']==true)){ //if there no is admin login in session
    // and the admin login is true
    redirect('dashbord.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login Panel</title>
    <?php require('inc/links.php') ?>
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>

</head>

<body class="bg-light">
    <div class="login-form text-center rounded shdow bg-white overflow-hidden ">
        <!-- <form method="$POST"> --> <!--post method cause data is sensitive -->
        <form method="post"> <!-- this one is for html not for php-->

            <h4 class="bg-dark text-white py-3"> Admin Login Panel</h4>

            <div class="p-4">
                <div class="mb-3">

                    <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Nmae">

                </div>
                <div class="mb-4">

                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="password">
                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">Login</button>

            </div>

        </form>
    </div>

    <?php
    if (isset($_POST['login'])) //index name login theke kono value pass hobe
    {
        $frm_data = filteration($_POST); //filtered data 
        $query = "select * from `admin_cred` where `admin_name`=? AND `admin_pass`=?"; //wrinting query accordin prepared statement
        $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
        //$datatypes="ss";


        $res = select($query, $values, "ss"); //calling the prepared statement and storing it in a variable
        //print_r($res);
        if ($res->num_rows == 1) { //--> res is object and if the number of object in the res is 1 
           $row=mysqli_fetch_assoc($res);//if Login successfull

           //session_start();             //start season and fetch admin login

           $_SESSION['adminLogin']=true;
           $_SESSION['adminId']=$row['sr-no']; // if the adminId and sr_no same

           redirect('dashbord.php');

        } else {
          alert('error','Login Failed- Invalid Credentials!');
        }
    }
    ?>



    <?php require('inc/script.php') ?>
</body>

</html>