<?php

    if(!(isset($_SESSION['DNIEmpleado'])))
    {
        header('Location: ../login.html');
    }


?>