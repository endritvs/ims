<?php

use Illuminate\Support\Facades\Route;
use App\Models\interviewee_types;
use App\Models\interviewee_attributes;
use App\Http\Controllers\IntervieweeController;
use App\Http\Controllers\IntervieweeTypesController;
use App\Http\Controllers\Interviewee_AttributesController;
use App\Http\Controllers\interviewer;
use App\Http\Controllers\interviewController;
use App\Http\Controllers\ReviewController;

use Illuminate\Support\Facades\Auth;
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

    if (Auth::check()) {
        return view('dashboard');
    } else {
        return view('/auth/login');
    }
});

Route::get('/interviewee', function () {
    return view('intervieweeComponents/intervieweeTable');
});

Route::get('/user', function () {
    return view('/components/user');
});

Route::get('/sidebari', function () {
    return view('/components/sidebari');
});

Route::get('/register', function () {
    return view('/auth/register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', function () {
    return view('profile/profile');
})->middleware(['auth'])->name('profile');


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


Route::prefix('interviewer')->group(
    function () {
        Route::get('/', [interviewer::class, 'index'])->name('interviewer.index');
        Route::get('/edit-interviewer/{id}', [interviewer::class, 'edit'])->name('interviewer.edit');
        Route::post('/update-interviewer/{id}', [interviewer::class, 'update'])->name('interviewer.update');
        Route::get('/destroy/{id}', [interviewer::class, 'destroy'])->name('interviewer.destroy');
        Route::get('/create', [interviewer::class, 'create'])->name('interviewer.create');
        Route::post('/store-interviewers', [interviewer::class, 'store'])->name('interviewer.store');
    }
);

Route::prefix('interview')->group(
    function () {
        Route::get('/', [interviewController::class, 'index'])->name('interview.index');
        Route::get('/edit-interview/{id}', [interviewController::class, 'edit'])->name('interview.edit');
        Route::post('/update-interview/{id}', [interviewController::class, 'update'])->name('interview.update');
        Route::get('/destroy/{id}', [interviewController::class, 'destroy'])->name('interview.destroy');
        Route::get('/create', [interviewController::class, 'create'])->name('interview.create');
        Route::post('/store-interview', [interviewController::class, 'store'])->name('interview.store');
        Route::get('/public', [interviewController::class, 'public_index'])->name('public.index');
        Route::get('/edit-profile/{id}', [interviewer::class, 'editProfile'])->name('interview.editProfile');
        Route::post('/update-profile/{id}', [interviewer::class, 'updateProfile'])->name('interview.updateProfile');
        Route::post('/update-password/', [interviewer::class, 'update_password'])->name('interview.updatePassword');
    }
);

Route::get('/dashboard', [interviewController::class, 'index1'])->name('dashboard.index');

Route::prefix('review')->group(
    function () {
        Route::get('/', [ReviewController::class, 'index'])->name('review.index');
        Route::get('/edit-interview/{id}', [interviewController::class, 'edit'])->name('interview.edit');
        Route::post('/update-interview/{id}', [interviewController::class, 'update'])->name('interview.update');
        Route::get('/destroy/{id}', [interviewController::class, 'destroy'])->name('interview.destroy');
        Route::get('/create', [interviewController::class, 'create'])->name('interview.create');
        Route::post('/store-interview', [interviewController::class, 'store'])->name('interview.store');
        Route::get('/public', [interviewController::class, 'public_index'])->name('public.index');
    }
);

require __DIR__ . '/auth.php';