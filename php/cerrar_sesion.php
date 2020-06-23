<?php
session_start();
unset($SESSION['loggedin']);
session_destroy();
header('Location:/3abranding');




