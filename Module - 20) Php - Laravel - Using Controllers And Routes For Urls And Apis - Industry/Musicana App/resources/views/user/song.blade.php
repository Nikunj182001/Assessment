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

                            <span style="background:yellow;margin-right:10px"><a href="{{route('userProfile')}}"><i
                                        style="font-size:x-large"
                                        class="mdi mdi-account-edit text-success"></i></a></span>



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
                <div>
                    <h3>@if (session('content'))
                        {{session('content')}}
                    @endif
                    </h3>
                </div>
                <div class="row" style="background:lightblue">

                    <div class="col-xl-8 py-3">
                        <div>
                            <h3>My Favourites</h3>
                        </div>

                        <table class="table">
                            <thead>
                                <tr style="color:darkred">
                                    <th scope="col">Song Name</th>
                                    <th scope="col">Artist</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($song as $a)
                                    <tr>
                                        <td class="song">{{$a->song_name}}

                                        </td>

                                        <td>{{$a->artist_name}}</td>
                                        <td><button class="btn-info play">PLAY</button><button class="btn-info pause"
                                                hidden>PAUSE</button><span class="audio"></span></td>
                                        <td><a href="{{route('delFavSong', $a->id)}}" class="btn btn-danger">DELETE</a></td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <script>
        $('.play').click(function () {

            $(this).prop('hidden', true);
            $(this).siblings('.pause').prop('hidden', false);


            song = $(this).parent().siblings('.song').text();
            console.log(song)
            // $('#aud').prop('hidden', true)
            path = '{{asset("songs")}}';
            // $('.audio').html(`<audio src="${path}/${song}" controls autoplay loop class="plays" hidden></audio>`);


            // $(this).siblings('.pause').click(function () {
            //     if ($('.audio').children('.plays').trigger('play')) {
            //         $('.audio').children('.plays').trigger('pause');
            //         $(this).prop('hidden', true);
            //         $(this).siblings('.play').prop('hidden', false);

            //     }
            // });

            $(this).siblings('.audio').html(`<audio src="${path}/${song}" controls autoplay loop class="plays" hidden></audio>`);

            $(this).siblings('.pause').click(function () {
                if ($(this).siblings('.audio').children('.plays').trigger('play')) {
                    $(this).siblings('.audio').children('.plays').trigger('pause');
                    $(this).prop('hidden', true);
                    $(this).siblings('.play').prop('hidden', false);

                }
            });

        })
    </script>
</body>

</html>