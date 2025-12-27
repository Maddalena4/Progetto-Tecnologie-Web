<?php
require_once 'db/database.php';
require_once 'utils/functions.php';

session_start();

$templateParams["titolo"] = "Pdf Exchange Platform - Home";
$templateParams["nome"] = "templates/home_main.php";
$templateParams["css_file"] = "home_style.css";
$templateParams["usa_sidebar"] = false;

require 'templates/base.php';
