

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
                    <li class="list-unstyled-item ps-3 py-3">
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
                    <li class="list-unstyled-item ps-3 py-3 active">
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
                <div class="all-genres p-4">
                    <h5>All Genres</h5> 
                    <div class="row mt-4">
                        <div class="col-12 col-md-2 parent-select">
                            <a href="/genres/all" class="text-decoration-none text-white">
                                <div class="card active">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">All</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-2 parent-select">
                            <a href="/genres/pop" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">Pop</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-2 parent-select">
                            <a href="/genres/rock" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">Rock</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-2 parent-select">
                            <a href="/genres/jazz" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">Jazz</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-2 parent-select">
                            <a href="/genres/hiphop" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">HipHop</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-2 parent-select">
                            <a href="/genres/r&b" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">R & B</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-md-2 parent-select">
                            <a href="/genres/heavy metal" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">Metal</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-2 parent-select">
                            <a href="/genres/electronic" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">Electronic</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 parent-select">
                            <a href="/genres/classical" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">Classical</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-2 parent-select">
                            <a href="/genres/folk" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">Folk</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 parent-select">
                            <a href="/genres/reggae" class="text-decoration-none text-white">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <h6 class="m-0">Reggae</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <h5 class="mt-4">Current Genre: <span class="genre"><?php echo ucwords(str_replace("%20", " ", $currentgenre)); ?></span></h5>
                    <div class="row mt-4 d-flex align-items-center">
                        <?php

                            if(count($musicdata) > 0) {
                                foreach ($musicdata as $row) {
                        ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <div class="card music">
                                    <div class="card-body">
                                        <a href="/producer/<?php echo $row->user; ?>" class="text-decoration-none text-white">
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
                                                <audio controls controlsList="nodownload" class="form-control" id="<?php echo $row->id; ?>">
                                                    <source src="<?php echo base_url("assets/uploads/music-file/") . $row->music_file; ?>" type="audio/mp3">
                                                    <source src="<?php echo base_url("assets/uploads/music-file/") . $row->music_file; ?>" type="audio/mp3">
                                                    <source src="<?php echo base_url("assets/uploads/music-file/") . $row->music_file; ?>" type="audio/mp3">
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
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                                }
                            } else {
                        ?>
                        <div class="col-12 mb-3">
                                <div class="card music">
                                    <div class="card-body p-4">
                                        No music found in this genre
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
</body>
