<?php

namespace Middleware;

class auth
{
    public function handle()
    {
        if (isset($_SESSION['user']['id_role']) && $_SESSION['user']['id_role'] !== 1) {
            header('location: ' . APP_URL);
            exit;
        }
    }

    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            header('location: ' . APP_URL);
            exit;
        }
    }

    public function signup()
    {
        if (isset($_SESSION['user'])) {
            header('location: ' . APP_URL);
            exit;
        } else {
            return true;
        }
    }

    public function signin()
    {
        if (isset($_SESSION['user'])) {
            header('location: ' . APP_URL);
            exit;
        } else {
            return true;
        }
    }
}
