@extends('layouts.app')

<?php
    $name_field = "{$locale}_name";
?>

@section('metadata')
    <title>{{ trans('record.Tiempos de Nürburgring, los mejores records. Coche  en Infierno Verde') }}</title>
    <meta name="description" content="{{ trans('record.Los mejores tiempos de Nürburgring de superdeportivos, compactos, berlinas. Records de coches Volkswagen, Porsche, Ferrari, Nissan, Opel, Renault. Coches en Infierno Verde') }}" />
    <meta name="robots" content="all" />

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ trans('record.New lap times') }}" />
    <meta property="og:description" content="{{ trans('record.New lap times') }}" />
    <meta property="og:image" content="{{ asset("img/cn-logo.png") }}" />
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="{{ route('home') }}">
                <span itemprop="title">{{ trans('menu.Home') }}</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ route('track.show', ['slug' => $track->slug]) }}">
                <span itemprop="title">{{ $track->$name_field }}</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">{{ trans('menu.Records') }}</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <h1>{{ trans('record.Todos los tiempos de Nürburgring') }}</h1>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{ route("records") }}">{{ trans('menu.List') }}</a></li>
        <li role="presentation"><a href="{{ route("record.create") }}">{{ trans('menu.Add') }}</a></li>
    </ul>
    <p>&nbsp;</p>
    <table class="table table-responsive table-striped">
        @foreach($records as $record)
            <tr>
                <td>
                    <a href="{{ route('record.show', ['slug' => $record->slug]) }}" class="img-thumbnail" href="#">
                        <img width="200" height="150" src="holder.js/200x150" data-original="holder.js/200x150">
                    </a>
                </td>
                <td>
                    <h2><a href="{{ route('record.show', ['slug' => $record->slug]) }}">{{ $record->car->brand }} {{ $record->car->model }} {{ $record->track->en_name }}</a></h2>
                    <a class="btn btn-sm btn-warning" href="{{ route("record.edit", ['id' => $record->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection