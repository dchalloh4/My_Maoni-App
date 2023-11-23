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

//LECTURERS ROUTE
Route::get('/lecturer', [loginController::class, 'LecturerForm'])->name('loginLec');
Route::post('/lecturer', [loginController::class, 'LoginLec']);
Route::get('/admin/lec/dashboard', function (){
    return view('admin.layouts.appLec');
})->name('LecDashboard');
Route::get('/admin/lecs', [AppController::class, 'currentUser']);

//STUDENT ROUTE
Route::get('/student', [loginController::class, 'LoginForm'])->name('login');
Route::post('/student', [loginController::class, 'Login'])->name('login');
Route::get('/admin/login', [loginController::class, 'LoginForm']);
Route::post('/admin/login', [loginController::class, 'Login']);


Route::get('/admin/currentUser', [AppController::class, 'currentUser']);
Route::get('/admin/details', [AppController::class, 'getUser'])->name('details');
Route::post('/admin/logout', [loginController::class, 'logout'])->name('logout');

// Route::post('/', [loginController::class, 'Login'])->name('login');

Route::post('/admin/user/register', [AppController::class, 'submitUnits']);
Route::get('/', [AppController::class, 'showLoginForm']);

// Route::post('/admin/logout', [loginController::class,'logout'])->name('logout');
// Route::get('[view]', ['loginController::class@checkIfloggedIn', 'AppController::class'])->where('view', '(.*)');;

Route::middleware(['auth'])->group(function () {
    Route::get('{view}', AppController::class)->where('view', '(.*)');
});

// Route::get('{view}',AppController::class)->where('view', '(.*)');
