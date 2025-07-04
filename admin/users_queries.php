<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

if (isset($_GET['seen'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['seen'] == 'all') {
        $q = "update `user_queries` set `seen`= ? ";
        $values = [1];


        if (update($q, $values, 'i')) {
            alert('success', 'Marked all as read');
        } else {
            alert('error', 'opreration failed');
        }
    } else {
        $q = "update `user_queries` set `seen`= ? where `sr_no`=?";
        $values = [1, $frm_data['seen']];


        if (update($q, $values, 'ii')) {
            alert('success', 'Marked as read');
        } else {
            alert('error', 'opreration failed');
        }
    }
}
if (isset($_GET['del'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['del'] == 'all') {
        $q = "delete from `user_queries` ";


        if (mysqli_query($con,$q)) {
            alert('success', 'All DATA DELETED');
        } else {
            alert('error', 'opreration failed');
        }
    } else {
        $q = "delete from `user_queries`  where `sr_no`=?";
        $values = [$frm_data['del']];


        if (delete($q, $values, 'i')) {
            alert('success', 'DATA DELETED');
        } else {
            alert('error', 'opreration failed');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-User Queries</title>
    <?php
    require('inc/links.php')
    ?>
</head>

<body class="bg-light">
    <?php
    require('inc/header.php')

    ?>



    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4"> USERS Queries</h3>

                <div class="card border-0 shadow-sm rounded p-4 mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <a href="?seen=all" class="btn btn-dark rounded-pill shadow-none btn-sm">
                                <i class="bi bi-check-all"></i> Mark all read</a>
                            <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm">
                                <i class="bi bi-trash"></i> Delete all read</a>

                        </div>


                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" width="20%">Subject</th>
                                        <th scope="col" width="30%">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "Select * from `user_queries` order by `sr_no` DESC";
                                    $data = mysqli_query($con, $q);
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($data)) {

                                        $seen = '';
                                        if ($row['seen'] != 1) {
                                            $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary'>Mark as Read</a> <br>";
                                        }
                                        $seen .= "<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";
                                        echo <<<query
                            <tr>
                                <td>$i</td>
                                <td>$row[name]</td>
                                <td>$row[email]</td>
                                <td>$row[subject]</td>
                                <td>$row[message]</td>
                                <td>$row[date]</td>
                                <td>$seen</td>

                            </tr>

                            query;
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
    require('inc/script.php')
    ?>


</body>

</html>