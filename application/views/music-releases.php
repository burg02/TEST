<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BS5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <title>Dashboard | ProdFinder</title>
</head>
<body>

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
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/producers" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bx-user-check'></i>
                            <span>Producers</span>
                        </a>
                    </li>
                    <li class="list-unstyled-item ps-3 py-3 active">
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
                <div class="all-music p-4">
                    <h5>All Music</h5>
                    <form action="/music-releases" method="post">
                        <div class="d-block d-md-flex align-items-center gap-2 mt-3">
                            <div class="w-100">
                                <input type="search" name="search" id="search" class="form-control" placeholder="Search Music | Artists | Genres | Date Released">
                            </div>
                            <div class="w-100 mt-md-0 mt-3">
                                <button type="submit" id="btn-search-music" class="btn-search-music">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-3">
                        <?php
                            if(count($musicdata) > 0) {

                            foreach ($musicdata as $row) {
                        ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <div class="card">
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
                                        </a>
                                        <div class="audio-player mt-3">
                                            <audio controls controlsList="nodownload" class="form-control" id="<?php echo $row->id; ?>">
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
                                        No music to show
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../assets/js/app.js"></script>
</html>