<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\unitController;
use App\Models\Lecturer;
use App\Models\Units;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Event\Code\NoTestCaseObjectOnCallStackException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth'])->group(function () {
});

Route::get('/admin/my-class', function (Request $request) {
    $users = User::all();

    return $users->toArray();
});

Route::get('/admin/lecs/others', function (Request $request) {
    $users = User::where('Units', true)->get();

    return $users->toArray();
});

Route::get('/admin/my-class/rep', function (Request $request) {
    $class_rep = User::where('is_class_rep', true)->get();
    return $class_rep[0]->name;
});

Route::get('/admin/units', [unitController::class, 'index']);

Route::middleware(['auth:api'])->group(function () {
});

Route::post('/admin/logout', [loginController::class, 'logout'])->name('logout');

Route::post('/admin/user/register', [AppController::class, 'submitUnits']);

Route::post('/admin/login', [loginController::class, 'Login'])->name('Login');
Route::post('/lecturer', [loginController::class, 'Login'])->name('Login');
Route::post('/student', [loginController::class, 'Login'])->name('Login');

Route::post('/', [loginController::class, 'Login'])->name('Login');
Route::post('/admin/rate', [AppController::class, 'rate']);
Route::post('/admin/get/unit/', [AppController::class, 'getUnit']);
Route::post('/admin/lecs', [AppController::class, 'lecsList']);
