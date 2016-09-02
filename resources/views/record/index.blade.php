@extends('layouts.app')

@section('metadata')
    <title>{{ trans('record.New lap times') }}</title>
    <meta name="description" content="{{ trans('record.New lap times') }}" />
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
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">{{ trans('record.New lap times') }}</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <?php $desc_field = "{$locale}_description"; ?>
    <h1>{{ trans('record.List of racing records') }}</h1>

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

    {{ $records->links() }}
@endsection