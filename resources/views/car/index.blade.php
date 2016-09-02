@extends('layouts.app')

@section('metadata')
    <title>{{ trans('car.List of cars') }}</title>
    <meta name="description" content="{{ trans('car.List of cars') }}" />
    <meta name="robots" content="all" />

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ trans('car.List of cars') }}" />
    <meta property="og:description" content="{{ trans('car.List of cars') }}" />
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
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">{{ trans('car.List of cars') }}</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <h1>{{ trans('car.List of racing cars') }}</h1>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{ route("cars") }}">{{ trans('menu.List') }}</a></li>
        <li role="presentation"><a href="{{ route("car.create") }}">{{ trans('menu.Add') }}</a></li>
    </ul>
    <p>&nbsp;</p>
    <table class="table table-responsive table-striped">
        @foreach($cars as $car)
            <tr>
                <td>
                    <a href="{{ route('car.show', ['slug' => $car->slug]) }}" class="img-thumbnail" href="#">
                        <img width="200" height="150" src="holder.js/200x150" data-original="holder.js/200x150">
                    </a>
                </td>
                <td>
                    <a href="{{ route('car.show', ['slug' => $car->slug]) }}"><h2>{{ $car->brand }} {{ $car->model }}</h2></a>
                    <p>
                        {{ strip_tags(str_limit($car->description, 150)) }}
                    </p>
                    <a class="btn btn-sm btn-warning" href="{{ route("car.edit", ['id' => $car->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection