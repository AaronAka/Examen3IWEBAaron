<section class="container">
    <h1>Usuarios</h1>
    
    <div class="header-opciones">
        <a href="usuario/crear_usuario.php" class="btn btn-primary">Crear usuario</a>
    </div>

    <table>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Apellido</th>
        </tr>
            <?php 
                foreach ($dataUsers->data->usuarios as $usuario){ ?>
                
                    <tr>
                        <td><?php if ($usuario->foto==null)
                                    echo "<img src='https://acortar.link/mZkcJS' style='width:30px;height:30px;'?></td>";
                                    else
                                    echo "<img src='".$usuario->foto."' style='width:30px;height:30px;'?></td>";?>
                        <td><?php echo $usuario->nombre; ?></td>
                        <td><?php echo $usuario->apellido; ?></td>
                        <form action="usuario/delete.php" method="POST">
                            <input type="hidden" value="<?php echo $usuario->_id?>" name="id">
                            <th><input type="submit" value="Eliminar"></th>
                        </form>
                        <form action="usuario/edit.php" method="GET">
                            <input type="hidden" value="<?php echo $usuario->_id?>" name="id">
                            <th><input type="submit" value="Editar"></th>
                        </form>
                        <form action="crear_viaje.php" method="GET">
                            <input type="hidden" value="<?php echo $usuario->_id?>" name="id">
                            <th><input type="submit" value="Añadir viaje"></th>
                        </form>
                    </tr>
                
            <?php } ?>
    </table>
    <?php 
        If (isset($_SESSION['login'])){
            var_dump($_SESSION["usuario"]->_id)
            
            ?> 
            <h1><?php echo $_SESSION["usuario"]->_id;?></h1>
            <form action="mensajeria/lista_conversaciones.php" method="GET">
            <input type="hidden" value=<?php echo $_SESSION["usuario"]->_id ?> name="id">    
            <th><input type="submit" value="Ver Conversaciones"></th>
        </form> <?php
          }
    ?>
</section>