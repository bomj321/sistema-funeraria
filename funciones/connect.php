<?php

    $conn = new mysqli('localhost', 'root','', 'funeraria');

    if ($conn->connect_error)
    {	
    echo $error-> $conn->connect_error;
    }
 ?>
