<?php

session_destroy();

session_start();

$_SESSION["linguagem"] = "pt";

header("Location: ../view/logar.php");
