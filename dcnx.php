<?php
session_start();
unset($_SESSION['connectedUser']);

session_destroy();

header('Location: index.php'); 
exit;