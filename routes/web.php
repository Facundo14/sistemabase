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

//Para ver como queda el envio de mail para la contraseña y usuario
/*Route::get('email', function() {
    return new App\Mail\CredencialesLogin(App\User::first(), 'asd123');
});*/

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');




Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function (){
   Route::get('/', 'AdminController@index')->name('inicio');

   Route::resource('users', 'UsersController', ['as' => 'admin']);
   Route::put('users/{user}/activar', 'UsersController@activar')->name('admin.users.activar');

   Route::resource('roles', 'RolesController', ['except' => 'show', 'as' => 'admin']);
   Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

   Route::middleware('role:Admin')
   ->put('users/{user}/roles', 'UsersRolesController@update')
   ->name('admin.users.roles.update');

   Route::middleware('role:Admin')
   ->put('users/{user}/permissions', 'UsersPermissionsController@update')
   ->name('admin.users.permissions.update');

   //Empresa rutas
   Route::resource('empresas', 'EmpresaController', ['except' => 'show', 'as' => 'admin']);
   //Route::get('empresas/timeline', 'EmpresaController@timeline')->name('admin.empresas.timeline');
   Route::get('empresas/timelineshow', 'EmpresaController@timelineshow')->name('admin.empresas.timelineshow');

   //Paises rutas
   Route::resource('paises', 'PaisController', ['except' => 'show', 'as' => 'admin']);

   

});
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    /* Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');*/

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
