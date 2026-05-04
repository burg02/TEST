




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
                <li class="list-unstyled-item ps-3 py-3 active">
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
            <div class="trending-banner">
                <img src="assets/uploads/music-banner/<?php echo $random_music[0]->music_banner; ?>" alt="" srcset="">
                <div class="trending-banner-text">
                    <div class="banner-title d-inline-flex">
                        <h5>Trending</h5>
                    </div>
                    <div class="banner-info">
                        <h1 class="music-title m-0"><?php echo $random_music[0]->music_name; ?></h1>
                        <h4 class="producer m-0"><?php echo $random_music[0]->artist_name; ?></h4>
                        <p class="listiners m-0"><?php echo $random_music[0]->music_genre; ?></p>
                    </div>
                    <button type="button" class="btn-play-trending d-flex justify-content-center align-items-center" data-target="<?php echo $random_music[0]->music_file; ?>">Play <i class='bx bx-play'></i></button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <div class="row mt-3">
                        <div class="col-12 col-md-12 mb-3">
                            <div class="genres p-4">
                                <h5>Genres</h5>
                                <div class="row mt-3">
                                    <div class="col-12 col-md-6">
                                        <a href="/genres/pop">
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <img src="assets/media/genre/pop.jpg" alt="pop" class="img-fluid">
                                                    <div class="genre-name d-flex justify-content-center align-items-center">
                                                        <p>Pop Music</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="/genres/rock">
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <img src="assets/media/genre/rock.jpg" alt="rock" class="img-fluid">
                                                    <div class="genre-name d-flex justify-content-center align-items-center">
                                                        <p>Rock Music</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="/genres/hiphop">
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <img src="assets/media/genre/hiphop.jpg" alt="hiphop" class="img-fluid">
                                                    <div class="genre-name d-flex justify-content-center align-items-center">
                                                        <p>Hip Hop Music</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="/genres/reggae">
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <img src="assets/media/genre/reggae.jpg" alt="reggae" class="img-fluid">
                                                    <div class="genre-name d-flex justify-content-center align-items-center">
                                                        <p>Reggae Music</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="/genres/metal">
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <img src="assets/media/genre/metal.jpg" alt="metal" class="img-fluid">
                                                    <div class="genre-name d-flex justify-content-center align-items-center">
                                                        <p>Metal Music</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="/genres/all">
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <img src="assets/media/genre/others.jpg" alt="" class="img-fluid">
                                                    <div class="genre-name d-flex justify-content-center align-items-center">
                                                        <p>More genres</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-md-12 mt-3">
                            <div class="top-producers p-4">
                                <h5>Top Producers</h5>
                                <div class="row mt-3">
                                    <?php 
                                        foreach ($top_producers as $row) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <img src="assets/uploads/profile/<?php echo $row->profile; ?>" alt="" class="img-fluid">
                                                    <div class="producer-name d-flex justify-content-center align-items-center">
                                                        <div class="text-center">
                                                            <p class="m-0"><?php echo $row->full_name; ?></p>
                                                            <a href="/producer/<?php echo $row->username; ?>" class="btn-visit-profile">Visit Profile</a>
                                                        </div>
                                                    </div>
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
            <div class="row mt-3 top-beats p-4">
                <h5 class="mb-4">New Music Releases</h5>
                <?php
                    if(count($all_music) > 0) {
                    foreach ($all_music as $row) {
                ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="/producer/<?php echo $row->user; ?>" class="text-decoration-none text-white">
                                    <div class="profile d-inline-flex justify-content-center align-items-center gap-3">
                                        <div>
                                            <img src="assets/uploads/music-banner/<?php echo $row->music_banner; ?>" alt="" srcset="" class="img-fluid">
                                        </div>
                                        <div>
                                            <h5 class="m-0" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $row->music_name; ?>"><?php echo $row->music_name; ?></h5>
                                            <small class="m-0 mt-1"><?php echo $row->artist_name; ?></small>
                                        </div>
                                    </div>
                                    <div class="audio-player mt-3">
                                        <audio controls controlsList="nodownload" class="form-control" id="<?php echo $row->id; ?>">
                                            <source src="assets/uploads/music-file/<?php echo $row->music_file; ?>" type="audio/mp3">
                                            <source src="assets/uploads/music-file/<?php echo $row->music_file; ?>" type="audio/mp3">
                                            <source src="assets/uploads/music-file/<?php echo $row->music_file; ?>" type="audio/mp3">
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
                    <div class="card">
                        <div class="card-body p-4">
                            No music found
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
