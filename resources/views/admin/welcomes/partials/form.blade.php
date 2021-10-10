<div class="form-group">
    {!! Form::label('titulo', 'Titulo') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Titulo de la Portada']) !!}

    @error('titulo')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('sudtitulo', 'Subtítulo') !!}
    {!! Form::text('sudtitulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Subtítulo de la Portada']) !!}

    @error('sudtitulo')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($welcome->image)
                <img id="picture" src="{{$welcome->image->url}}">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2021/08/25/20/42/field-6574455_960_720.jpg">
            @endisset
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en la Portada') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo de la portada:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
    <small class="text-danger">{{$message}}</small>
    @enderror

</div>
