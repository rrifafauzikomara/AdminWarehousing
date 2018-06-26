<?php
@session_start();

session_destroy();

header("location: /pergudangan/index.php");
?>