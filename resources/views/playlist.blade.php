
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid" >
        <img src={{ asset('logo.png') }}  width="30" height="30" class="d-inline-block align-text-top">

        <a class="navbar-brand" href="#">Spotify</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="playlist">Playlists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile">Perfil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" >
    <div class="col align-self-center text-center" style="margin-top: 2%"><h2>Playlists del Usuario</h2></div>
    <div class="col align-self-center" style="margin-left: 25%; margin-top: 2%">
        @foreach($playlist["items"] as $values)
            <a href="{{$values["uri"]}}">
                <img src="{{$values["images"][0]["url"]}}"></img>
            </a>
            <a href="playlistsong/?idPlaylist={{$values["id"]}}">
            <p>Nombre: {{$values["name"]}}</p>
            </a>
        @endforeach
    </div>
</div>


</body>
</html>
