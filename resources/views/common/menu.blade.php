 <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route("portada") }}">Portada</a></li>
                    <li><a href="{{ route("tiempos") }}">Tiempos del circuito</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Información <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route("historia") }}">Historia</a></li>
                            <li><a href="{{ route("webcam") }}">Webcam Nürburgring</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route("contacto") }}">Contacto</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>

            </div>
        </div>
 </nav>