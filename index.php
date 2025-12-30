<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Pdf Exchange Platform - Home";
$templateParams["nome"] = "templates/home_main.php";
$templateParams["css_file"] = "home_style.css";
$templateParams["usa_sidebar"] = false;
$templateParams["show_welcome"] = true;

require 'templates/base.php';
