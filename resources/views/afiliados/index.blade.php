@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Afiliados</h1>
            <p class="text-muted mb-0">
                Gestión de afiliados registrados
            </p>
        </div>

        <a href="{{ route('afiliados.create') }}" class="btn btn-primary">
            + Nuevo afiliado
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('afiliados.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Buscar por documento o nombre completo..." value="{{ $search }}">

                    <button class="btn btn-outline-primary" type="submit">
                        Buscar
                    </button>
                </div>
            </form>

            @if ($afiliados->count())
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre completo</th>
                                <th>Documento</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($afiliados as $afiliado)
                                <tr>
                                    <td>
                                        {{ $afiliado->nombre }}
                                        {{ $afiliado->apellido }}
                                    </td>

                                    <td>
                                        {{ $afiliado->tipo_documento }}
                                        {{ $afiliado->numero_documento }}
                                    </td>

                                    <td>{{ $afiliado->numero_celular }}</td>

                                    <td>{{ $afiliado->email }}</td>

                                    <td class="text-end">

                                        <a href="{{ route('afiliados.edit', $afiliado) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            Editar
                                        </a>

                                        <form action="{{ route('afiliados.destroy', $afiliado) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('¿Está seguro de eliminar este afiliado?')">
                                                Eliminar
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $afiliados->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <h5>No hay afiliados registrados</h5>
                    <p class="text-muted">
                        No se encontraron afiliados para mostrar.
                    </p>

                    <a href="{{ route('afiliados.create') }}" class="btn btn-primary">
                        Registrar afiliado
                    </a>
                </div>
            @endif

        </div>
    </div>

@endsection
