<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $file = $_FILES['imagen'];
    // Si es una imagen continuamos, si no, mandamos el error :3
    $file_size = $file['size'];
        if (($file_size > 2*1024*1024)){      
            echo '<p>File too large. File must be less than 2 MB.</p>'; 
            
        } else if($file['type'] == 'image/jpg' || $file['type'] == 'image/png' || $file['type'] == 'image/jpeg'){
            $filename= $file['tmp_name'];
            $client_id = "531facc897ea14b"; // AQUI SU CLIENT ID
            $handle = fopen($filename, "r");
            $data = fread($handle, filesize($filename));
            $pvars   = array('image' => base64_encode($data));
            $timeout = 30;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
            $out = curl_exec($curl);
            curl_close ($curl);
            $pms = json_decode($out,true);
            $url="";
            
            if( isset( $pms['data']['link'] ) ){
                $url=$pms['data']['link'];
             }
            
             $urlEndpoint = 'https://examen3aaroniweb.herokuapp.com/articulos/add';
            
             $ch = curl_init();
             curl_setopt($ch, CURLOPT_URL, $urlEndpoint);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
             curl_setopt($ch, CURLOPT_POST, true);
        
             $data = array(
                "vendedor" => $_POST['vendedor'],
                "descripcion" => $_POST['descripcion'],
                "precio_salida" => intval($_POST['precio']),
                "imagenes" => $url,
                "comprador" => ""
             );
        
             $json = json_encode($data);
        
             curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
             curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
             $output = curl_exec($ch);
             $info = curl_getinfo($ch);
             curl_close($ch); 
             $result = json_decode($output);
             
             $_SESSION['server_msg'] = $result->data->msg;
             header('Location: ../index.php');
             
        }

        

    }
?>


<h1>Subir articulo</h1>

<form enctype="multipart/form-data" action="subir_articulo.php" method="POST">
    <input placeholder="descripcion" name="descripcion">
    <input placeholder="precio" name="precio">
    <input type="file" id="imagen" name="imagen" type="image/jpeg, image/jpg, image/png">
    <input type="hidden" value="<?php echo $_GET['id'] ?>" name="vendedor">
    <input type="submit" value="Crear">
</form>


<a href="../index.php" class="btn btn-danger">Cancelar</a>