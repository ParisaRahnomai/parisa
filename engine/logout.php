<?php
require_once 'db.php';
unset($_SESSION['loggedin']);
header('Location: ../sign_ostad.php');
