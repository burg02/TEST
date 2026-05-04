

    <div class="wrapper">
        <div class="btn-sidebar">
            <i class='bx bxs-dashboard'></i>
        </div>
        <div class="sidebar">
            <div class="mt-5">
                <div class="px-3">
                    <h4 class="text-center">
                        <img src="assets/media/logo.png" alt="" srcset="" class="w-75">
                        ProdFinder
                    </h4>
                    <hr>
                </div>
                <p class="mt-2 mt-5 fw-bold text-muted ms-4">Menu</p>
                <ul class="list-unstyled mt-3 ms-4">
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/dashboard" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bxs-dashboard' ></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="list-unstyled-item ps-3 py-3 active">
                        <a href="/producers" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bx-user-check'></i>
                            <span>Producers</span>
                        </a>
                    </li>
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/music-releases" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bxl-deezer' ></i>
                            <span>Music Releases</span>
                        </a>
                    </li>
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/genres/all" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bx-music' ></i>
                            <span>Genres</span>
                        </a>
                    </li>
                    <?php 
                        if($_SESSION["role"] === "producer") {
                    ?>
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/profile" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bxs-user-rectangle' ></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/signout" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bx-exit' ></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content py-5">
            <div class="container">
                <div class="our-producers p-4 mt-3">
                    <h5>All Producers</h5> 
                    <div class="row pt-4">
                        <?php
                            if(count($producer_info) > 0) {
                            foreach ($producer_info as $row) {
                        ?>
                        <div class="col-12 col-md-3">
                            <a href="/producer/<?php echo $row->username; ?>" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <img src="assets/uploads/profile/<?php echo $row->profile; ?>" class="img-fluid">
                                        <div class="top-producer-banner-text d-flex justify-content-center align-items-end w-100 h-100 text-center pb-5">
                                            <div>
                                                <h4 class="m-0"><?php echo $row->full_name; ?></h4>
                                                <p class="m-0"><?php echo $row->genre; ?></p>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                            }
                        } else {
                        ?>
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body p-4">
                                    No producers to show
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

