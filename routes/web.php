<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\FileController;

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

Route::get('/register', function () {
    return redirect('/login');
});

Route::post('/register', function () {
    return redirect('/login');
});

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AdminController::class, 'UserDashboard'])->name('dashboard');


Route::group(['middleware' => 'auth'], function(){

    Route::group(['middleware' => 'redirect.auth' , 'prefix' => 'admin'], function () {

        Route::get('/view', [AdminController::class, 'UserView'])->name('user.all');
        Route::get('/add', [AdminController::class, 'UserAdd'])->name('user.add');
        Route::post('/store', [AdminController::class, 'UserStore'])->name('user.store');
        Route::get('/edit/{id}', [AdminController::class, 'UserEdit'])->name('user.edit');
        Route::post('/update/{id}', [AdminController::class, 'UserUpdate'])->name('user.update');
        Route::post('delete', [AdminController::class, 'UserDelete'])->name('user.delete');
    });


    Route::get('/inactive/{id}', [AdminController::class, 'UserInactive'])->name('user.inactive');
    Route::get('/active/{id}', [AdminController::class, 'UserActive'])->name('user.active');

    Route::prefix('user')->group(function () {
        Route::get('/file/view', [FileController::class, 'FileView'])->name('file_group.all');
        Route::get('/file/add', [FileController::class, 'FileAdd'])->name('file.add');
        Route::post('/file/store', [FileController::class, 'FileStore'])->name('file.store');

        Route::get('/file/group/{file}', [FileController::class, 'FileGroup'])->name('file.group');
        Route::get('/file/group/{group}/contacts', [FileController::class, 'FileGroupContacts'])->name('file.group.contacts');
    });

});
