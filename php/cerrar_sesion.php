<?php
session_start();

unset($SESSION['loggedin']);

session_destroy();

header('Location:/index.php');




