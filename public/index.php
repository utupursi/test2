<?php
require_once __DIR__ . '/../helpers.php';
require_once __DIR__ . '/../Request.php';
require_once __DIR__ . '/../Router.php';

require_once __DIR__ . '/../db/Database.php';

if(!isset($_SESSION)) {
    session_start();
}
$db = new Database();

$router = new Router(new Request);

$router->get('/', 'index');
$router->get('/profile', 'profile');
$router->get('/about','about');
$router->get('/login', 'login');
$router->get('/logout', function(){
    session_unset();
    session_destroy();
    redirect('/');
});
$router->post('/submit-login','submit-login');
$router->get('/succesfull', 'succesfull');
$router->get('/signup','signup');
$router->post('/submit-signup','submit-signup');
$router->get('/writeblog', 'writeblog');
$router->post('/writeblog', 'writeblog');
$router->post('/data', function ($request) {
    return json_encode($request->getBody());
});
