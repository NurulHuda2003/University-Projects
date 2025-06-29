<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php require('inc/links.php'); ?>
        <title> <?php echo $settings_r['site_title'] ?>-Contact</title>


    <style>
        :root {
            --teal: #2ec1ac;
            --teal_hover: #279e8c;

        }

        .custom-bg {
            background-color: var(--teal) !important;
            border: 1px solid var(--teal);

        }
    </style>

</head>

<body class="bg-light">

    <?php require('inc/header.php'); ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Contact us</h2>
        <div class="h-line bg-dark "></div> <!--horizontal line-->
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam sunt officia ut rerum! Repudiandae asperiores cumque ad sapiente, sed dolores quibusdam inventore voluptate dolor! Ducimus eos impedit adipisci amet ipsam!
        </p>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 ">
                    <iframe class="w-100 rounded mb-4" height="320px" src="<?php echo $contact_r['iframe'] ?>"></iframe>
                    <h5>Address</h5>
                    <a href="<?php echo $contact_r['gmap'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-3">
                        <i class="bi bi-geo-alt-fill"></i>
                        XYZ,Komolapur Railway,Dhaka
                    </a>
                    <h5 class="mt-4">Call US</h5>
                    <a href="Tel:+<?php echo $contact_r['ph1'] ?>" class="d-inline-block  text-decoration-none text-dark">
                        <i class="bi bi-telephone-forward-fill"></i> +<?php echo $contact_r['ph1'] ?></a>
                    <br>
                    <?php
                    if ($contact_r['ph2'] != '') {
                        echo <<<data
                                    <a href="Tel:+$contact_r[ph2]" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-forward-fill">+$contact_r[ph2]</i> </a>
                            data;
                    }
                    ?>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: <?php echo $contact_r['email'] ?>" class="d-inline-block mb-2 text-decoration-none text-auto">
                        <i class="bi bi-envelope-at-fill"></i>
                        <?php echo $contact_r['email'] ?>
                    </a>


                    <h5 class="mt-4">Follow US</h5>

                    <?php
                    if ($contact_r['twi'] != '') {
                        echo <<<data
                                <a href="$contact_r[twi]" class="d-inline-block text-dark fs-5 me-2">
                            <i class="bi bi-twitter me-1"></i> <!--margin end==me-->
                        </a>
                        data;
                    }
                    ?>

                    <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark fs-5 me-2">

                        <i class="bi bi-facebook me-1"></i> <!--margin end==me-->
                    </a>

                    <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark fs-5 ">
                        <i class="bi bi-instagram me-1"></i> <!--margin end==me-->
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4 ">
                    <form method="POST">
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label " style="font-weight: 500;">Name</label>
                            <input name="name" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label " style="font-weight: 500;">Email</label>
                            <input name="email" required type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label " style="font-weight: 500;">Subject</label>
                            <input name="subject" required type="subject" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label " style="font-weight: 500;">Message</label>
                            <textarea name="message" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button name="send" type="submit" class="btn btn-white custom-bg mt-3 shadow me-2">Send</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>

<?php
if(isset($_POST['send'])){
    $frm_data=filteration($_POST);
    $q="INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
    $values=[$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

    $res=insert($q,$values,'ssss');
    

    if($res==1){
        alert('success','Mail sent');
    }else{
        alert('error','Try again');
    }
}

?>


    <?php require('inc/footer.php'); ?>
</body>

</html>