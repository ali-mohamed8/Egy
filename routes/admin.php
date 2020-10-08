<?php

use Illuminate\Support\Facades\Route;

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
define('PAGINATE_COUNT' , 10) ;
####### bootstrap ui default routs  ##########
Auth::routes();

Route::get('/home', function (){

    return 'you are login';
})->name('home');
##########################################################

Route::group(['namespace' => 'Admin','middleware' => 'guest:admin'],function (){

      Route::get('login','LoginController@getLogin') ->  name('login.admin') ;
      Route::post('login','LoginController@checkLogin') -> name('check.admin') ;
});

Route::group(['namespace' => 'Admin','middleware' => 'auth:admin'],function (){

    Route::get('dashboard','CustomController@dashboard') -> name('dashboard');
#########################Begin languages Routes ####################
    Route::group(['prefix' => 'languages'] , function(){

      Route::get('/', 'Languages@getLang')->name('admin.lang');

      Route::get('/create', 'Languages@createLangView')->name('admin.lang.createView');
      Route::post('/create', 'Languages@createLang')->name('admin.lang.create');

      Route::get('/update/{id}', 'Languages@updateLangView')->name('admin.lang.updateView');
      Route::post('/update', 'Languages@updateLang')->name('admin.lang.update');

      Route::get('/delete/{id}', 'Languages@deleteLang')->name('admin.lang.Delete');
    });
######################End languages routes #####################3
#########################Begin languages Routes ####################
    Route::group(['prefix' => 'MainTourCategories'] , function(){

        Route::get('/', 'MainToursCategories@index')->name('admin.main-category');

        Route::get('/create', 'MainToursCategories@createCatView')->name('admin.category.createView');
        Route::post('/create', 'MainToursCategories@createCat')->name('admin.category.create');

        Route::get('/update/{id}', 'MainToursCategories@edit')->name('admin.category.updateView');
        Route::post('/update', 'MainToursCategories@update')->name('admin.category.update');

        Route::get('/delete/{id}', 'MainToursCategories@deleteCat')->name('admin.category.Delete');
    });
######################End languages routes #####################3

});
