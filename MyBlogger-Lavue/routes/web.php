<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('admin/dashboard/', function () {
//     return view('admin/dashboard');
// }

// Route::get('/admin/login', [loginController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/logout', 'loginController@logout')->name('signout');

Route::get('/student', [loginController::class, 'LoginForm'])->name('login');
Route::get('/lecturer', [loginController::class, 'LecturerForm'])->name('login');
Route::post('/student', [loginController::class, 'Login'])->name('login');
Route::post('/lecturer', [loginController::class, 'LoginLec']);

Route::get('/admin/lec/dashboard', function (){
    return view('admin.layouts.appLec');
})->name('login');


Route::get('/admin/details', [AppController::class, 'getUser'])->name('details');

// Route::post('/', [loginController::class, 'Login'])->name('login');

Route::get('/admin/login', [loginController::class, 'LoginForm']);
Route::post('/admin/login', [loginController::class, 'Login']);

// Route::post('/admin/logout', [loginController::class,'logout'])->name('logout');
Route::post('/admin/logout', [loginController::class, 'logout'])->name('logout');

Route::post('/admin/user/register', [AppController::class, 'submitUnits']);
Route::get('/admin/currentUser', [AppController::class, 'currentUser']);

Route::get('/', [AppController::class, 'showLoginForm']);

Route::get('/admin/lecs', [AppController::class, 'currentUser']);
// Route::get('[view]', ['loginController::class@checkIfloggedIn', 'AppController::class'])->where('view', '(.*)');;

Route::middleware(['auth'])->group(function () {
    Route::get('{view}', AppController::class)->where('view', '(.*)');
});

// Route::get('{view}',AppController::class)->where('view', '(.*)');
