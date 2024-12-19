<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Musicana - Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Favicon -->
    <link href="<?php echo e(asset('img/favicon.ico')); ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid px-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Email Us</h6>
                        <span>info@example.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-primary border-inner py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <a href="/" class="navbar-brand">
                        <h1 class="m-0 text-uppercase text-white">Musicana</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Call Us</h6>
                        <span>+012 345 6789</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <!-- <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i>CakeZone</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-lg-auto py-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="about" class="nav-item nav-link">About Us</a>
                <a href="menu" class="nav-item nav-link">Menu & Pricing</a>
                <a href="team" class="nav-item nav-link">Master Chefs</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="service" class="dropdown-item">Our Service</a>
                        <a href="testimonial" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <a href="contact" class="nav-item nav-link">Contact Us</a>
                <a href="login" class="nav-item nav-link">LOGIN</a>
                <a href="register" class="nav-item nav-link">REGISTER</a>

            </div>
        </div>
    </nav> -->
    <!-- Navbar End -->


    <section class="vh-150" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-2 text-center">


                            <!-- FORM TAG -->
                            <?php if(session('content')): ?>
                                <h3><?php echo e(session('content')); ?></h3>
                            <?php endif; ?>

                            <h3 class="mb-4">Sign Up</h3>

                            <form action="<?php echo e(route('storeUser')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                </div>


                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" />
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="chk" name="chk" />
                                    <label class="form-check-label" for="chk"> Remember </label>
                                </div>


                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-lg btn-block" type="submit" id="btn">Sign
                                    Up</button>


                            </form>

                            <hr class="my-4">
                            <div class="d-flex">
                                <p class="">If Already Registered</p>

                                <a href="<?php echo e(URL::to('/')); ?>" class="btn btn-info">Login
                                </a>
                            </div>

                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block btn-primary"
                                style="background-color: #dd4b39;" type="button"><i class="fab fa-google me-2"></i> Sign
                                in with google</button>
                            <button data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                                type="button"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-inner py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('lib/easing/easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/waypoints/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/counterup/counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/owlcarousel/owl.carousel.min.js')); ?>"></script>

    <!-- Template Javascript -->
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>



</body>

</html><?php /**PATH C:\xampp\htdocs\LARAVEL\MUSICANA_APP\resources\views/register.blade.php ENDPATH**/ ?>