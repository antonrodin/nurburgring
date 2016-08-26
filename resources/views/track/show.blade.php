@extends('layouts.app')

@section('metadata')
    <title>{{ $circuit->name }}</title>
    <meta name="description" content="Descripción del circuito {{ $circuit->name }}, records del autódromo, localización y como llegar a {{ $circuit->name }}, datos de contacto, capacidad... etc" />
    <meta name="robots" content="all" />

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $circuit->name }}" />
    <meta property="og:description" content="Descripción del circuito {{ $circuit->name }}, records del autódromo, localización y como llegar a {{ $circuit->name }}, datos de contacto, capacidad... etc" />
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
            <a itemprop="url" href="{{ url('circuit') }}">
                <span itemprop="title">Lista de circuitos</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">{{ $circuit->name }}</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-8 col-sm-12">
            <h1>{{ $circuit->name }}</h1>
            <p>
                {{ strip_tags(str_limit($circuit->description, 150)) }}
            </p>
        </div>
        <div class="col-md-4 col-sm-12">
            <a href="#" class="img-thumbnail">
                <img class="img-responsive" src="holder.js/200x200">
            </a>
        </div>
    </div>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{ url("circuit/{$circuit->slug}") }}">Información</a></li>
        <li role="presentation"><a href="{{ url("circuit/{$circuit->slug}/description") }}">Descripción</a></li>
        <li role="presentation"><a href="">Records</a></li>
    </ul>
    <p>&nbsp;</p>

    <table class="table table-responsive table-striped">
        @if($circuit->country)
            <tr>
                <td class="text-right"><strong>Pais: </strong></td>
                <td class="text-left">{{ $circuit->country }}</td>
            </tr>
        @endif
        @if($circuit->city)
             <tr>
                <td class="text-right"><strong>Ciudad: </strong></td>
                <td class="text-left">{{ $circuit->city }}</td>
             </tr>
        @endif
            @if($circuit->address)
                <tr>
                    <td class="text-right"><strong>Dirección: </strong></td>
                    <td class="text-left">{{ $circuit->address }}</td>
                </tr>
            @endif
            @if($circuit->url)
                <tr>
                    <td class="text-right"><strong>Url: </strong></td>
                    <td class="text-left"><a href="{{ $circuit->url }}" rel="nofollow">{{ $circuit->url }}</a></td>
                </tr>
            @endif
            @if($circuit->facebook)
                <tr>
                    <td class="text-right"><strong>Facebook: </strong></td>
                    <td class="text-left"><a href="{{ $circuit->facebook }}" rel="nofollow">{{ $circuit->facebook }}</a></td>
                </tr>
            @endif
            @if($circuit->email)
                <tr>
                    <td class="text-right"><strong>Email: </strong></td>
                    <td class="text-left"><a href="mailto:{{ $circuit->email }}" rel="nofollow">{{ $circuit->email }}</a></td>
                </tr>
            @endif
    </table>

    <h3>Datos técnicos de la trazada y el circuito</h3>
    <table class="table table-responsive table-striped">
            @if($circuit->length)
                <tr>
                    <td class="text-right"><strong>Longitud: </strong></td>
                    <td class="text-left">{{ $circuit->length }}</td>
                </tr>
            @endif
            @if($circuit->straight)
                <tr>
                    <td class="text-right"><strong>Longitud de la recta máxima: </strong></td>
                    <td class="text-left">{{ $circuit->straight }}</td>
                </tr>
            @endif
            @if($circuit->curves)
                <tr>
                    <td class="text-right"><strong>Trazada: </strong></td>
                    <td class="text-left">{{ $circuit->curves }}</td>
                </tr>
            @endif
            @if($circuit->width)
                <tr>
                    <td class="text-right"><strong>Anchura máxima: </strong></td>
                    <td class="text-left">{{ $circuit->width }}</td>
                </tr>
            @endif
            @if($circuit->slope)
                <tr>
                    <td class="text-right"><strong>Desnivel o pendiente máxima: </strong></td>
                    <td class="text-left">{{ $circuit->slope }}</td>
                </tr>
            @endif
            @if($circuit->capacity)
                <tr>
                    <td class="text-right"><strong>Capacidad de las gradas: </strong></td>
                    <td class="text-left">{{ $circuit->capacity }}</td>
                </tr>
            @endif
            @if($circuit->services)
                <tr>
                    <td class="text-right"><strong>Servicios: </strong></td>
                    <td class="text-left">{{ $circuit->services }}</td>
                </tr>
            @endif
    </table>
@endsection