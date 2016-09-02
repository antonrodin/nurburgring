@extends('layouts.app')

@section('metadata')
    <title>{{ trans('driver.List of drivers') }}</title>
    <meta name="description" content="{{ trans('driver.List of drivers') }}" />
    <meta name="robots" content="all" />

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ trans('driver.List of drivers') }}" />
    <meta property="og:description" content="{{ trans('driver.List of drivers') }}" />
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
                <span itemprop="title">{{ trans('driver.List of drivers') }}</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <h1>{{ trans('driver.List of racing drivers') }}</h1>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{ route("drivers") }}">{{ trans('menu.List') }}</a></li>
        <li role="presentation"><a href="{{ route("driver.create") }}">{{ trans('menu.Add') }}</a></li>
    </ul>
    <p>&nbsp;</p>
    <table class="table table-responsive table-striped">
        @foreach($drivers as $driver)
            <?php $name_field = "{$locale}_name"; ?>
            <tr>
                <td>
                    <a href="{{ route('driver.show', ['slug' => $driver->slug]) }}" class="img-thumbnail" href="#">
                        <img width="200" height="150" src="holder.js/200x150" data-original="holder.js/200x150">
                    </a>
                </td>
                <td>
                    <a href="{{ route('driver.show', ['slug' => $driver->slug]) }}"><h2>{{ $driver->$name_field }}</h2></a>
                    <p>
                        {{ strip_tags(str_limit($driver->description, 150)) }}
                    </p>
                    <a class="btn btn-sm btn-default" href="#"><i class="fa fa-tag"></i> Lista de Records</a>
                    <a class="btn btn-sm btn-warning" href="{{ route("driver.edit", ['id' => $driver->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection