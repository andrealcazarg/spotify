@extends('artist.plantilla')

@section('contenido')

    <a href="{{ route('artist.create') }}">Insertar un artista</a>

    <hr>
    Espacio para mensajes:<br>
    @if ($message = Session::get('exito'))
            <p>{{ $message }}</p>
    @endif

    <hr>

    <table>
        @foreach ($data as $clave => $valor)
        <tr>
                 <form action="{{ route('artist.destroy',$valor->id) }}" method="POST">
                     <td>{{ $valor->nombre }}</td>
                     <td><a href="{{ route('artist.show',$valor->id) }}">Mostrar</a></td>
                     <td><a href="{{ route('artist.edit',$valor->id) }}">Editar</a></td>
                    @csrf
                    @method('DELETE')
                     <td><button type="submit">Borrar</button></td>
                </form>
        </tr>
        @endforeach
    </table>
@endsection
