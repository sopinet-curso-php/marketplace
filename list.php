<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <title>Comparte Tu Coche - Bienvenido a la plataforma de compartir coche</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- styles needed for carousel slider -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- include pace script for automatic web page progress bar  -->

    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script src="assets/js/pace.min.js"></script>
</head>

<?php
                /**
                 * Ejemplo 1: Array de objetos
                 * Declara un Array de objetos, lo inicializa y lo immprime por pantalla.
                 ***************************************************************************
                 
                class TrayectoSimple {
                    var $origen;
                    var $destino;
                    
                    function dimeElTrayecto() {
                        return $this->origen . " a " . $this->destino;
                    }
                }
                
                $b = new TrayectoSimple();
                $b->origen = "Huelva";
                $b->destino = "Córdoba";
                
                $a = array();
                $a[0] = $b;
                $a[1] = $b;
                
                echo '<pre>';
                var_dump($a);
                echo '</pre>';
                
                die($b->dimeElTrayecto());
                **/
                
                


                /** 
                 * Ejemplo 2: Array bidimensional de enteros
                 * Declara un Array bidimensional de eneteros, lo inicializa y lo imprime por pantalla.
                 * ************************************************************************************
                 
                $a = array(
                    array(15,12,7,123,12,32,23,4), // Fila 0
                    array(103,189,190,6,5,3,12,32), // Fila 1
                    array(89,45,23,0,-12,23,12,12), // Fila 2
                    array(1,3,4,5,7,9,0,1), // Fila 3
                    array(9,30,1,0,90,09,01,12) // Fila 4
                );
                
                // Recorre las filas
                for ($i = 0; $i < count($a); $i++) {
                    $b = $a[$i]; // Asignar una nueva variable a una fila de la tabla
                    
                    // Recorre las columnas por cada fila
                    for($j = 0; $j < count($b); $j++) {
                        
                        if ($b[$j] == 1) {
                            echo '<b>' . $b[$j] . '</b>';
                        } else {
                            echo $b[$j];
                        }
                        
                        echo ", ";
                    }
                    
                    echo '<br/>';
                }
                **/   
?>

<body>
<div id="wrapper">
    <div class="header">
        <nav class="navbar   navbar-site navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                    <a href="index.html" class="navbar-brand logo logo-title">
                        <!-- Original Logo will be placed here  -->
                        <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span>
                        COMPARTE<span> TU COCHE </span> </a></div>

                <!--/.nav-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <!-- /.header -->

    <div class="search-row-wrapper"
         style="background-image: url(images/jobs/ibg.jpg); background-size: cover; background-position: center center;">
        <div class="container text-center">
            <form name="filter" action="list.php" method="GET">
                <input type="hidden" name="posted" value="<?php echo $_GET["posted"];?>"/>
                <div class="col-sm-3 col-sm-offset-3">
                    <select class="form-control" name="country" id="country">
                        <option <?php if ($_GET["country"] == "") { ?> selected="selected" <?php } ?>value="">Todas las localidades</option>
                        <option <?php if ($_GET["country"] == "Huelva") { ?> selected="selected" <?php } ?>value="Huelva">Huelva</option>
                        <option <?php if ($_GET["country"] == "Córdoba") { ?> selected="selected" <?php } ?>value="Córdoba">Cordoba</option>
                        <option <?php if ($_GET["country"] == "Sevilla") { ?> selected="selected" <?php } ?>value="Sevilla">Sevilla</option>
                    </select>    
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block btn-primary"> Buscar trayectos <i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>    

    <div class="main-container inner-page">
        <div class="container">
            <div class="row clearfix">
