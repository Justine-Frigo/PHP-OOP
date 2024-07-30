<?php
declare(strict_types = 1);

class HomepageController
{
    public function index()
    {
        require __DIR__ . '/../View/home.php';
    }
}