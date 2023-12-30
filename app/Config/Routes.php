<?php

use App\Controllers\CommentController;
use App\Controllers\PostController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [PostController::class, 'get_all_post']);
$routes->get('/', [CommentController::class, 'get_all_comment']);
$routes->post('/user/create_post', [PostController::class, 'create_post']);
$routes->post('/user/create_comment', [CommentController::class, 'create_comment']);