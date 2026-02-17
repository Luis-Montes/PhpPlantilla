<?php
/*=====================================
Caoturar parametros de la URL
======================================*/

$routeArray = explode("/", $_SERVER["REQUEST_URI"]);
array_shift($routeArray);

foreach ($routeArray as $key => $value) {
    $routeArray[$key] = explode("?", $value)[0];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Views/assets/css/styles.css">


</head>

<body>
    <?php

    if ($routeArray[0] == "admin") {
        AuthHelper::authVerifyRole("admin");
        include "pages/" . $routeArray[0] . "/" . $routeArray[0] . ".php";
    }

    if ($routeArray[0] !== "admin") {
        include 'pages/components/header.php';
    }
    
    if ($routeArray[0] !== "admin") {
        
        // LOGIN ROUTE
        if ($routeArray[0] == "login") {

            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            AuthHelper::usuerLoggedIn();


            $message = null;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $result = AuthController::login();

                if ($result === "invalid_credentials") {
                    $message = "Correo o contraseña incorrectos";
                }
            }

            include "pages/" . $routeArray[0] . "/" . $routeArray[0] . ".php";
        }
        // LOGIN ROUTE

        // LOGOUT ROUTE
        elseif ($routeArray[0] == "logout") {
            session_destroy();
            header("Location: login");
            exit();
        }
        // LOGOUT ROUTE

        // HOME ROUTE
        elseif ($routeArray[0] == "home") {
            if (!isset($_SESSION["user"])) {
                header("Location: login");
                exit();
            }

            include "pages/" . $routeArray[0] . "/" . $routeArray[0] . ".php";
        }
        // HOME ROUTE

        // REGISTER ROUTE
        elseif ($routeArray[0] == "register") {
            AuthHelper::usuerLoggedIn();
            include "pages/" . $routeArray[0] . "/" . $routeArray[0] . ".php";
        }
        // REGISTER ROUTE

        else {
            include "pages/404/404.php";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>