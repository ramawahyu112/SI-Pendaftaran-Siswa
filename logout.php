<?php

session_start();

$_SESSION=[];

// Menghapus sesi 
session_unset();
session_destroy();

header('location:index.php');

