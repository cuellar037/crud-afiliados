@extends('layouts.app')

@section('title', 'Nuevo afiliado')

@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="d-flex align-items-center mb-4">

                <div>
                    <h1 class="h3 mb-1">
                        Nuevo afiliado
                    </h1>

                    <p class="text-muted mb-0">
                        Registre la información personal del afiliado.
                    </p>
                </div>

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


                    <form action="{{ route('afiliados.store') }}" method="POST">

                        @csrf

                        @include('afiliados._form')

                        <hr class="my-4">

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('afiliados.index') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Guardar afiliado
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
