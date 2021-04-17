<?php

session_start();

unset($_SESSION['usuario']);
session_destroy($_SESSION['usuario']);

header('Location:../View/login.html');

