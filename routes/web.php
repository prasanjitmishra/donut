<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/create', 'User\UserController@create');
Route::get('user/list', 'User\UserController@list');
Route::POST('user/save', 'User\UserController@save');

Route::get('group/create', 'Group\GroupController@create');
Route::get('group/list', 'Group\GroupController@list');
Route::POST('group/save', 'Group\GroupController@save');

Route::get('permission/create', 'Permission\PermissionController@create');
Route::get('permission/list', 'Permission\PermissionController@list');
Route::POST('permission/save', 'Permission\PermissionController@save');

// assign group
Route::get('user/assign-group', 'User\UserController@assignGroup');
Route::POST('user/save-group', 'User\UserController@saveGroup');

// assign manager
Route::get('user/assign-manager', 'User\UserController@assignManager');
Route::POST('user/save-manager', 'User\UserController@saveManager');

// assign  group
Route::get('user/assign-permission', 'User\UserController@assignPermission');
Route::POST('user/save-permission', 'User\UserController@savePermission');




Route::get('user/hierarchy', 'User\UserController@hierarchy');