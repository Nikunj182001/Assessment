<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('css\bootstrap.min.css')); ?>">
</head>

<body>
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
                                    <a class="nav-link " aria-current="page" href="#">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Album</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#" tabindex="-1" aria-disabled="false">Songs</a>
                                </li>
                                <form class="d-flex px-5">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </ul>
                            <span class="navabar-text px-3"><a href="">Add Album</a></span>
                            <span class="navabar-text"><a href="">Logout</a></span>


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

                <div class="row bg-dark">
                    <div class="col-xl-3 px-4 py-3">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo e(asset('img/women-03.jpg')); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">
                                    Taylor Swift
                                </h6>
                                <p class="card-text">
                                    Hawai
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 py-3">
                        <span><a href="#" class="btn btn-info">Veiw All</a></span>
                        <span class="px-2"><a href="#" class="text-info">Add New Song</a></span>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Audio File</th>
                                    <th scope="col">Favourites</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry the Bird</td>
                                    <td>@twitter</td>
                                    <td>@kgj</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>







            </div>
        </div>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\LARAVEL\CAKE_SHOP\resources\views/index.blade.php ENDPATH**/ ?>