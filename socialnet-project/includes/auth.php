<?php
require_once __DIR__ . '/session.php';

function require_login(): void
{
    if (empty($_SESSION['user_id'])) {
        header('Location: ../socialnet/signin.php');
        exit;
    }
}
