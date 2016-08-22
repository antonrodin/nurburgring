@extends('layouts.app')

@section('metadata')
    <title>Lista de circuitos</title>
    <meta name="description" content="Lista de circuitos de competición" />
    <meta name="robots" content="all" />

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Lista de circuitos" />
    <meta property="og:description" content="Lista de circuitos" />
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
                <span itemprop="title">Lista de circuitos</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <h1>Lista de circuitos</h1>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{ url('circuit') }}">Lista</a></li>
        <li role="presentation"><a href="{{ url('circuit/create') }}">Añadir un circuito</a></li>
    </ul>
    <p>&nbsp;</p>
    <table class="table table-responsive table-striped">
        @foreach($circuits as $circuit)
            <tr>
                <td>
                    <a class="img-thumbnail" href="{{ url("circuit/{$circuit->slug}") }}">
                        <img width="200" height="150" src="holder.js/200x150" data-original="holder.js/200x150">
                    </a>
                </td>
                <td>
                    <a href="{{ url("circuit/{$circuit->slug}") }}"><h2>{{ $circuit->name }}</h2></a>
                    <p>
                        {{ strip_tags(str_limit($circuit->description, 150)) }}
                    </p>
                    <a class="btn btn-sm btn-default" href="#"><i class="fa fa-tag"></i> Lista de Records</a>
                    <a class="btn btn-sm btn-warning" href="{{ url("circuit/{$circuit->id}/edit") }}"><i class="fa fa-edit"></i> Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection