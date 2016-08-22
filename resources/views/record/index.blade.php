@extends('layouts.app')

@section('metadata')
    <title>Ultimos tiempos de circuito añadidos</title>
    <meta name="description" content="Lista de tiempos añadidos o modificados" />
    <meta name="robots" content="all" />

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Ultimos tiempos de circuito añadidos" />
    <meta property="og:description" content="Lista de tiempos añadidos o modificados" />
    <meta property="og:image" content="{{ asset("img/cn-logo.png") }}" />
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="{{ route('portada') }}">
                <span itemprop="title">Portada</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">Ultimos tiempos</span>
            </a>
        </li>
    </ol>
@endsection

@section('sidebar')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-page" data-href="https://www.facebook.com/circuitodenurburgring" data-tabs="timeline" data-width="600" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/circuitodenurburgring"><a href="https://www.facebook.com/circuitodenurburgring">Facebook</a></blockquote></div></div>
@endsection

@section('content')
    <h1>Lista de ultimos record</h1>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#">Lista</a></li>
        <li role="presentation"><a href="#">Añadir un tiempo</a></li>
    </ul>
    <p>&nbsp;</p>
    <table class="table table-responsive table-striped">
        @foreach($records as $record)
            <tr>
                <td>
                    <a class="img-thumbnail" href="{{ url("record/{$record->slug}") }}">
                        <img width="200" height="150" src="holder.js/200x150" data-original="holder.js/200x150">
                    </a>
                </td>
                <td>
                    <a href="{{ url("record/{$record->slug}") }}"><h2>{{ $record->name }}</h2></a>
                    <p>{{ $record->car->model }}</p>
                    <a class="btn btn-sm btn-default" href="#"><i class="fa fa-tag"></i> Otros tiempos del circuito</a>
                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-edit"></i> Editar Tiempo</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection