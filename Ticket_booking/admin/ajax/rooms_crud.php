<?php

require('../inc/essentials.php');
require('../inc/db_config.php');

adminLogin();


if (isset($_POST['add_room'])) {
     $features = filteration(json_decode($_POST['features']));
     $facilities = filteration(json_decode($_POST['facilities']));

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
               mysqli_stmt_execute($stmt);
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
               mysqli_stmt_execute($stmt);
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
     $res = select("SELECT * FROM `rooms` WHERE `removed`=?",[0],'i');
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
                    <button type='button' onclick=\"rooms_images($row[id], '$row[name]')\"
                                   class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                                <i class='bi bi-images'></i></i> 
                         </button>
                         <button type='button' onclick='remove_room($row[id])'
                                   class='btn btn-danger shadow-none btn-sm' >
                                <i class='bi bi-trash'></i></i> 
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
     // $del_features = delete("delete from `room_features` where `room_id`=? ", $frm_data['room_id'], 'i');
     // $del_facilities = delete("delete from `room_facilities` where `room_id`=? ", $frm_data['room_id'], 'i');
     $del_features = delete("delete from `room_features` where `room_id`=? ", [$frm_data['room_id']], 'i');
     $del_facilities = delete("delete from `room_facilities` where `room_id`=? ", [$frm_data['room_id']], 'i');


     if (!($del_facilities && $del_features)) {
          $flag = 0;
     }


     $q2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";

     if ($stmt = mysqli_prepare($con, $q2)) {
          foreach ($facilities as $f) {
               mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
               mysqli_stmt_execute($stmt);
          }
          //$flag = 1;
          mysqli_stmt_close($stmt);
     } else {
          $flag = 0;
          die('Query For feature cannot be prepared - insert');
     }



     $q3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";

     if ($stmt = mysqli_prepare($con, $q3)) {
          foreach ($features as $f) {
               mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
               mysqli_stmt_execute($stmt);
          }
          //$flag = 1;
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


if (isset($_POST['add_image'])) {
     $frm_data = filteration($_POST);

     $img_r = uploadImage($_FILES['image'], ROOMS_FOLDER);

     if ($img_r == 'inv_img') {
          echo $img_r;
     } else if ($img_r == 'inv_size') {
          echo $img_r;
     } else if ($img_r == 'upd_failed') {
          echo $img_r;
     } else {
          $q = "INSERT INTO `rooms_images`( `room_id`, `image`) VALUES (?,?)";
          $values = [$frm_data['room_id'], $img_r];
          $res = insert($q, $values, 'is');

          echo $res;
     }
}



if (isset($_POST['get_room_images'])) {
     $frm_data = filteration($_POST);
     $res = select("SELECT * FROM `rooms_images` WHERE `room_id`=?", [$frm_data['get_room_images']], 'i');

     $path = ROOMS_IMG_PATH;

     while ($row = mysqli_fetch_assoc($res)) {

          if ($row['thumb'] == 1) {
               $thumb_btn = "<i class'bi bi-check-lg text-light bg-success px-2 py-1 rounded fs-5'></i>";
          } else {
               $thumb_btn = "<button onclick='thumb_image($row[sr_no],$row[room_id])' 
                              class='btn btn-secondary shadown-none'>
                              <i class='bi bi-check-square-fill'></i></button>";
          }

          echo <<<data
          <tr class='align-middle'>
          <td><img src='$path$row[image]' class='img-fluid'></td>
          <td>$thumb_btn</td>
          <td>
          <button onclick='rem_image($row[sr_no],$row[room_id])' class='btn btn-danger shadown-none'>
          <i class='bi bi-trash'></i></button>
          </td>

          </tr>
          data;
     }
}


if (isset($_POST['rem_image'])) {
     $frm_data = filteration($_POST);
     $values = [$frm_data['image_id'], $frm_data['room_id']];

     $pre_q = "SELECT * FROM `rooms_images` WHERE sr_no=? and `room_id`=?";
     $res = select($pre_q, $values, 'ii');
     $img = mysqli_fetch_assoc($res);


     if (deleteImage($img['image'], ROOMS_FOLDER)) {
          $q = "DELETE FROM `rooms_images` WHERE `sr_no`=? and `room_id`=?";
          $res = delete($q, $values, 'ii');
          echo $res;
     } else {
          echo 0;
     }
}


if (isset($_POST['thumb_image'])) {
     $frm_data = filteration($_POST);

     $pre_q="UPDATE `rooms_images` SET `thumb`=? WHERE `room_id`=?";
     $pre_v=[0,$frm_data['room_id']];
     $pre_res=update($pre_q,$pre_v,'ii');

     $q="UPDATE `rooms_images` SET `thumb`=? WHERE `sr_no`=? AND `room_id`=?";
     $v=[1,$frm_data['image_id'],$frm_data['room_id']];
     $res=update($q,$v,'iii');

     echo $pre_res;


}


if (isset($_POST['remove_room'])) {
          $frm_data = filteration($_POST);
$res1=select("SELECT * FROM `rooms_images` WHERE `room_id`=?",[$frm_data['room_id']],'i');

while($row=mysqli_fetch_assoc($res1)){
     deleteImage($row['image'],ROOMS_FOLDER);
}
$res2=delete("DELETE FROM `rooms_images` WHERE `room_id`=?",[$frm_data['room_id']],'i');
$res3=delete("DELETE FROM `room_features` WHERE `room_id`=?",[$frm_data['room_id']],'i');
$res4=delete("DELETE FROM `room_facilities` WHERE `room_id`=?",[$frm_data['room_id']],'i');
$res5=update("UPDATE  `rooms` SET `removed`=? WHERE `id`=?",[1,$frm_data['room_id']],'ii');

if($res2 || $res3 || $res4 ||$res5){
     echo 1;
}else{
     echo 0;
}

}