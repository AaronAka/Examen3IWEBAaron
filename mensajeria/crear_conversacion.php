<?php
session_start();
$url = 'http://localhost:3000/conversations/add';
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);

        $data = array(
            "participantes" => array(
                $_POST['id_local'],
                $_POST['select']
            )

        );

        $json = json_encode($data);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        
        $output = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch); 
        $result = json_decode($output);
        
        $_SESSION['server_msg'] = $result->data->msg;
        header('Location: ver_conversacion.php?id_ajeno='. $_POST['select'].'&id_local='. $_POST['id_local']);
        


?>