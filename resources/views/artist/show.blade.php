@extends('artist.plantilla')

@section('contenido')
    <h2>Mostrar artista</h2>
    <a href="{{ route('artist.index') }}">Volver a la lista</a>
    <br>
    Código: {{ $artist->id }}
    Nombre: {{ $artist->nombre }}
@endsection
