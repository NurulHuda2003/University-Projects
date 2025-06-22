<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Ticket Booking-Facilities</title>
    <?php require('inc/links.php'); ?>
    <style>
        .pop:hover {
            border-top-color: #279e8c !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
    <!-- <style  >
    :root{
    --teal: #2ec1ac;
   --teal_hover:#279e8c;

}
</style> -->
</head>

<body class="bg-light">

    <?php require('inc/header.php'); ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Facilities</h2>
        <div class="h-line bg-dark "></div> <!--horizontal line-->
        <p class="text-center mt-3">
            <h5>Journey Planning:</h5>
A tool to find the best routes and connections for a desired journey, often including real-time information. 
<h5>Real-time Information:</h5>
Live train tracking, departure boards, and other updates to keep travelers informed about any delays or changes. 
<h5>Ticket Booking:</h5>
The ability to purchase train tickets online, often with various payment options. 
<h5>Seat Reservations:</h5>
The option to reserve seats in advance, especially for busy routes or times. 
<h5>Availability Checks:</h5>
A feature to see if seats are available on specific trains and routes. 
<h5>Account Management:</h5>
Tools to manage bookings, view past journeys, and update personal information. 
Routeing and Restriction Information:
Details on permitted routes and any restrictions that apply to tickets. 
<h5>Customer Support:</h5>
Contact options for assistance with booking, travel planning, or resolving issues. 
        </p>
    </div>

    <div class="container">
        <div class="row">

            <?php
            $res = selectALL('facilities');
            $path = FACILITIES_IMG_PATH;
            while ($row = mysqli_fetch_assoc($res)) {
                echo <<<data
        <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                    <img src="$path$row[icon]" width="40px">
                    <h5 class="m-0 ms-3">$row[name]</h5>
                    </div>
                    <p>$row[description]</p>
                </div>
            </div>

        data;
            }
            ?>
           

        </div>
    </div>

    <?php require('inc/footer.php'); ?>
</body>

</html>