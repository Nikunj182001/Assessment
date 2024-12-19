<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css\bootstrap.min.css')}}">
    <script src="{{asset('assets/jquery-cdn.js')}}"></script>

    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">

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
                                    <a class="nav-link " aria-current="page" href="{{route('musicana')}}">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('album')}}">Album</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('song')}}" tabindex="-1" aria-disabled="false">My
                                        Songs</a>
                                </li>
                                <form class="d-flex px-5">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </ul>
                            <span class="navabar-text px-3" id="user" style="color:skyblue">@if (session()->has('name'))
                                {{session()->get('name')}}
                            @endif </span>
                            <span style="background:yellow;margin-right:10px"><a href="{{route('userProfile')}}"></a><i
                                    style="font-size:x-large" class="mdi mdi-account-edit text-success"></i></a></span>


                            <span class="navabar-text"><a href="{{route('logoutUser')}}">Logout</a></span>


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
                        @if (session('content'))
                            {{session('content')}}
                        @endif
                    </h3>
                </div>
                <div class="row " style="background:violet">

                    <div class="col-xl-8 py-3">

                        <form action="{{route('updateUser', $user->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div data-mdb-input-init class="form-outline mb-4 px-5">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control form-control-lg"
                                    value="{{$user->name}}" />
                            </div>


                            <div data-mdb-input-init class="form-outline mb-4 px-5">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                    value="{{$user->email}}" />
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4 px-5">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" value="{{$user->password}}" />
                            </div>

                            <div class="d-flex justify-content-center">
                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-lg btn-block" type="submit" id="btn">Change</button>
                            </div>


                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
</body>

</html>