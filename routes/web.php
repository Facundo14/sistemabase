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

//Route::get('/', 'PagesController@home')->name('paginas.inicio');
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
/*Route::get('sobre', 'PagesController@sobre')->name('paginas.sobre');
Route::get('archivo', 'PagesController@archivo')->name('paginas.archivo');
Route::get('contacto', 'PagesController@contacto')->name('paginas.contacto');

Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('categorias/{categoria}', 'CategoriasController@show')->name('categorias.show');
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');
*/



Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function (){
   Route::get('/', 'AdminController@index')->name('inicio');

   //Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
   //Se reemplaza las rutas de abajo con la linea de arriba solamente...

  /*Route::get('posts', 'PostsController@index')->name('admin.posts.index');
   Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
   Route::post('posts', 'PostsController@store')->name('admin.posts.store');
   Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
   Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');
   Route::delete('posts/{post}', 'PostsController@destroy')->name('admin.posts.destroy');*/

  //Route::post('posts/{post}/fotos', 'FotosController@store')->name('admin.posts.fotos.store');

  //Route::delete('fotos/{foto}', 'FotosController@destroy')->name('admin.fotos.destroy');

   Route::resource('users', 'UsersController', ['as' => 'admin']);

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

   //Provincias rutas
   Route::resource('provincias', 'ProvinciasController', ['except' => 'show', 'as' => 'admin']);

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
