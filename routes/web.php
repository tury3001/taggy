<?php

use App\Http\Controllers\SetController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ResourceController;

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

// Main route
Route::get('/', [ResourceController::class, 'index'])->name('home');

// Resource routes
Route::get('resources', [ResourceController::class, 'index'])->name('home');
Route::get('resources/create', [ResourceController::class, 'create']);
Route::post('resources', [ResourceController::class, 'store']);
Route::get('resources/{resource}/edit', [ResourceController::class, 'edit']);
Route::patch('resources/{resource}', [ResourceController::class, 'update']);
Route::get('resources/{resource}', [ResourceController::class, 'show']);
// destroy pending...


Route::get('tags', [TagController::class, 'index']);

Route::get('sets', [SetController::class, 'index']);
Route::get('set/edit/{id}', [SetController::class, 'edit']);
Route::post('set/update', [SetController::class, 'update']);
Route::get('set/create', [SetController::class, 'create']);
Route::post('set/store', [SetController::class, 'store']);

Route::get('changeSet', function(Request $request) {
    Session::put('currentSetId', $request->input('set'));
    return redirect('/');
});





