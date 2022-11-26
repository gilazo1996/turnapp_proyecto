<?php
    function conectar($id_google)
    {
        $sql = "SELECT * FROM turno WHERE oauth_uid = $id_google";
        return $sql;
    }
?>