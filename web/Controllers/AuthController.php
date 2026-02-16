<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{

    public static function login()
    {
        $email = $_POST["email_user"] ?? null;
        $password = $_POST["password_user"] ?? null;

        if (!$email || !$password) {
            return "invalid_credentials";
        }

        $user = User::findByEmail($email);
        if ($user && password_verify($password, $user["password_user"])) {
            $_SESSION["user"] = [
                "id" => $user["id_user"],
                "name" => $user["name_user"],
                "email" => $user["email_user"],
                "role" => $user["role_user"],
            ];

            if ($user["role_user"] !== "admin") {
                header("Location: home");
                exit();
            }
            header("Location: admin");
            exit();
        } else {
            return "invalid_credentials";
        }
    }

    public static function register()
    {
        $name = $_POST["name_user"];
        $email = $_POST["email_user"];
        $password = $_POST["password_user"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $result = User::create($name, $email, $passwordHash);
        if ($result === true) {
            header("Location: login");
            exit();
        } elseif ($result === "duplicate") {
            return "duplicate";
        } else {
            return "error";
        }
    }
}
