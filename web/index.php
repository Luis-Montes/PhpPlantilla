<?php
session_start();
require_once 'models/database.php';
require_once 'Controllers/TemplateController.php';
require_once 'Controllers/AuthController.php';
include_once 'Views/pages/helpers/authHelper.php';


$templateController = new TemplateController();
$templateController->index();

?>