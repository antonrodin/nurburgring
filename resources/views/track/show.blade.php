@extends('layouts.app')

<?php $name_field = "{$locale}_name"; ?>
<?php $desc_field = "{$locale}_description"; ?>

@section('metadata')
    <title>{{ $track->$name_field }} </title>
    <meta name="description" content="{{ $track->$name_field }}" />
    <meta name="robots" content="all" />

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $track->$name_field }}" />
    <meta property="og:description" content="{{ $track->$name_field }}" />
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
            <a itemprop="url" href="{{ route('tracks') }}">
                <span itemprop="title">{{ trans('track.List of racing tracks') }}</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">{{ $track->$name_field }}</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-8 col-sm-12">
            <h1>{{ $track->$name_field }}</h1>
            <p>
                <?php $description = App::getLocale() . "_description"; ?>
                {{ strip_tags(str_limit($track->$desc_field, 150)) }}
            </p>
            <a class="btn btn-sm btn-warning" href="{{ route("track.edit", ['id' => $track->id]) }}"><i class="fa fa-edit"></i> Edit</a>
        </div>
        <div class="col-md-4 col-sm-12">
            <a href="#" class="img-thumbnail">
                <img class="img-responsive" src="holder.js/200x200">
            </a>
        </div>
    </div>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{ url("circuit/{$track->slug}") }}">{{ trans('menu.Information') }}</a></li>
        <li role="presentation"><a href="#") }}">{{ trans('menu.Description') }}</a></li>
        <li role="presentation"><a href="#">{{ trans('menu.Records') }}</a></li>
    </ul>
    <p>&nbsp;</p>

    <table class="table table-responsive table-striped">
        @if($track->country)
            <tr>
                <td class="text-right"><strong>{{ trans('menu.Country') }}: </strong></td>
                <td class="text-left">{{ $track->country->$name_field }}</td>
            </tr>
        @endif
        @if($track->city)
             <tr>
                <td class="text-right"><strong>{{ trans('menu.City') }}: </strong></td>
                <td class="text-left">{{ $track->city->$name_field }}</td>
             </tr>
        @endif
            @if($track->address)
                <tr>
                    <td class="text-right"><strong>{{ trans('menu.Address') }}: </strong></td>
                    <td class="text-left">{{ $track->address }}</td>
                </tr>
            @endif
            @if($track->url)
                <tr>
                    <td class="text-right"><strong>Url: </strong></td>
                    <td class="text-left"><a href="{{ $track->url }}" rel="nofollow">{{ $track->url }}</a></td>
                </tr>
            @endif
            @if($track->facebook)
                <tr>
                    <td class="text-right"><strong>Facebook: </strong></td>
                    <td class="text-left"><a href="{{ $track->facebook }}" rel="nofollow">{{ $track->facebook }}</a></td>
                </tr>
            @endif
            @if($track->email)
                <tr>
                    <td class="text-right"><strong>{{ trans('menu.Email') }}: </strong></td>
                    <td class="text-left"><a href="mailto:{{ $track->email }}" rel="nofollow">{{ $track->email }}</a></td>
                </tr>
            @endif
    </table>

    <h3>{{ trans('track.Track data') }}: </h3>
    <hr>
    <table class="table table-responsive table-striped">
        <tr>
            <td class="text-right"><strong>{{ trans('track.Length') }}: </strong></td>
            <td class="text-left">{{ $track->length }}</td>
            <td class="text-right"><strong>{{ trans('track.Straight') }}: </strong></td>
            <td class="text-left">{{ $track->straight }}</td>
        </tr>
        <tr>
            <td class="text-right"><strong>{{ trans('track.Turns') }}: </strong></td>
            <td class="text-left">{{ $track->turns }}</td>
            <td class="text-right"><strong>{{ trans('track.Width') }}: </strong></td>
            <td class="text-left">{{ $track->width }}</td>
        </tr>
        <tr>
            <td class="text-right"><strong>{{ trans('track.Slope') }}: </strong></td>
            <td class="text-left">{{ $track->slope }}</td>
            <td class="text-right"><strong>{{ trans('track.Capacity') }}: </strong></td>
            <td class="text-left">{{ $track->capacity }}</td>
        </tr>
    </table>
@endsection