<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix' => config('admin.route.api_prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->get('/home', 'HomeController@index')->name('admin.home');


    $router->resource('DtkSuperCategory', 'DtkSuperCategoryController');
    $router->get('DtkSuperCategoryCollect', 'DtkSuperCategoryController@collect')->name('DtkSuperCategoryCollect');

    //产品演示
    $router->resource('supplier', 'SuppliersController');
    $router->resource('brand', 'BrandController');
    $router->resource('goods/class', 'GoodsClassController');
    $router->resource('goods/list', 'GoodsController');
    //产品操作
    $router->post("goods/addGoodsAttr", "GoodsController@addGoodsAttr")->name("addGoodsAttr");
    $router->post("goods/addGoodsAttrValue", "GoodsController@addGoodsAttrValue")->name("addGoodsAttrValue");

});
