<?php
require('inc/essentials.php');

adminLogin();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-CAROUSEL</title>
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
                <h4 class="mb-4"> CAROUSEL</h4>

    
                <!-- CAROUSEL  section -->
                <div class="card border-0 shadow-sm rounded p-4 mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Images </h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
                            <i class="bi bi-plus-square"></i></i> Add
                        </button>
                    </div>

                    <!-- image fetching portion -->
                    <div class="row" id="carousel-data">
                        
                    </div>

                </div>


                <!--CAROUSEL Modal section-->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="carousel_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Image</h5>
                                </div>
                                <div class="modal-body">
                                    
                                    <div class="mb-3"> <!--  md-6 divide the page into half -->
                                        <label class="form-label fw-bold">Picture</label>
                                        <input required type="file"  name="carousel_picture" id="carousel_picture_inp" accept=".jpg,.png,.webp,.jpeg" class="form-control shadow-none" required>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="carousel_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>



            </div>
        </div>
    </div>

    <?php
    require('inc/script.php')
    ?>
<script src="scripts/carousel.js"></script>
   
</body>

</html>