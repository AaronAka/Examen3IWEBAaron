<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($pujaMinima > $_GET['oferta']){
            echo "La oferta es demasiado baja";
        } else {
            $url = 'https://examen3aaroniweb.herokuapp.com/pujas/add';
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, true);
    
            $data = array(
                "id_producto" => $_POST['id_producto'],           
                "comprador" => $_POST['comprador'],
                "oferta" => $_POST['oferta']
            );
    
            $json = json_encode($data);
    
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            
            $output = curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch); 
            $result = json_decode($output);
            
            $_SESSION['server_msg'] = $result->data->msg;
            
            header('Location: ../index.php');
        }

    } else {
        $res = file_get_contents("https://examen3aaroniweb.herokuapp.com/pujas");
        $data = json_decode($res);
        var_dump($data);
        $pujaMinima = 1;
        foreach($data->data->pujas as $puja){
            if($puja->id_producto == $_GET['id']){
                if($puja->oferta > $pujaMinima){
                    $pujaMinima = $puja->oferta;
                }
            }
        }
    }


?>


<h1>Crear usuario</h1>

<form action="nueva_puja.php" method="POST">
    <input placeholder="oferta" name="oferta">
    <input type="hidden" name="comprador" value="<?php echo $_GET['email']; ?>">
    <input type="hidden" name="id_persona" value="<?php echo $_GET['id_persona']; ?>">
    <input type="hidden" name="id_producto" value="<?php echo $_GET['id']; ?>">
    <input type="submit" value="Crear">
</form>


<a href="../index.php" class="btn btn-danger">Cancelar</a>