<!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-sm-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <form name="filtros" method="GET" action="list.php">
                            <input type="hidden" name="country" value="<?php echo $_GET["country"];?>"/>
                            <div class="inner-box">
                                <div class=" list-filter">
                                    <h5 class="list-title"><strong><a href="#"> Fecha de publicación </a></strong></h5>
    
                                    <div class="filter-date filter-content">
                                        <ul>
                                            <li>
                                                <input type="radio" <?php if ($_GET["posted"] == "" || $_GET["posted"] == 0) { ?> checked="checked" <?php } ?>value="0" id="posted_0" name="posted">
                                                <label for="posted_0">Todos</label>
                                            </li>
                                            <li>
                                                <input type="radio" <?php if ($_GET["posted"] == "1") { ?> checked="checked" <?php } ?>value="1" id="posted_1" name="posted">
                                                <label for="posted_1">24 horas</label>
                                            </li>
                                            <li>
                                                <input type="radio" <?php if ($_GET["posted"] == "3") { ?> checked="checked" <?php } ?>value="3" id="posted_3" name="posted">
                                                <label for="posted_3">3 días</label>
                                            </li>
                                            <li>
                                                <input type="radio" <?php if ($_GET["posted"] == "7") { ?> checked="checked" <?php } ?>value="7" id="posted_7" name="posted">
                                                <label for="posted_7">7 días</label>
                                            </li>
                                            <li>
                                                <input type="radio" <?php if ($_GET["posted"] == "30") { ?> checked="checked" <?php } ?>value="30" id="posted_30"
                                                       name="posted">
                                                <label for="posted_30">30 días</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/.categories-list-->
                            </div>
                            <input type="submit" class="btn btn-primary btn-block button" value="Filtrar"/>
                        </form>
                    </aside>
                </div>
                
<?php
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
                    
                ?>
                
                <!--/.page-side-bar-->
                <div class="col-sm-9 page-content col-thin-left">
                    <div class="category-list">
                        <div class="tab-box clearfix ">

                            <!-- Nav tabs -->
                            <div class="col-lg-12  box-title no-border">
                                <div class="inner">
                                    <h2><span> Trayectos </span> publicados
                                        <small> <?php echo count($trayectosFiltrados);?> resultado encontrado</small>


                                    </h2>
                                </div>
                            </div>
                            
                        <div class="adds-wrapper jobs-list">
                            <?php
                                for ($i = 0; $i < count($trayectosFiltrados); $i++) {
                            ?>                            
                            <div class="item-list job-item">


                                <div class="col-sm-1  col-xs-2 no-padding photobox">
                                    <div class="add-image"><a href=""><img class="thumbnail no-margin"
                                                                           src="<?php echo $trayectosFiltrados[$i]->avatar;?>"
                                                                           alt="Avatar de <?php echo $trayectosFiltrados[$i]->conductor;?>"></a></div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-sm-10  col-xs-10  add-desc-box">
                                    <div class="add-details jobs-item">
                                        <h5 class="company-title"><a href=""><?php echo $trayectosFiltrados[$i]->conductor;?></a></h5>
                                        <h4 class="job-title"><a href="job-details.html"> <?php echo $trayectosFiltrados[$i]->origen;?> a <?php echo $trayectosFiltrados[$i]->destino;?> </a></h4>
                                        <span class="info-row">
                                            <span class="item-location"><i class="fa fa-map-marker"></i> <?php echo $trayectosFiltrados[$i]->calle;?> </span> 
                                            <span class="date"><i class=" icon-clock"> </i><?php echo $trayectosFiltrados[$i]->hora;?></span>
                                            <span class="salary"><i class=" icon-money"> </i> <?php echo $trayectosFiltrados[$i]->precio;?></span>
                                            <span class="date"><i class="icon-calendar"> </i> <?php echo $trayectosFiltrados[$i]->getFechaPublicacion();?></span>
                                        </span>

                                        <div class="jobs-desc">
                                            <?php
                                                echo $trayectosFiltrados[$i]->getDescripcionCorta();
                                            ?>
                                        </div>


                                        <div class="job-actions">
                                            <ul class="list-unstyled list-inline">
                                                <li>
                                                    <span class="save-job">
                                                        <span class="fa fa-users"></span>
                                                        <?php echo $trayectosFiltrados[$i]->plazas;?> plazas
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>
                                <!--/.add-desc-box-->

                                <!--/.add-desc-box-->
                            </div>
                            <!--/.job-item-->
                            <?php
                                }
                            ?>                            
                        </div>
                    </div>    
                </div>    
                
                
            </div>
        </div>
    </div>    
    
    <?php
        $year = date("Y");
    ?>     
        
    <div class="footer" id="footer">
        <div class="container">
            <ul class=" pull-right navbar-link footer-nav">
                <li> &copy; <?php echo $year;?> - development by Sopinet Software</li>
            </ul>
        </div>
    </div>
    <!-- /.footer -->
</div>
<!-- /.wrapper -->

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<!-- include carousel slider plugin  -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- include form-validation plugin || add this script where you need validation   -->
<script src="assets/js/form-validation.js"></script>


<!-- include equal height plugin  -->
<script src="assets/js/jquery.matchHeight-min.js"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="assets/js/hideMaxListItem.js"></script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>
</body>
</html>