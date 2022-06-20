@extends('artist.plantilla')

@section('contenido')

    <h2>Editar un producto</h2>
    <a href="{{ route('artist.index') }}">Volver a la lista</a>

    <br>

    @if ($errors->any())
            Hubo problemas con tu entrada<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif

    <br>

    <form action="{{ route('artist.update',$artist->id) }}" method="POST">
        @csrf
        @method('PUT')
            Nombre:<input type="text" name="nombre" value="{{ $artist->nombre }}" class="form-control" placeholder="nombre">
            <button type="submit" class="btn btn-primary">Editar</button>

    </form>
@endsection
