<?php

use Illuminate\Support\Facades\Route;
use App\Models\interviewee_types;
use App\Models\interviewee_attributes;
use App\Http\Controllers\IntervieweeController;
use App\Http\Controllers\IntervieweeTypesController;
use App\Http\Controllers\Interviewee_AttributesController;

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
    return view('/auth/login');
});

Route::get('/interviewee', function () {
    return view('intervieweeComponents/intervieweeTable');
});

Route::get('/user', function () {
    return view('/components/user');
});

Route::get('/oltitest', function () {
    return view('pages.example');
});

Route::get('/oltitest1', function () {
    return view('pages.example2');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::prefix('interviewee')->group(function () {

    Route::get('/', [IntervieweeTypesController::class, 'index'])->name('interviewee.index');
    Route::get('/edit-interviewee/{id}', [IntervieweeTypesController::class, 'edit'])->name('interviewee.edit');
    Route::post('/update-interviewee/{id}', [IntervieweeTypesController::class, 'update'])->name('interviewee.update');
    Route::get('/destroy/{id}', [IntervieweeTypesController::class, 'destroy'])->name('interviewee.destroy');
    Route::get('/show', [IntervieweeTypesController::class, 'show'])->name('interviewee.show');
    Route::get('/create', [IntervieweeTypesController::class, 'create'])->name('interviewee.create');
    Route::post('/store-interviewee', [IntervieweeTypesController::class, 'store'])->name('interviewee.store');
});

Route::prefix('interviewee-attributes')->group(
    function () {
        Route::get('/', [Interviewee_AttributesController::class, 'index'])->name('intervieweeAttributes.index');
        Route::get('/edit-interviewee/{id}', [Interviewee_AttributesController::class, 'edit'])->name('intervieweeAttributes.edit');
        Route::post('/update-interviewee/{id}', [Interviewee_AttributesController::class, 'update'])->name('intervieweeAttributes.update');
        Route::get('/destroy/{id}', [Interviewee_AttributesController::class, 'destroy'])->name('intervieweeAttributes.destroy');
        Route::get('/create', [Interviewee_AttributesController::class, 'create'])->name('intervieweeAttributes.create');
        Route::post('/store-interviewee', [Interviewee_AttributesController::class, 'store'])->name('intervieweeAttributes.store');
    }
);

Route::prefix('interviewees')->group(
    function () {
        Route::get('/', [IntervieweeController::class, 'index'])->name('interviewees.index');
        Route::get('/edit-interviewees/{id}', [IntervieweeController::class, 'edit'])->name('interviewees.edit');
        Route::post('/update-interviewees/{id}', [IntervieweeController::class, 'update'])->name('interviewees.update');
        Route::get('/destroy/{id}', [IntervieweeController::class, 'destroy'])->name('interviewees.destroy');
        Route::get('/create', [IntervieweeController::class, 'create'])->name('interviewees.create');
        Route::post('/store-interviewees', [IntervieweeController::class, 'store'])->name('interviewees.store');
    }
);

require __DIR__ . '/auth.php';
