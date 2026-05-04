

    <div class="wrapper">
        <div class="btn-sidebar">
            <i class='bx bxs-dashboard'></i>
        </div>
        <div class="sidebar">
            <div class="mt-5">
                <div class="px-3">
                    <h4 class="text-center">
                        <img src="../assets/media/logo.png" alt="" srcset="" class="w-75">
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
                <?php
                    if(count($producer_info) > 0) {
                ?>
                <div class="producer-banner">
                    <div class="producer-profile-banner">
                        <div class="banner-image">
                            <img src="../assets/uploads/profile-banner/<?php echo $producer_info[0]->banner; ?>" alt="" srcset="">
                        </div>
                    </div>
                    <div class="profile-container d-block d-lg-flex align-items-center gap-3">
                        <div class="profile-image d-flex justify-content-center d-md-block">
                            <img src="../assets/uploads/profile/<?php echo $producer_info[0]->profile; ?>" alt="" srcset="">
                        </div>
                        <div class="profile-name mb-5 mt-3 text-center d-flex justify-content-center d-lg-block">
                            <h1><?php echo $producer_info[0]->full_name; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="about-producer py-4">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header border-0 d-inline-flex justify-content-between align-items-center">
                                    <h4 class="card-title p-2">About Me</h4>
                                </div>
                                <div class="card-body">
                                    <div class="greetings text-justify pt-3">
                                        <p>
                                           <?php
                                                echo $producer_info[0]->bio;
                                           ?>
                                        </p>
                                        <hr>
                                      </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class='bx bx-music' ></i>                            
                                        </div>
                                        <div class="info">
                                            <p class=""> 
                                                <?php echo ucwords($producer_info[0]->genre); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class="bx bx-home"></i>                                       
                                        </div>
                                        <div class="info">
                                            <p class="">Lives in 
                                                <?php echo ucwords($producer_info[0]->address); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class='bx bx-cake' ></i>                              
                                        </div>
                                        <div class="info">
                                            <p class="">
                                                <?php echo ucwords($producer_info[0]->bdate); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class='bx bx-briefcase' ></i>                   
                                        </div>
                                        <div class="info">
                                            <p class="">
                                                <?php echo ucwords($producer_info[0]->years_exp); ?> Years
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class="bx bx-laptop"></i>
                                        </div>
                                        <div class="info">
                                            <p class="">
                                                <?php echo ucwords($producer_info[0]->work); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class="bx bx-envelope"></i>
                                        </div>
                                        <div class="info">
                                            <p class="">    
                                                <a href="mailto:<?php echo $producer_info[0]->email; ?>" class="text-link">
                                                    <?php echo $producer_info[0]->email; ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class="bx bxl-facebook-square"></i>
                                        </div>
                                        <div class="info">
                                            <p class="">
                                                <a href="<?php echo $producer_info[0]->facebook; ?>" class="text-link">
                                                    <?php echo $producer_info[0]->facebook; ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class='bx bxl-twitter'></i>
                                        </div>
                                        <div class="info">
                                            <p class="">
                                                <a href="<?php echo $producer_info[0]->facebook; ?>" class="text-link">
                                                    <?php echo $producer_info[0]->facebook; ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class='bx bxl-instagram-alt' ></i>
                                        </div>
                                        <div class="info">
                                            <p class="">
                                                <a href="<?php echo $producer_info[0]->instagram; ?>" class="text-link">
                                                    <?php echo $producer_info[0]->instagram; ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class='bx bxl-pinterest' ></i>
                                        </div>
                                        <div class="info">
                                            <p class="">
                                                <a href="<?php echo $producer_info[0]->pinterest; ?>" class="text-link">
                                                    <?php echo $producer_info[0]->pinterest; ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="icon px-2">
                                            <i class='bx bx-info-square' ></i>
                                        </div>
                                        <div class="info">
                                            <p class="">
                                                <a href="<?php echo $producer_info[0]->others; ?>" class="text-link">
                                                    <?php echo $producer_info[0]->others; ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header border-0 d-inline-flex justify-content-between align-items-center">
                                    <h4 class="card-title p-2">My Music</h4>
                                    <div class="close-about d-block d-md-none">
                                        <i class="bx bx-x "></i>
                                    </div>
                                </div>
                                <div class="card-body view-profile">
                                    <div class="row">
                                        <?php
                                        if(count($producer_music) > 0) {
                                            foreach ($producer_music as $row) {
                                        ?>
                                            <div class="col-12 col-md-6 col-lg- mb-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="profile d-inline-flex justify-content-center align-items-center gap-3">
                                                            <div>
                                                                <img src="../assets/uploads/music-banner/<?php echo $row->music_banner; ?>" alt="" srcset="" class="img-fluid">
                                                            </div>
                                                            <div>
                                                                <h5 class="m-0"><?php echo $row->music_name; ?></h5>
                                                                <small class="m-0 mt-1"><?php echo $row->artist_name; ?></small>
                                                            </div>
                                                        </div>
                                                        <div class="audio-player mt-3">
                                                            <audio controls controlsList="nodownload" class="form-control">
                                                                <source src="../assets/uploads/music-file/<?php echo $row->music_file; ?>" type="audio/mp3">
                                                                <source src="../assets/uploads/music-file/<?php echo $row->music_file; ?>" type="audio/mp3">
                                                                <source src="../assets/uploads/music-file/<?php echo $row->music_file; ?>" type="audio/mp3">
                                                            </audio>
                                                        </div>
                                                        <div class="pub mt-3">
                                                            <p class="text-muted m-0" style="font-size: 11px;">
                                                                Released: <?php echo $row->date_released; ?>
                                                            </p>
                                                            <p class="text-muted m-0" style="font-size: 11px;">
                                                                Genre: <?php echo $row->music_genre; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            }
                                        } else {
                                        ?>
                                            <div class="col-12 mb-3">
                                                <div class="card">
                                                    <div class="card-body p-4">
                                                        No music uploads
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
                </div>
                <?php
                    } else {
                ?>
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body p-4">
                            No producer found in this username
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>