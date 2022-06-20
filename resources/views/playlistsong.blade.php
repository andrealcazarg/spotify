
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Songs of Playlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ URL::asset('jproperties.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <img src={{ asset('logo.png') }}  width="30" height="30" class="d-inline-block align-text-top">

        <a class="navbar-brand text-justify" href="#">Spotify</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/profile">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/playlist">Playlist</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="text-center" style="margin-top: 2%"><h2>Canciones de la Playlist</h2></div>
    <div class="w-50 " style="margin-left: 25%; margin-top: 2%">
        <div id="carrouselMusica" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner align-items-center justify-content-center">

        @foreach($playlistsong["items"] as $values)

                <div class="carousel-item">
                    <a href="{{$values["track"]["uri"]}}">
                    <img src="{{$values["track"]["album"]["images"][0]["url"]}}" class="d-block w-100 h-50 img-fluid" alt="{{$values["track"]["name"]}}">
                    </a>
                    <div class="carousel-caption d-none d-md-block" style="color:wheat;">
                        <h5>{{$values["track"]["artists"][0]["name"]}}</h5>
                        <p>{{$values["track"]["name"]}}</p>
                    </div>
                </div>

        @endforeach
            <button class="carousel-control-prev" type="button" data-bs-target="#carrouselMusica" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carrouselMusica" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


</body>
</html>
