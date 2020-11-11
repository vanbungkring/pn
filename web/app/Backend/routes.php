<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('users', UserController::class);
    $router->resource('posts', 'PostController');
    $router->resource('categories', 'CategoryController');
    $router->resource('anggota','AnggotaController');
    $router->resource('dpd','DaerahController');

    $router->resource('comment','CommentController');
    $router->resource('agenda','AgendaController');

    $router->resource('opini','OpinionController');
    $router->resource('covid','CovidController');
    $router->resource('menu','MenuController');
    $router->resource('pages','PageController');

    $router->resource('galleries','GalleryController');
    $router->resource('headlines','HeadlineController');
    $router->resource('banners','BannerController');
    
    $router->resource('press','PressController');

    $router->post('tweet','TweetController@tweet');
    $router->resource('setting','SettingController');
    
    
});