@extends('layouts.app')

@section('metadata')
    <title>{{ trans('menu.Update') }} {{ $track->name }}</title>
    <meta name="description" content="{{ trans('menu.Update') }} {{ $track->name }}" />
    <meta name="robots" content="noindex, nofollow" />
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="{{ route('home') }}">
                <span itemprop="title">{{  trans('menu.Home') }}</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ route("tracks") }}">
                <span itemprop="title">{{ trans('track.List of racing tracks') }}</span>
            </a>
        </li>

        <li>
            <a itemprop="url" href="{{ route('track.show', ['slug' => $track->slug]) }}">
                <span itemprop="title">{{ $track->name }}</span>
            </a>
        </li>
        <li>
            <a itemprop="url" href="{{ url()->current() }}">
                <span itemprop="title">{{ trans('menu.Update') }}</span>
            </a>
        </li>
    </ol>
@endsection

@section('content')
    <h2>{{ trans('menu.Edit') }} {{ $track->name }}</h2>
    <hr>

    <form role="form" class="form-horizontal" action="{{ route("track.update", ['track' => $track->id]) }}" method="POST">

        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name" class="col-md-4 control-label">{{ trans('menu.Name') }}</label>
            <div class="col-md-8">
                <input id="name" type="text" class="form-control" name="name" placeholder="Tsukuba" value="{{ old('name', $track->name) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="country_id" class="col-md-4 control-label">{{ trans('menu.Country') }}</label>
            <div class="col-md-8">
                <select id="country_id" type="text" class="form-control" name="country_id">
                    @foreach($countries as $country)
                        @if($country->id == $track->country_id)
                            <option selected value="{{ $country->id }}">{{ $country->name }}</option>
                        @else
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="city" class="col-md-4 control-label">{{ trans('menu.City') }}</label>
            <div class="col-md-8">
                <input id="city" type="text" class="form-control" name="city" placeholder="Madrid" value="{{ old('city', $track->city->name) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-md-4 control-label">{{ trans('menu.Address') }}</label>
            <div class="col-md-8">
                <input id="address" type="text" class="form-control" name="address" placeholder="Autovía A-1, km 28" value="{{ old('address', $track->address) }}">
            </div>
        </div>

        <h3 class="text-right">{{ trans('menu.Recommended fields') }}</h3>
        <hr>

        <div class="form-group">
            <label for="description" class="col-md-4 control-label">{{ trans('menu.Description') }}</label>
            <div class="col-md-8">
                <?php $description_field = App::getLocale() . "_description"; ?>
                <textarea id="description" type="text" class="form-control" rows="12" name="{{ $description_field }}">{{ old('description', $track->$description_field) }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="url" class="col-md-4 control-label">Url</label>
            <div class="col-md-8">
                <input id="url" type="text" class="form-control" name="url" placeholder="http://www.jarama.org/" value="{{ old('url', $track->url) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="facebook" class="col-md-4 control-label">Facebook</label>
            <div class="col-md-8">
                <input id="facebook" type="text" class="form-control" name="facebook" placeholder="https://www.facebook.com/JaramaRACE" value="{{ old('facebook', $track->facebook) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-md-4 control-label">{{ trans('menu.Email') }}</label>
            <div class="col-md-8">
                <input id="email" type="text" class="form-control" name="email" placeholder="example@example.org" value="{{ old('email', $track->email) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="length" class="col-md-4 control-label">{{ trans('track.Length') }}</label>
            <div class="col-md-8">
                <input id="length" type="text" class="form-control" name="length" placeholder="3850" value="{{ old('length', $track->length) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="straight" class="col-md-4 control-label">{{ trans('track.Straight') }}</label>
            <div class="col-md-8">
                <input id="straight" type="text" class="form-control" name="straight" placeholder="879" value="{{ old('straight', $track->straight) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="width" class="col-md-4 control-label">{{ trans('track.Width') }}</label>
            <div class="col-md-8">
                <input id="width" type="text" class="form-control" name="width" placeholder="9" value="{{ old('width', $track->width) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="slope" class="col-md-4 control-label">{{ trans('track.Slope') }}</label>
            <div class="col-md-8">
                <input id="slope" type="text" class="form-control" name="slope" placeholder="7.5" value="{{ old('slope', $track->slope) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="capacity" class="col-md-4 control-label">{{ trans('track.Capacity') }}</label>
            <div class="col-md-8">
                <input id="capacity" type="text" class="form-control" name="capacity" placeholder="80000" value="{{ old('capacity', $track->capacity) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="turns" class="col-md-4 control-label">{{ trans('track.Turns') }}</label>
            <div class="col-md-8">
                <input id="turns" type="text" class="form-control" name="turns" placeholder="14" value="{{ old('turns', $track->turns) }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-save"></i>&nbsp; {{ trans('menu.Update') }} {{ trans('menu.Track') }}
                </button>
            </div>
        </div>

    </form>

@endsection