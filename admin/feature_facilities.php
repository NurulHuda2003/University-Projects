<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-Features & Facilities</title>
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
                <h3 class="mb-4"> Features & Facilities </h3>

                <div class="card border-0 shadow-sm rounded p-4 mb-4">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Features </h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i></i> Add
                            </button>
                        </div>


                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead >
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">

                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Facilities </h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facilities-s">
                                <i class="bi bi-plus-square"></i></i> Add
                            </button>
                        </div>


                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead >
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" width="40%">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="feature_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Feature</h5>
                    </div>
                    <div class="modal-body">
                        <div class=" mb-3"> <!--  md-6 divide the page into half -->
                            <label class="form-label fw-bold ">Name</label>
                            <input required type="text" name="feature_name" class="form-control shadow-none" required>
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label fw-bold">Picture</label>
                            <input required type="file" id="member_picture_inp" accept=".jpg,.png,.webp,.jpeg" name="member_picture" class="form-control shadow-none" required>
                        </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!--Facilities Section Modal section-->
    <div class="modal fade" id="facilities-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="facilities_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Facilities</h5>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3"> <!--  md-6 divide the page into half -->
                            <label class="form-label fw-bold">Icon</label>
                            <input required type="file" accept=".svg" name="facility_icon" class="form-control shadow-none" required>
                        </div>
                        <div class=" mb-3"> <!--  md-6 divide the page into half -->
                            <label class="form-label fw-bold ">Name</label>
                            <input required type="text" name="facility_name" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label ">Description</label>
                            <textarea class="form-control shadow-none" name="facility_desc" rows="3"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>



    <?php
    require('inc/script.php')
    ?>

   <script src="scripts/features_facilities.js"></script>

</body>

</html>