@extends('layouts.app')

@section('metadata')
    <title>Añadir un nuevo circuito</title>
    <meta name="description" content="Añadir un nuevo circuito" />
    <meta name="robots" content="noindex, follow" />
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
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">Añadir</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <h1>Añadir un nuevo circuito</h1>

    <ul class="nav nav-tabs">
        <li role="presentation"><a href="{{ url('circuit') }}">Lista</a></li>
        <li role="presentation" class="active"><a href="{{ url('circuit/create') }}">Añadir un circuito</a></li>
    </ul>
    <p>&nbsp;</p>

    <form role="form" class="form-horizontal" action="{{ url("circuit") }}" method="POST">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Nombre</label>
            <div class="col-md-8">
                <input id="name" type="text" class="form-control" name="name" placeholder="Circuito de Jarama" value="{{ old('name') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="country" class="col-md-4 control-label">Pais</label>
            <div class="col-md-8">
                <input id="country" type="text" class="form-control" name="country" placeholder="España" value="{{ old('country') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="city" class="col-md-4 control-label">Ciudad</label>
            <div class="col-md-8">
                <input id="city" type="text" class="form-control" name="city" placeholder="Madrid" value="{{ old('city') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-md-4 control-label">Dirección</label>
            <div class="col-md-8">
                <input id="address" type="text" class="form-control" name="address" placeholder="Autovía A-1, km 28" value="{{ old('address') }}">
            </div>
        </div>


        <div class="form-group">
            <label for="description" class="col-md-4 control-label">Descripción larga (HTML)</label>
            <div class="col-md-8">
                <textarea id="description" type="text" class="form-control" rows="12" name="description">{{ old('description') }}</textarea>
            </div>
        </div>

        <h3>Campos recomendables</h3>
        <hr>

        <div class="form-group">
            <label for="url" class="col-md-4 control-label">Web</label>
            <div class="col-md-8">
                <input id="url" type="text" class="form-control" name="url" placeholder="http://www.jarama.org/" value="{{ old('url') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="facebook" class="col-md-4 control-label">Facebook</label>
            <div class="col-md-8">
                <input id="facebook" type="text" class="form-control" name="facebook" placeholder="https://www.facebook.com/JaramaRACE" value="{{ old('facebook') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-md-4 control-label">Correo electrónico</label>
            <div class="col-md-8">
                <input id="email" type="text" class="form-control" name="email" placeholder="example@example.org" value="{{ old('email') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="length" class="col-md-4 control-label">Longitud</label>
            <div class="col-md-8">
                <input id="length" type="text" class="form-control" name="length" placeholder="3,850 mts" value="{{ old('length') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="straight" class="col-md-4 control-label">Recta mas larga</label>
            <div class="col-md-8">
                <input id="straight" type="text" class="form-control" name="straight" placeholder="879 mts" value="{{ old('straight') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="curves" class="col-md-4 control-label">Numero de curvas</label>
            <div class="col-md-8">
                <input id="curves" type="text" class="form-control" name="curves" placeholder="8 a la derecha y 5 a la izquierda" value="{{ old('curves') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="width" class="col-md-4 control-label">Anchura máxima</label>
            <div class="col-md-8">
                <input id="width" type="text" class="form-control" name="width" placeholder="9 metros" value="{{ old('width') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="slope" class="col-md-4 control-label">Pediente máxima</label>
            <div class="col-md-8">
                <input id="slope" type="text" class="form-control" name="slope" placeholder="7,5 %" value="{{ old('slope') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="capacity" class="col-md-4 control-label">Capacidad gradas</label>
            <div class="col-md-8">
                <input id="capacity" type="text" class="form-control" name="capacity" placeholder="80.000" value="{{ old('capacity') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="services" class="col-md-4 control-label">Servicios</label>
            <div class="col-md-8">
                <input id="services" type="text" class="form-control" name="services" placeholder="Cafeteria, Restaurantes, Aparcamiento, Baños en Boxes" value="{{ old('services') }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-save"></i>&nbsp; Añadir circuito
                </button>
            </div>
        </div>

    </form>
@stop