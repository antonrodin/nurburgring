<?php $locale = App::getLocale() ?>
<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('metadata')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}" >
    <link rel="stylesheet" href="{{ asset("css/main.css") }}" >

    <link rel="shortcut icon" href="{{ asset("img/ico/favicon.ico") }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset("img/ico/apple-touch-icon.png") }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset("img/ico/apple-touch-icon-57x57.png") }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset("img/ico/apple-touch-icon-72x72.png") }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("img/ico/apple-touch-icon-76x76.png") }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset("img/ico/apple-touch-icon-114x114.png") }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset("img/ico/apple-touch-icon-120x120.png") }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset("img/ico/apple-touch-icon-144x144.png") }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset("img/ico/apple-touch-icon-152x152.png") }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("img/ico/apple-touch-icon-180x180.png") }}" />

    <!-- Google Analytic Script -->
    <script>

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-72022125-1', 'auto');
        ga('send', 'pageview');

    </script>

</head>
<body>

    <?php if (!session()->get('acepto_cookies')) { ?>
    <div id="pts-cookies-esconder" class='container-fluid background-cookies'>
        <div id="pts-cookies" class="container">
            <p>
                {!! trans('menu.Cookies Message') !!}
                <button id="esconder" type="button" class="btn btn-success btn-xs pull-right">{{ trans('menu.Accept') }}</button>
            </p>
        </div>
    </div>
    <?php } ?>

    @if(App::environment() == 'development')
    <div class="container">
        <pre>
            Locale: {{ App::getLocale() }}
            Last route: {{ session()->get('last_route') }}
            Forever Locale: {{ session()->get('forever_locale') }}
            Cookies: {{ session()->get('acepto_cookies') }}
        </pre>
    </div>
    @endif

    <div class="container">
        @include('common/header')
    </div>

    <div class="container">
        @include('common/menu')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                    @yield('breadcrumbs')
                    @include('common/messages')
                    @yield('content')
                <p class="clearfix">&nbsp;</p>
            </div>
            <div class="col-md-4 col-sm-12">
                <aside>
                    @include('common/sidebar')
                </aside>
            </div>
        </div>

    </div>

    <div id="footer" class="container-fluid">
        <div class="container">
            @include('common/footer')
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/jquery.lazyload.min.js") }}" ></script>
    <script src="{{ asset("js/holder.min.js") }}" ></script>

    <script>
        $("img.lazy").lazyload({
            threshold : 200
        });
        $( "#esconder" ).click(function() {
            $("#pts-cookies-esconder").hide();
        });
    </script>

</body>
</html>
