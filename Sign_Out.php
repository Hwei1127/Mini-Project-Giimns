<?php
session_start();
session_destroy();
header('Location:Sign_In.php');
exit;
