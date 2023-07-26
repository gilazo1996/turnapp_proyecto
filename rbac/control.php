<?php 
    function mostrar($id_google)
    {
        $conn = new mysqli('localhost', 'root', '', 'turn_app_base');
        $sql = mysqli_query($conn," SELECT rol FROM usuarios WHERE oauth_uid = '$id_google' ");

        $filaSql=mysqli_fetch_array($sql, MYSQLI_ASSOC);

        if ($filaSql["rol"] == "cliente")
            return 1;
        else if ($filaSql["rol"] == "admin")
            return 2;
    }
?>