<?php
require "../../rbac/erroresInvitado.php";

function sesion()
{
    if (!session_id()) 
    {
        session_id('s');
        session_set_cookie_params(0, "/");
        session_start();
    }

    if (empty($_SESSION['userData']))
        errorInvitado();
}

?>