<?php
session_start();
error_reporting(E_PARSE);
if ($_SESSION['nombreRepar']=="") {
    header("Location: index.php");
}