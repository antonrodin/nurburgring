@extends('layouts.app')

@section('metadata')
    <title>{{ trans('track.List of racing tracks') }}</title>
    <meta name="description" content="{{ trans('track.List of racing tracks') }}" />
    <meta name="robots" content="all" />

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ trans('track.List of racing tracks') }}" />
    <meta property="og:description" content="{{ trans('track.List of racing tracks') }}" />
    <meta property="og:image" content="{{ asset("img/cn-logo.png") }}" />
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="{{ route('portada') }}">
                <span itemprop="title">{{ trans('menu.Home') }}</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">{{ trans('track.List of racing tracks') }}</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <h1>{{ trans('track.List of racing tracks') }}</h1>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{ route("tracks") }}">{{ trans('menu.List') }}</a></li>
        <li role="presentation"><a href="{{ route("track.create") }}">{{ trans('menu.Add') }}</a></li>
    </ul>
    <p>&nbsp;</p>
    <table class="table table-responsive table-striped">
        @foreach($tracks as $track)
            <tr>
                <td>
                    <a class="img-thumbnail" href="#">
                        <img width="200" height="150" src="holder.js/200x150" data-original="holder.js/200x150">
                    </a>
                </td>
                <td>
                    <a href="#") }}"><h2>{{ $track->name }}</h2></a>
                    <p>
                        {{ $track->city->name }} (<strong>{{ $track->country->name }})</strong>,
                        {{ $track->address }}<br>
                        {{ trans('track.Length') }}: <strong>{{ $track->length }}</strong>
                    </p>
                    <p>
                        {{ strip_tags(str_limit($track->description, 150)) }}
                    </p>
                    <a class="btn btn-sm btn-default" href="#"><i class="fa fa-tag"></i> Lista de Records</a>
                    <a class="btn btn-sm btn-warning" href="{{ route("track.edit", ['id' => $track->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection