<?php
require __DIR__ . "/configuracion.php";

$repositorioTrayecto=$entityManager->getRepository('Trayecto');
$trayectos=$repositorioTrayecto->findAll();
if($trayectos==null){
    // Creamos los datos de las personas en la base de datos
    // Creamos un objeto de tipo Persona y lo asignamos a la variable persona1
    $persona1 = new Persona();
    $persona1->setNombre("Antonio Pérez");
    $persona1->setAvatar("https://addons.cdn.mozilla.net/user-media/userpics/0/0/45.png?modified=1447324257");
    $entityManager->persist($persona1);
    // Creamos un objeto de tipo Persona y lo asignamos a la variable persona2
    $persona2 = new Persona();
    $persona2->setNombre("Antonio García");
    $persona2->setAvatar("http://megaforo.com/images/user4.png");
    $entityManager->persist($persona2);
    // Creamos un objeto de tipo Persona y lo asignamos a la variable persona2
    $persona3 = new Persona();
    $persona3->setNombre("Pedro Boniato");
    $persona3->setAvatar("http://gh.nsrrc.org.tw/Content/img/male05.png");
    $entityManager->persist($persona3);
    $entityManager->flush();
    
    // Creamos un objeto de tipo Trayecto y lo asignamos a la variable trayecto1
    $trayecto1 = new Trayecto();
    // Rellenamos el objeto con una serie de datos
    $trayecto1->llenarObjeto(
        $persona1,
        "Córdoba",
        "Huelva",
        "Calle Poeta Paredes, 25",
        1468713600,
        new DateTime('2016-07-17 12:00'),
        10,
        "Un viaje entretenido y seguro, no me gusta correr. Además, pararemos a mitad de camino para tomar una rica tostada de sobraasada, y luego, directos a Huelva.",
        "3"
    );
    $persona1->addTrayecto($trayecto1);
    $entityManager->persist($persona1);
    $entityManager->persist($trayecto1);
    // Creamos un objeto de tipo Trayecto y lo asignamos a la variable trayecto2
    $trayecto2 = new Trayecto();
    // Rellenamos el objeto con una serie de datos
    $trayecto2->llenarObjeto(
        $persona2,
        "Sevilla",
        "Cádiz",
        "Ronda de Marrubial, 12",
        1468281600,
        new DateTime('2016-07-12 12:00:00'),
        6,
        "¿Quieres un viaje de riesgo? Soy tu conductor. Comparte coche conmigo y vive una aventura que recordarás por los siglos de los siglos.",
        "2"
    );
    $persona2->addTrayecto($trayecto2);
    $entityManager->persist($persona2);
    $entityManager->persist($trayecto2);
    // Creamos un objeto de tipo Trayecto y lo asignamos a la variable trayecto3
    $trayecto3 = new Trayecto();
    // Rellenamos el objeto con una serie de datos
    $trayecto3->llenarObjeto(
        $persona3,
        "Córdoba",
        "Málaga",
        "Calle de la Glorieta, 11",
        1467331200,
        new DateTime('2016-07-1 10:30:00'),
        9,
        "Salida de Córdoba a Málaga, por favor, confirmar lo antes posible ya que suele llenarse rápido el viaje. Posibilidad de seguir después de Málaga hasta Marbella que será mi destino final.",
        "4"
    );
    $persona3->addTrayecto($trayecto3);
    $entityManager->persist($persona3);
    $entityManager->persist($trayecto3);
    $entityManager->flush();
    $trayectos = array($trayecto1,$trayecto2,$trayecto3);
}

// Si no se indica un filtro para la fecha, se muestran todos los trayectos
if ($_GET["posted"] != "" || $_GET['country'] != "") {
    $parameters=array();
    $queryBuilder = $repositorioTrayecto
        ->createQueryBuilder('trayecto');
    if ($_GET["country"]!="") {
        $queryBuilder->where('trayecto.origen = :country')
        ->orWhere('trayecto.destino = :country');
        $parameters['country']=$_GET["country"];
    }   
    if($_GET["posted"] != ""){
        if ($_GET["country"]!="") {
            $queryBuilder->andWhere('trayecto.fechaPublicacion > :posted');
        } 
        else {
            $queryBuilder->where('trayecto.fechaPublicacion > :posted');
        } 
        $date=new DateTime();
        $date->modify('-'.$_GET["posted"].' day');
        $parameters['posted']=$date;
    }
    $trayectosFiltrados =$queryBuilder->setParameters($parameters)
    ->getQuery()->execute();
} else {
    $trayectosFiltrados = $trayectos;
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
         'year' => date('Y'),
    ));
}

?>