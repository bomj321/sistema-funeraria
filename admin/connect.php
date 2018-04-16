<?php
<<<<<<< HEAD
$connection = mysqli_connect('localhost', 'root', '', 'funeraria2');
=======
$connection = mysqli_connect('localhost', 'root', '', 'funeraria');
>>>>>>> ea635e39cd20b27ed7c2ac640feae22e0593d509
  
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}
<<<<<<< HEAD
$select_db = mysqli_select_db($connection, 'funeraria2');
=======
$select_db = mysqli_select_db($connection, 'funeraria');
>>>>>>> ea635e39cd20b27ed7c2ac640feae22e0593d509
if (!$select_db) {
    die("Database Selection Failed" . mysqli_error($connection));
}
?>