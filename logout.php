<?php
include("./includes/connect.php");
session_start();
if (session_destroy()) {
    header("location:index.php");
}
?>