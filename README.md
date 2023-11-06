# Router
 Simple PHP Router. 
 PHP Routing without a Framework. 


Creating a PHP router system involves defining routes that map to specific pages or actions in your web application. Below is a simple example of a PHP router system that handles routes, associates them with page names, and executes the corresponding code.

**index.php (Main Entry Point):**

```php
<?php
// Include the router file
require_once 'router.php';

// Initialize the router
$router = new Router();

// Define routes and associate them with page names
$router->addRoute('/', 'home', function () {
    // Code for the Home page
    include 'pages/home.php';
});

$router->addRoute('/about', 'about', function () {
    // Code for the About page
    include 'pages/about.php';
});

$router->addRoute('/contact', 'contact', function () {
    // Code for the Contact page
    include 'pages/contact.php';
});

// Handle the current request
$router->handle($_SERVER['REQUEST_URI']);
```

**router.php (Router Class):**

```php
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
```

**pages/home.php (Home Page):**

```php
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <p>This is the content for the home page.</p>
</body>
</html>
```

**pages/about.php (About Page):**

```php
<!DOCTYPE html>
<html>
<head>
    <title>About Page</title>
</head>
<body>
    <h1>About Us</h1>
    <p>Learn more about our company and our team.</p>
</body>
</html>
```

**pages/contact.php (Contact Page):**

```php
<!DOCTYPE html>
<html>
<head>
    <title>Contact Page</title>
</head>
<body>
    <h1>Contact Us</h1>
    <p>Feel free to get in touch with us using the contact information provided.</p>
</body>
</html>
```

**pages/404.php (Page Not Found):**

```php
<!DOCTYPE html>
<html>
<head>
    <title>Page Not Found</title>
</head>
<body>
    <h1>404 - Page Not Found</h1>
    <p>The page you are looking for does not exist.</p>
</body>
</html>
```

In this example, we have a simple router class (`Router`) that allows you to define routes, associate them with page names, and specify the code to execute for each page. The main entry point (`index.php`) initializes the router, defines routes, and handles the current request, including a 404 page for unhandled routes.

When a user accesses your application, the router determines which page to display based on the requested URL. You can expand this router system by adding more routes and customizing the pages and code associated with each route.
