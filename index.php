<?php
error_reporting(1);
// Include the router file
require_once 'router.php';

// Initialize the router
$router = new Router();

// Define routes and associate them with page names
$router->addRoute('/Router/index.php', 'home', function () {
    // Code for the Home page
    include 'pages/home.php';
});

$router->addRoute('/Router/index.php/about', 'about', function () {
    // Code for the About page
    include 'pages/about.php';
});

$router->addRoute('/contact', 'contact', function () {
    // Code for the Contact page
    include 'pages/contact.php';
});

// Handle the current request
$router->handle($_SERVER['REQUEST_URI']);
