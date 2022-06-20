@extends('artist.plantilla')

@section('contenido')

    <h2>Insertar un nuevo juego</h2>
    <a href="{{ route('artist.index') }}">Volver a la lista</a>

    <br>

@if ($errors->any())
        Hubo problemas con tu entrada.<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

@endif

    <br>

<form action="{{ route('artist.store') }}" method="POST">
    @csrf
        Nombre:<input type="text" name="nombre" class="form-control" placeholder="nuevo nombre">
        <button type="submit" class="btn btn-primary">Insertar</button>
</form>
@endsection
