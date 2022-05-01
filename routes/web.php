<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;

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
    return view('dashboard');
});
Route::group([
    'prefix'=>config('admin.prefix'),
    'namespace'=>'App\\Http\\Controllers',
],function () {

    Route::get('login','LoginAdminController@formLogin')->name('admin.login');
    Route::post('login','LoginAdminController@login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('logout','LoginAdminController@logout')->name('admin.logout');
        Route::post('/subscribe', [SubscriberController::class, 'subscribe']);

        
        Route::view('/','dashboard')->name('dashboard');
        Route::view('/projeoner','proejelerim.oner-proje')->name('projeoner')->middleware('can:role,"ogrenci"');
        Route::view('/ogrencibilgilerim','projelerim.bilgilerim')->name('ogrencibilgileri')->middleware('can:role,"ogrenci"');
        Route::view('/useradd','usereklegoster.user-add')->name('useradd')->middleware('can:role,"admin"');
        Route::view('/admin','data-admin')->name('admin')->middleware('can:role,"admin"');



        Route::resource('kullanicilar','kullanicilarController');

        Route::resource('projeler','projeekleContoller');
        Route::resource('ogrencibilgiler','ogrencibilgileriContoller');
        Route::resource('ogretmenspanel','ogretmenprojeController');
        Route::resource('ogrenciprojeler','projelerContoller');
        Route::resource('goruntuleoneri','goruntuleoneriController');
        Route::resource('projeraporload','projeraporloadController');
        Route::resource('projeraporgoruntuleogretmen','projeraporgoruntuleogretmenController');
        Route::resource('mail','mailController');
        Route::resource('tezbekleyen','tezbekleyenController');
        Route::resource('tezraporload','tezraporloadController');
        Route::resource('bitenprojem','bitenprojemController');

        Route::get('/switch','ogretmenprojeController@switch')->name('switch');
        Route::get('/switchrapor','projeraporgoruntuleogretmenController@switchrapor')->name('switchrapor');
        Route::get('/reddetkonu/{id}','ogretmenprojeController@reddet')->name('reddetkonu');


    });
});
