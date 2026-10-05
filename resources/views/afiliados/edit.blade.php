@extends('layouts.app')

@section('title', 'Editar afiliado')

@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="mb-4">

                <h1 class="h3 mb-1">
                    Editar afiliado
                </h1>

                <p class="text-muted mb-0">
                    Actualice la información del afiliado.
                </p>

            </div>


            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <strong>
                                Revise los siguientes errores:
                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form action="{{ route('afiliados.update', $afiliado) }}" method="POST">

                        @csrf
                        @method('PUT')

                        @include('afiliados._form')

                        <hr class="my-4">

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('afiliados.index') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Actualizar afiliado
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
