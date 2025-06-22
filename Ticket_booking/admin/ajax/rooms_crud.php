<?php

require('../inc/essentials.php');
require('../inc/db_config.php');

adminLogin();


if (isset($_POST['add_room'])) {
     $features = filteration(json_decode($_POST['features']));
     $facilities = filteration(json_decode($_POST['facilities']));

     // $features = array_filter(json_decode($_POST['features']), 'is_numeric');
     // $facilities = array_filter(json_decode($_POST['facilities']), 'is_numeric');



     $frm_data = filteration($_POST);
     $flag = 0;

     $q1 = "INSERT INTO `rooms`(`name`, `price`, `area`, `quantity`, `adult`, `children`, `description`) VALUES (?,?,?,?,?,?,?)";
     $values = [$frm_data['name'], $frm_data['price'], $frm_data['area'], $frm_data['quantity'], $frm_data['adult'], $frm_data['children'], $frm_data['desc']];

     if (insert($q1, $values, 'siiiiis')) {
          $flag = 1;
     }

     $room_id = mysqli_insert_id($con);

     $q2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";

     if ($stmt = mysqli_prepare($con, $q2)) {
          foreach ($facilities as $f) {
               mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
               mysqli_execute($stmt);
          }
          mysqli_stmt_close($stmt);
     } else {
          $flag = 0;
          die('Query For feature cannot be prepared - insert');
     }





     $q3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";

     if ($stmt = mysqli_prepare($con, $q3)) {
          foreach ($features as $f) {
               mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
               mysqli_execute($stmt);
          }
          mysqli_stmt_close($stmt);
     } else {
          $flag = 0;
          die('Query for Facilities cannot be prepared - insert');
     }

     if ($flag) {
          echo 1;
     } else {
          echo 0;
     }
}


if (isset($_POST['get_allROOMS'])) {
     $res = selectALL('rooms');
     $i = 1;
     $data = '';
     while ($row = mysqli_fetch_assoc($res)) {

          if ($row['status'] == 1) {
               $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadown-none'>Active</button>
               ";
          } else {
               $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadown-none'>Inactive</button>
               ";
          }

          //below is concatinating the data
          $data .= "
               <tr class='align-middle'>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[area] sq.ft</td>

               <td>
                    <span class='badge rounded-pill bg-light text-dark'>
                              Adult:$row[adult]
                         </span>
                     <span class='badge rounded-pill bg-light text-dark'>
                              Children:$row[children]
                         </span>
               </td>

                    <td>৳$row[price]</td>
                    <td>$row[quantity]</td>
                    <td>$status</td>
                    <td>
                    <button type='button' onclick='edit_details($row[id]) ' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                                <i class='bi bi-pencil-square'></i></i> 
                            </button>
                    </td>
               </tr>
          ";
          $i++;
     }
     echo $data;
}

if (isset($_POST['get_room'])) {
     $frm_data = filteration($_POST);
     $res1 = select("select * from `rooms` where `id`=?", [$frm_data['get_room']], 'i');
     $res2 = select("select * from `room_features` where `room_id`=?", [$frm_data['get_room']], 'i');
     $res3 = select("select * from `room_facilities` where `room_id`=?", [$frm_data['get_room']], 'i');

     $roomdata = mysqli_fetch_assoc($res1);
     $features = [];
     $facilities = [];
     //this portion is for feature and facilities and we will store them in an array cause res2 and res3 will
     //fetch rows for data and res1 will fetch data to show
     if (mysqli_num_rows($res2) > 0) {
          //here we will make array and send them to ajax
          while ($row = mysqli_fetch_assoc($res2)) {
               array_push($features, $row['features_id']);
          }
     }


     if (mysqli_num_rows($res3) > 0) {
          //here we will make array and send them to ajax
          while ($row = mysqli_fetch_assoc($res3)) {
               array_push($facilities, $row['facilities_id']);
          }
     }
     //this data will the fetch in foreach loop of get_room
     $data = ["roomdata" => $roomdata, "features" => $features, "facilities" => $facilities]; //passing the array
     $data = json_encode($data);
     echo $data;
}


if (isset($_POST['edit_room'])) {

     $features = filteration(json_decode($_POST['features']));
     $facilities = filteration(json_decode($_POST['facilities']));
     // $features = array_filter(json_decode($_POST['features']), 'is_numeric');
     // $facilities = array_filter(json_decode($_POST['facilities']), 'is_numeric');


     $frm_data = filteration($_POST);
     $flag = 0;

     $q1 = "UPDATE `rooms` SET `name`=?,`price`=?,`area`=?,`quantity`=?,`adult`=?,
     `children`=?,`description`=? WHERE `id`=?";

     $values = [
          $frm_data['name'],
          $frm_data['price'],
          $frm_data['area'],
          $frm_data['quantity'],
          $frm_data['adult'],
          $frm_data['children'],
          $frm_data['desc'],
          $frm_data['room_id']
     ];

     if (update($q1, $values, 'siiiiisi')) {
          $flag = 1;
     }
     $del_features = delete("delete from `room_features` where `room_id`=? ", $frm_data['room_id'], 'i');
     $del_facilities = delete("delete from `room_facilities` where `room_id`=? ", $frm_data['room_id'], 'i');

     if (!($del_facilities && $del_features)) {
          $flag = 0;
     }


     $q2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";

     if ($stmt = mysqli_prepare($con, $q2)) {
          foreach ($facilities as $f) {
               mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
               mysqli_execute($stmt);
          }
          $flag = 1;
          mysqli_stmt_close($stmt);
     } else {
          $flag = 0;
          die('Query For feature cannot be prepared - insert');
     }



     $q3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";

     if ($stmt = mysqli_prepare($con, $q3)) {
          foreach ($features as $f) {
               mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
               mysqli_execute($stmt);
          }
          $flag = 1;
          mysqli_stmt_close($stmt);
     } else {
          $flag = 0;
          die('Query for Facilities cannot be prepared - insert');
     }

     if ($flag) {
          echo 1;
     } else {
          echo 0;
     }
}



if (isset($_POST['toggle_status'])) {
     $frm_data = filteration($_POST);

     $q = "UPDATE `rooms` SET `status`=? WHERE `id`=?";
     $val = [$frm_data['value'], $frm_data['toggle_status']];

     if (update($q, $val, 'ii')) {
          echo 1;
     } else {
          echo 0;
     }
}
