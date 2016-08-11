<?php
    require __DIR__ . "/../configuracion.php";
    
    $repositorioTrayecto=$entityManager->getRepository('Trayecto');
    $trayectos=$repositorioTrayecto->findAll();    
    
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
    
    echo $twig->render('list.html.twig', array(
            'year' => date('Y'),
            'country' => $_GET["country"],
            'posted' => $_GET["posted"],
            'trayectos' => $trayectosFiltrados
        )
    );
?>    