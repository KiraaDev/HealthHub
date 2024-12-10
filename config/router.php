<?php 

// config
require_once './config/database.php';
require_once './vendor/AltoRouter.php';

// middleware
require_once './middleware/AuthUser.php';

// controllers
require_once './controllers/AuthController.php';
require_once './controllers/AppointmentController.php';

$db = new Database();
$db->connectDB();

$router = new AltoRouter();

$router->setBasePath('/HealthHub');

$router->map('GET', '/', function(){
    require './views/home.php';
});

$router->map('GET|POST', '/appointment', function(){
    $appointmentController = new AppointmentController();
    $appointmentController->submitForm();
});

$router->map('GET|POST', '/login', function(){

    $authController = new AuthController();
    $authController->handleLogin();

});

$router->map('GET|POST', '/register', function(){

    $authController = new AuthController();
    $authController->handleRegister();

});

$router->map('GET', '/dashboard', function(){
    checkLoginMiddleware();
    require './views/dashboard.php';
});

$router->map('GET', '/logout', function(){
    
    $authController = new AuthController();
    $authController->handleLogout();

});

$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // Handle 404 Not Found
    echo "404 Not Found";
}