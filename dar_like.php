<h1>like</h1>

<?php 


    $uwu = "uwu";
    var_dump($uwu);?> <h1>uwu</h1> <?php
    $urlEndpoint = 'http://localhost:3000/images/edit/'.$_POST['id'];

    var_dump($urlEndpoint);
    
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $urlEndpoint);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $data = array(
         "imagen" => $_POST['imagen'],
         "descripcion" => $_POST['descripcion'],
         "numeroLikes" => intval($_POST['numeroLikes'])
     );


     $json = json_encode($data);
     var_dump($json);
     
     curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
     $output = curl_exec($ch);
     $info = curl_getinfo($ch); 
     $result = json_decode($output);
     
     $_SESSION['server_msg'] = $result->data->msg;

     header ("Location: index.php");

     

?> 