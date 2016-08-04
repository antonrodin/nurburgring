@extends('layouts.app')

@section('sidebar')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-page" data-href="https://www.facebook.com/circuitodenurburgring" data-tabs="timeline" data-width="600" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/circuitodenurburgring"><a href="https://www.facebook.com/circuitodenurburgring">Facebook</a></blockquote></div></div>
@endsection

@section('content')
    <h1>Tributo al circuito de Nürburgring Nordschleife</h1>
    <p><b>Nürburgring</b> es un circuito que se encuentra en Alemania,
        alrededor de un castillo medieval de Nurburgo en las montanas de Eifel.
        Es considerado como el circuito mas dificil y agotador del mundo se le conoce tambien como
        <b>Grune Holle</b> o el <b>Infierno verde</b>, apodo que le dio el piloto de Formula 1 Jackie Stewart.
    </p>

    <p>
        <img class="img-responsive img-thumbnail" src="{{ asset("img/1321897456-lexus-lfa-edicion-nurburgring-2010-2.jpg") }}" alt="LFA Nürburgring Especial Edition">
    </p>
    <p>
        <b>Lexus LFA Nürburgring Especial Edition</b>, pilotado por <a href="http://en.wikipedia.org/wiki/Akira_Iida">Akira Lida.</a></p>

    <p>
        La longitud del circuito de Nurburgring son 20.6 kilometros.
        Aunque no siempre era esa la longitud, segun pasaban los años se ha modificado para adaptarse a
        nuevos retos y nuevas competiciones, podeis echar un ojo a la
        <a href="{{ route("historia") }}" title="historia del circuito"><b>historia del circuito</b></a>
        para seguir sus modificaciones a lo largo de los años.
        Tiene 33 giros a la izquierda y 40 a la derecha. Algunas de las curvas son ciegas,
        otras tienen peralte como de un circuito de velocidad, continuas subidas y bajadas.
        Esto unido a unas condiciones meteorologicas adversas, una <a href="{{ route("historia") }}" title="historia del circuito"><b>historia</b></a> de unos 80 años
        y la posibilidad de disfrutarlo por todo el mundo, pagando una entrada al mismo...
        hacen que a este circuito venga gente de todo el mundo con sus coches para disfrutar de la velocidad y
        las emociones fuertes.
    </p>

    <h3>Südschleife y Nordschleife.</h3>
    <p>
        Realmente el circuito tiene dos zonas. Südschleife es una zona mas corta,
        orientada a realizar diferentes competiciones, es el actual circuito donde se corre la Formula 1.
        La parte norte o Nordschleife es la que esta destinada al publico en general
        que quiera probar las emociones fuertes. Ahi se realizan pruebas o test de coches,
        aparte del uso "turistico", aunque tambien se realizan competiciones como las
        <b>24 horas de Nürburgring</b>.
    </p>

    <h3>Pruebas de vehiculos en Nürburgring</h3>
    <p>
        Ademas es bastante normal ver las novedades del motor, que aun no han salido a la venta, camufladas y sin camuflaje en este circuito. Casi todas las marcas Alemanas lo utilizan un poco como referencia, para hacer ajustes en sus coches, probarlos y quizas ensenar al publico. De hecho hay puestos fijos de fotografia, como por ejemplo <b>Kgp photography</b> que estan dia y noche ahi, haciendo fotos a los coches del circuito. Despues estas fotos recorren todas las revistas del mundo, sean online o en papel.
    </p>

    <p>
        Aparte las marcas de General Motors comunican en sus boletines oficiales el resultado de las
        pruebas de sus coches, adjuntando el tiempo empleado en recorrer el circuito.
        De hecho Opel tiene una version de <b>Astra GTC OPC</b>
        que se denomina Nürburgring.
        Tambien marcas como Jaguar, Nissan, Mercedes, Subaru suelen probar sus coches ahi.
        Ahora mismo recuero muchisimos casos de coches cazados ahi... BMW serie 1 coupe,
        Nissan Skyline GT-R, BMW serie 7 nuevo, cada semana cazan alguno...
    </p>
@endsection
