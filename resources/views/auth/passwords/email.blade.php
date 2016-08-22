@extends('layouts.app')

@section('metadata')
    <title>Actualizar la contraseña</title>
    <meta name="description" content="Actualizar la contraseña" />
    <meta name="robots" content="noindex, nofollow" />

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Actualizar la contraseña" />
    <meta property="og:description" content="Actualizar la contraseña" />
    <meta property="og:image" content="{{ asset("img/cn-logo.png") }}" />
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="{{ url('portada') }}">
                <span itemprop="title">Portada</span>
            </a>
        </li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">Actualizar contraseña</span>
            </a>
        </li>
    </ol>
    @endsection

<!-- Main Content -->
@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Restablecer contraseña</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Mandar enlace para restablecer la contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
