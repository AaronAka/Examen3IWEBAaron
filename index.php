<?php
    session_start();
    $res = file_get_contents("https://examen3aaroniweb.herokuapp.com/");
    $dataUsers = json_decode($res);
    $filtro = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $filtro = $_POST['filtro'];
        
        if ($filtro != "")
        {
        ?> <h2>Busqueda: <?php echo $filtro ?></h2> <?php
        }
    }

    $url = "https://examen3aaroniweb.herokuapp.com/articulos/filtro/";
    $url = $url . $filtro;
    $resArticulos = file_get_contents($url);
    $dataArticulos = json_decode($resArticulos);
    

    if(isset($_SESSION['server_msg'])){
        echo $_SESSION['server_msg'];
        unset($_SESSION['server_msg']);
    }
    error_reporting(E_ERROR | E_PARSE);

    if(isset($_SESSION['usuario']) && isset($_SESSION['google_login'])){
        $email = $_SESSION['usuario']['email'];

        // Compruebo si el email existe en la BD
        $data = file_get_contents("https://examen3aaroniweb.herokuapp.com/findUserByEmail/" . $email);
        $user = json_decode($data);

        // Si existe -> me traigo su información y lo guardo
        if (!empty($user->data->usuarios)){
            unset($_SESSION['google_login']);
            unset($user->data->usuarios[0]->password);
            $_SESSION['usuario'] = $user->data->usuarios[0]; 
        }else{
        // Si no existe -> lo inserto en la BD e inicializo sus valores
            header('Location: /funciones/nuevo_usuario.php');
        }
    }


    var_dump($_SESSION);
    ?>
   
    <form action="./articulos/subir_articulo.php" method="GET">
        <input type="hidden" value="<?php echo $_SESSION['usuario']->_id ?>" name="id">
        <input type="submit" value="Subir Articulo">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th></th>

        </tr>
            <?php 
                foreach ($dataArticulos->data->articulos as $articulo){?>                
                    <tr>
                        <!-- <td><img src="<?php echo $imagen->imagen; ?>" width="400" height="500"></td> -->
                        <td><?php echo $articulo->_id; ?></td>
                        <td><?php echo $articulo->descripcion; ?></td>
                        <td><?php echo $articulo->precio_salida; ?></td>
                        <?php if($_SESSION['usuario']->_id == $articulo->vendedor){?>
                            <form action="./articulos/subir_imagen.php" method="GET">
                                 <input type="hidden" name="id" value="<?php echo $articulo->_id; ?>">
                            <td><input type="submit" value="Añadir foto"></td>
                        <?php } else { ?>
                            <form action="./pujas/nueva_puja.php" method="GET">
                                 <input type="hidden" name="id" value="<?php echo $articulo->_id; ?>">
                                 <input type="hidden" name="id_persona" value="<?php echo $_SESSION['usuario']->_id; ?>">
                                 <input type="hidden" name="email" value="<?php echo $_SESSION['usuario']->email; ?>">
                            <td><input type="submit" value="Pujar"></td>
                        </form>
                        
                        <?php }} ?>
                    </tr>
    </table>
    <form action="mapatest.php" method="GET">
        <input type="submit" value="Mapa">
    </form>
    <form action="index.php" method="POST">
        <input type="text" id="filtro" name="filtro">
        <input type="submit" value="Filtrar">
    </form>
    <a href="./logout.php" >Cerrar sesion </a>
    <?php

    
    //include 'includes/header.php';

    //include "includes/api_tiempo.php";

    //include 'includes/buscador_incidencias.php';
    
    //include 'includes/mapa.php';
    
    /*if ($_SESSION['usuario']->admin != null){
        include 'includes/usuarios.php';
    }
    
    include 'includes/viajes.php';
    
    include 'includes/footer.php';
*/    
?>
