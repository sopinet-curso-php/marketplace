<?php
require __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('twig');
$twig = new Twig_Environment($loader, array(
    'debug' => true
    )
);
$twig->addExtension(new Twig_Extension_Debug());

// Incluimos el fichero para la clase Trayecto
include 'Trayecto.php';

// Creamos un objeto de tipo Trayecto y lo asignamos a la variable trayecto1
$trayecto1 = new Trayecto();
// Rellenamos el objeto con una serie de datos
$trayecto1->llenarObjeto(
    "Antonio Pérez",
    "https://addons.cdn.mozilla.net/user-media/userpics/0/0/45.png?modified=1447324257",
    "Córdoba",
    "Huelva",
    "Calle Poeta Paredes, 25",
    1468713600,
    "9:00",
    "10€",
    "Un viaje entretenido y seguro, no me gusta correr. Además, pararemos a mitad de camino para tomar una rica tostada de sobraasada, y luego, directos a Huelva.",
    "3"
);

// Creamos un objeto de tipo Trayecto y lo asignamos a la variable trayecto2
$trayecto2 = new Trayecto();
// Rellenamos el objeto con una serie de datos
$trayecto2->llenarObjeto(
    "Antonio García",
    "http://megaforo.com/images/user4.png",
    "Sevilla",
    "Cádiz",
    "Ronda de Marrubial, 12",
    1468281600,
    "12:30",
    "6€",
    "¿Quieres un viaje de riesgo? Soy tu conductor. Comparte coche conmigo y vive una aventura que recordarás por los siglos de los siglos.",
    "2"
);

 // Creamos un objeto de tipo Trayecto y lo asignamos a la variable trayecto3
$trayecto3 = new Trayecto();
// Rellenamos el objeto con una serie de datos
$trayecto3->llenarObjeto(
    "Pedro Boniato",
    "http://gh.nsrrc.org.tw/Content/img/male05.png",
    "Córdoba",
    "Málaga",
    "Calle de la Glorieta, 11",
    1467331200,
    "10:30",
    "9€",
    "Salida de Córdoba a Málaga, por favor, confirmar lo antes posible ya que suele llenarse rápido el viaje. Posibilidad de seguir después de Málaga hasta Marbella que será mi destino final.",
    "4"
);

// Creamos una variable trayectos de tipo array, donde almacenaremos los 3 trayectos creados más arriba
$trayectos = array(
    $trayecto1,
    $trayecto2,
    $trayecto3
);

// Si no se indica un filtro para la fecha, se muestran todos los trayectos
if ($_GET["posted"] == "") {
    $trayectosFiltradosFecha = $trayectos;
// Si hay filtro de fecha se hace búsqueda    
} else {
    $trayectosFiltradosFecha = array();
    for ($i = 0; $i < count($trayectos); $i = $i + 1) {
        // Comienza nuestro bucle
            if ($trayectos[$i]->filtroFecha($_GET["posted"])) {
                $trayectosFiltradosFecha[$i] = $trayectos[$i];
            }
        // Termina nuestro bucle
    }
}

// Si no se indica filtro, se muestran todos los Trayectos
if ($_GET['country'] == "") {
    $trayectosFiltrados = $trayectosFiltradosFecha;
// Si se indica el filtro, se filtran los proyectos    
} else {
    $trayectosFiltrados = array();
    // Recorremos el array original trayectos para buscar los trayectos a filtrar
    for($i = 0; $i < count($trayectosFiltradosFecha); $i = $i + 1) {
        // Comienza nuestro bucle                
            if ($trayectosFiltradosFecha[$i]->buscar($_GET["country"])) {
                $trayectosFiltrados[] = $trayectosFiltradosFecha[$i];
            }
        // Termina nuestro bucle
    }
}

if ($_GET["page"] == "list") {
    echo $twig->render('list.html.twig', array(
            'year' => date('Y'),
            'country' => $_GET["country"],
            'posted' => $_GET["posted"],
            'trayectos' => $trayectosFiltrados
        )
    );
} else {
    echo $twig->render('index.html.twig', array(
        
    ));
}

?>