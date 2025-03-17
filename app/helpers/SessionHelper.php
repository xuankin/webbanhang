<?php
class SessionHelper
{
    public static function isLoggedIn()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['username']) && !empty($_SESSION['username']);
    }

    public static function isAdmin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return self::isLoggedIn() && isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    public static function getCurrentUser()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return self::isLoggedIn() ? $_SESSION['username'] : null;
    }

    public static function getUserRole()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return self::isLoggedIn() && isset($_SESSION['role']) ? $_SESSION['role'] : null;
    }

    public static function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        session_destroy();
    }
}