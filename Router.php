<?php
class Router {
    private $routes = [];

    // Add a route and associate it with a page name and callback
    public function addRoute($url, $pageName, $callback) {
        $this->routes[$url] = ['page' => $pageName, 'callback' => $callback];
    }

    // Handle the current request and execute the associated code
    public function handle($requestUri) {
        foreach ($this->routes as $url => $route) {
            if ($url === $requestUri) {
                call_user_func($route['callback']);
                return;
            }
        }
        
        // Handle 404 - Page not found
        include 'pages/404.php';
    }
}
?>