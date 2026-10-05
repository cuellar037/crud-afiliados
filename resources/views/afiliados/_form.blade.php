<div class="row g-3">

    {{-- Nombre --}}
    <div class="col-md-6">

        <label for="nombre" class="form-label">
            Nombre <span class="text-danger">*</span>
        </label>

        <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
            value="{{ old('nombre', $afiliado->nombre ?? '') }}" maxlength="100" required>

        @error('nombre')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Apellido --}}
    <div class="col-md-6">

        <label for="apellido" class="form-label">
            Apellido <span class="text-danger">*</span>
        </label>

        <input type="text" id="apellido" name="apellido"
            class="form-control @error('apellido') is-invalid @enderror"
            value="{{ old('apellido', $afiliado->apellido ?? '') }}" maxlength="100" required>

        @error('apellido')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Tipo documento --}}
    <div class="col-md-4">

        <label for="tipo_documento" class="form-label">
            Tipo de documento <span class="text-danger">*</span>
        </label>

        <select id="tipo_documento" name="tipo_documento"
            class="form-select @error('tipo_documento') is-invalid @enderror" required>

            <option value="">
                Seleccione...
            </option>

            @foreach ([
        'CC' => 'Cédula de ciudadanía',
        'CE' => 'Cédula de extranjería',
        'TI' => 'Tarjeta de identidad',
        'PPT' => 'Permiso por protección temporal',
    ] as $value => $label)
                <option value="{{ $value }}" @selected(old('tipo_documento', $afiliado->tipo_documento ?? '') === $value)>
                    {{ $label }}
                </option>
            @endforeach

        </select>

        @error('tipo_documento')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Número documento --}}
    <div class="col-md-8">

        <label for="numero_documento" class="form-label">
            Número de documento <span class="text-danger">*</span>
        </label>

        <input type="text" id="numero_documento" name="numero_documento"
            class="form-control @error('numero_documento') is-invalid @enderror"
            value="{{ old('numero_documento', $afiliado->numero_documento ?? '') }}" maxlength="30" required>

        @error('numero_documento')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Celular --}}
    <div class="col-md-6">

        <label for="numero_celular" class="form-label">
            numero_Celular <span class="text-danger">*</span>
        </label>

        <input type="tel" id="numero_celular" name="numero_celular" class="form-control @error('numero_celular') is-invalid @enderror"
            value="{{ old('numero_celular', $afiliado->numero_celular ?? '') }}" pattern="3[0-9]{9}" maxlength="10"
            placeholder="3001234567" required>

        <div class="form-text">
            Debe contener 10 dígitos y comenzar por 3.
        </div>

        @error('numero_celular')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- email --}}
    <div class="col-md-6">

        <label for="email" class="form-label">
            email electrónico <span class="text-danger">*</span>
        </label>

        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $afiliado->email ?? '') }}" maxlength="150" required>

        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>
