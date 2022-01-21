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

    $url = "https://examen3aaroniweb.herokuapp.com/images/filtro/";
    $url = $url . $filtro;
    $resImagenes = file_get_contents($url);
    $dataImagenes = json_decode($resImagenes);
    

    /*if(isset($_SESSION['server_msg'])){
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
    }*/



    ?>
    
    <form action="crear_imagen.php" method="GET">
        <input type="submit" value="Subir Imagen">
    </form>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Descripcion</th>
            <th>Numero de Likes</th>
            <th></th>

        </tr>
            <?php 
                foreach ($dataImagenes->data->imagenes as $imagen){ ?>                
                    <tr>
                        <td><img src="<?php echo $imagen->imagen; ?>" width="400" height="500"></td>
                        <td><?php echo $imagen->descripcion; ?></td>
                        <td><?php echo $imagen->numeroLikes; ?></td>
                        <form action="dar_like.php" method="POST">
                        <input type="hidden" id="id" name="id" value="<?php echo $imagen->_id?>">
                        <input type="hidden" id="imagen" name="imagen" value="<?php echo $imagen->imagen?>">
                        <input type="hidden" id="filtro" name="filtro" value="<?php echo $filtro ?>">
                        <input type="hidden" id="descripcion" name="descripcion" value="<?php echo $imagen->descripcion?>">
                        <?php $like = $imagen->numeroLikes + 1; ?>
                        <input type="hidden" id="numeroLikes" name="numeroLikes" value="<?php echo $like?>">
                        <td><input type="submit" value="like"></td>
                        

                        </form>
                        
                        <?php } ?>
                    </tr>
    </table>
    <form action="index.php" method="POST">
        <input type="text" id="filtro" name="filtro">
        <input type="submit" value="Filtrar">
    </form>
    <form action="mapatest.php" method="GET">
        <input type="submit" value="Mapa">
    </form>
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
