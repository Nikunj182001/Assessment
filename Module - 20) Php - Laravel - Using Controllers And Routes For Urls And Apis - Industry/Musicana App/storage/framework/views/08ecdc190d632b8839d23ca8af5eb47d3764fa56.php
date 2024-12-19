<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('css\bootstrap.min.css')); ?>">
    <script src="<?php echo e(asset('assets/jquery-cdn.js')); ?>"></script>

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">

</head>

<body class="bg-dark" style="font-weight:bold;">
    <div>
        <div class="row">
            <div class="col-xl-12">

                <!-- NAVBAR -->


                <nav class="navbar navbar-expand-lg  bg-dark  navbar-dark">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="<?php echo e(route('musicana')); ?>">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('album')); ?>">Album</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?php echo e(route('song')); ?>" tabindex="-1" aria-disabled="false">My
                                        Songs</a>
                                </li>
                                <form class="d-flex px-5">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </ul>
                            <span class="navabar-text px-3" id="user" style="color:skyblue"><?php if(session()->has('name')): ?>
                                <?php echo e(session()->get('name')); ?>

                            <?php endif; ?> </span>
                            <span style="background:yellow;margin-right:10px"><a href="<?php echo e(route('userProfile')); ?>"><i
                                        style="font-size:x-large"
                                        class="mdi mdi-account-edit text-success"></i></a></span>


                            <span class="navabar-text"><a href="<?php echo e(route('logoutUser')); ?>">Logout</a></span>


                            <!-- <ul class="navbar-nav me-auto mb-2 navbar-text  mb-lg-0 ">
                                <li class="nav-item ">
                                    <a class="nav-link active" aria-current="page" href="#">Add Album</a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link active" aria-current="page" href="#">Logout</a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </nav>



                <!-- BODY PART -->
                <div>
                    <h3 style="color:blue">
                        <?php if(session('content')): ?>
                            <?php echo e(session('content')); ?>

                        <?php endif; ?>
                    </h3>
                </div>
                <div class="row " style="background:violet">
                    <div class="col-xl-3 px-4 py-3">
                        <div class="card" style="width: 18rem;">
                            <video id="poster" poster="<?php echo e(asset('assets\images\coverImage.jpeg')); ?>"></video>

                            <div id="audio"></div>
                            <div id="aud"><audio src="" controls></audio></div>
                            <!-- <img src="<?php echo e(asset('img/women-03.jpg')); ?>" class="card-img-top" alt="..."> -->

                            <div class="card-body">
                                <h6 class="card-title" id="art">
                                    Artist
                                </h6>
                                <p class="card-text" id="alb">
                                    Album
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 py-3">
                        <span><a href="#" class="btn btn-info">Veiw All</a></span>
                        <table class="table">
                            <thead>
                                <tr style="color:darkred">
                                    <th scope="col">Title</th>
                                    <th scope="col">Audio File</th>
                                    <th scope="col">Add To Favourites</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $song; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="song"><?php echo e($s->song_name); ?></td>
                                        <td hidden class="artist"><?php echo e($s->artist_name_fk); ?></td>
                                        <td hidden class="album"><?php echo e($s->album_name_fk); ?></td>
                                        <td><button class="file btn-info" id="<?php echo e($s->id); ?>">PLAY</button><button
                                                class="pause btn-info" id="<?php echo e($s->id); ?>" hidden>PAUSE</button></td>
                                        <td><a href="<?php echo e(route('favSong', $s->id)); ?>" class="btn btn-info">ADD</a></td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <script>
        $('.file').click(function () {
            // id = $(this).attr('id');
            // console.log(id)

            $(this).prop('hidden', true);
            $(this).siblings('.pause').prop('hidden', false);


            song = $(this).parent().siblings('.song').text();
            artist = $(this).parent().siblings('.artist').text();
            album = $(this).parent().siblings('.album').text();


            // console.log(song)
            $('#aud').prop('hidden', true)
            path = '<?php echo e(asset("songs")); ?>';
            $('#audio').html(`<audio src="${path}/${song}" controls autoplay loop class="play"></audio>`);

            // $(this).siblings('.pause').click(function () {
            //     $('#audio').children('.play').trigger('pause');
            //     $(this).prop('hidden', true);
            //     $(this).siblings('.file').prop('hidden', false);
            //     $('.play').prop('hidden', true);
            //     // $('#aud').prop('hidden', false);

            // });
            // $('#audio').children('.play').trigger('play');

            $(this).siblings('.pause').click(function () {
                if ($('#audio').children('.play').trigger('play')) {
                    $('#audio').children('.play').trigger('pause');
                    $(this).prop('hidden', true);
                    $(this).siblings('.file').prop('hidden', false);
                    $('.play').prop('hidden', true);
                    $('#aud').prop('hidden', false);
                }
            });

            $('#art').text(artist);
            $('#alb').text(album);
        })


    </script>

</body>

</html><?php /**PATH C:\xampp\htdocs\LARAVEL\MUSICANA_APP\resources\views/user/musicana.blade.php ENDPATH**/ ?>