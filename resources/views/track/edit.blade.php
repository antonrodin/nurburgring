@extends('layouts.app')

@section('metadata')
    <title>Editar {{ $track->name }}</title>
    <meta name="description" content="Editar {{ $track->name }}" />
    <meta name="robots" content="noindex, nofollow" />
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="{{ route('portada') }}">
                <span itemprop="title">Portada</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ url("circuit") }}">
                <span itemprop="title">Circuitos</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ url("circuit/{$track->slug}") }}">
                <span itemprop="title">{{ $track->name }}</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">Editar</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <h2>Editar {{ $track->name }}</h2>
    <hr>

    <form role="form" class="form-horizontal" action="{{ url("circuit/{$track->id}") }}" method="POST">

        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Nombre</label>
            <div class="col-md-8">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $track->name) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="country" class="col-md-4 control-label">Pais</label>
            <div class="col-md-8">
                <input id="country" type="text" class="form-control" name="country" value="{{ old('country', $track->country_id) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="city" class="col-md-4 control-label">Ciudad</label>
            <div class="col-md-8">
                <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $track->city_id) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-md-4 control-label">Dirección</label>
            <div class="col-md-8">
                <input id="address" type="text" class="form-control" name="address" value="{{ old('address', $track->address) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-md-4 control-label">Descripción larga</label>
            <div class="col-md-8">
                <textarea id="description" type="text" class="form-control" rows="12" name="description">{{ old('description', $track->description) }}</textarea>
            </div>
        </div>

        <h3>Campos recomendables</h3>
        <hr>

        <div class="form-group">
            <label for="url" class="col-md-4 control-label">Web</label>
            <div class="col-md-8">
                <input id="url" type="text" class="form-control" name="url" value="{{ old('url', $track->url) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="facebook" class="col-md-4 control-label">Facebook</label>
            <div class="col-md-8">
                <input id="facebook" type="text" class="form-control" name="facebook" value="{{ old('facebook', $track->facebook) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-md-4 control-label">Correo electrónico</label>
            <div class="col-md-8">
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $track->email) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="length" class="col-md-4 control-label">Longitud</label>
            <div class="col-md-8">
                <input id="length" type="text" class="form-control" name="length" value="{{ old('length', $track->length) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="straight" class="col-md-4 control-label">Recta mas larga</label>
            <div class="col-md-8">
                <input id="straight" type="text" class="form-control" name="straight" value="{{ old('straight', $track->straight) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="width" class="col-md-4 control-label">Anchura máxima</label>
            <div class="col-md-8">
                <input id="width" type="text" class="form-control" name="width" value="{{ old('width', $track->width) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="slope" class="col-md-4 control-label">Pediente máxima</label>
            <div class="col-md-8">
                <input id="slope" type="text" class="form-control" name="slope" value="{{ old('slope', $track->slope) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="capacity" class="col-md-4 control-label">Capacidad gradas</label>
            <div class="col-md-8">
                <input id="capacity" type="text" class="form-control" name="capacity" value="{{ old('capacity', $track->capacity) }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-save"></i>&nbsp; Actualizar circuito
                </button>
            </div>
        </div>

    </form>

@endsection