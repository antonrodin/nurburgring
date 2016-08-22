 <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url("circuit") }}">Circuitos</a></li>
                    <li><a href="{{ url("record") }}">Records</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                <?php if (Auth::check()) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>&nbsp; {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url("#") }}"><i class="fa fa-gear"></i>&nbsp; Cambiar contraseña</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url("logout") }}"><i class="fa fa-power-off"></i>&nbsp; Cerrar sessión</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li><a href="{{ url("login") }}"><i class="fa fa-user"></i>&nbsp; Iniciar sessión</a></li>
                    <li><a href="{{ url("register") }}"><i class="fa fa-user-plus"></i>&nbsp; Registrarse</a></li>
                <?php } ?>
                </ul>

            </div>
        </div>
 </nav>