<?php
class AuthHelper
{
    public static function authVerifyRole($role)
    {
        if ($_SESSION["user"]["role"] !== $role) {
            header("Location:home");
            exit();
        }
    }

    public static function usuerLoggedIn()
    {
        if (isset($_SESSION["user"])) {
            header("Location: home");
            exit();
        }
    }
}
