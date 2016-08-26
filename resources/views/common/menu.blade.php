<nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url("{$locale}/tracks") }}">{{ trans('menu.Tracks') }}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ trans('menu.Language') }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('change_locale', ['locale' => 'es']) }}"> {{ trans('menu.Spanish') }}</a></li>
                            <li><a href="{{ route('change_locale', ['locale' => 'en']) }}"> {{ trans('menu.English') }}</a></li>
                            <li><a href="{{ route('change_locale', ['locale' => 'ru']) }}"> {{ trans('menu.Russian') }}</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                <?php if (Auth::check()) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>&nbsp; {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url("logout") }}"><i class="fa fa-power-off"></i>&nbsp; {{ trans('menu.Sign Out') }}</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li><a href="{{ url("login") }}"><i class="fa fa-user"></i>&nbsp; {{ trans('menu.Login') }}</a></li>
                    <li><a href="{{ url("register") }}"><i class="fa fa-user-plus"></i>&nbsp; {{ trans('menu.Sign In') }}</a></li>
                <?php } ?>
                </ul>

            </div>
        </div>
 </nav>