<?php
ob_start();
require_once './mvc/controller/HomeController.php';
$Controller = new Controller();
$Controller->Controller();
ob_flush();
?>