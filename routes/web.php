<?php

use Illuminate\Support\Facades\Route;
use App\Models\interviewee_types;
use App\Models\interviewee_attributes;
use App\Http\Controllers\IntervieweeController;
use App\Http\Controllers\IntervieweeTypesController;
use App\Http\Controllers\Interviewee_AttributesController;
use App\Http\Controllers\interviewer;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\interviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewsAttributesController;
use App\Http\Controllers\AdditionalReviewsController;
use App\Http\Controllers\Auth\RegisteredUserController;
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
        return redirect('dashboard');
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

Route::get('/interviewDetails', function () {
    return view('/pages/interviewDetails');
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

Route::prefix('candidate-options')->group(
    function () {
        
        Route::get('/', [Interviewee_AttributesController::class, 'index'])->name('intervieweeAttributes.index');
        Route::get('/edit-interviewee/{id}', [Interviewee_AttributesController::class, 'edit'])->name('intervieweeAttributes.edit');
        Route::post('/update-interviewee/{id}', [Interviewee_AttributesController::class, 'update'])->name('intervieweeAttributes.update');
        Route::get('/destroy/{id}', [Interviewee_AttributesController::class, 'destroy'])->name('intervieweeAttributes.destroy');
        Route::get('/create', [Interviewee_AttributesController::class, 'create'])->name('intervieweeAttributes.create');
        Route::post('/store-interviewee', [Interviewee_AttributesController::class, 'store'])->name('intervieweeAttributes.store');
    }
);

Route::prefix('candidates')->group(
    function () {
        Route::get('/', [IntervieweeController::class, 'index'])->name('interviewees.index');
        Route::get('/edit-interviewees/{id}', [IntervieweeController::class, 'edit'])->name('interviewees.edit');
        Route::post('/update-interviewees/{id}', [IntervieweeController::class, 'update'])->name('interviewees.update');
        Route::get('/destroy/{id}', [IntervieweeController::class, 'destroy'])->name('interviewees.destroy');
        Route::get('/create', [IntervieweeController::class, 'create'])->name('interviewees.create');
        Route::post('/store-interviewees', [IntervieweeController::class, 'store'])->name('interviewees.store');
        Route::get('/sortName', [IntervieweeController::class, 'sortByName'])->name('interviewees.sortName');
    }
);


Route::prefix('questioners')->group(
    function () {
        Route::get('/', [interviewer::class, 'index'])->name('interviewer.index');
        Route::get('/edit-interviewer/{id}', [interviewer::class, 'edit'])->name('interviewer.edit');
        Route::post('/update-interviewer/{id}', [interviewer::class, 'update'])->name('interviewer.update');
        Route::get('/destroy/{id}', [interviewer::class, 'destroy'])->name('interviewer.destroy');
        Route::get('/create', [interviewer::class, 'create'])->name('interviewer.create');
        Route::post('/store-interviewers', [interviewer::class, 'store'])->name('interviewer.store');
    }
);

Route::prefix('comment')->group(
    function () {
        Route::get('/', [CommentController::class, 'index'])->name('comment.index');
        Route::post('/store', [CommentController::class, 'store'])->name('comment.store');
    }
);

Route::prefix('interview')->group(
    function () {
        Route::get('/', [interviewController::class, 'public_index'])->name('public.index');
        Route::get('/sort', [interviewController::class, 'sort'])->name('public.sort');
        Route::get('/sortDate', [interviewController::class, 'sortDate'])->name('public.sortDate');
        Route::get('/sortRating', [interviewController::class, 'sortRating'])->name('public.sortRating');
        Route::get('/public', [interviewController::class, 'index'])->name('interview.index');
        Route::get('/edit-interview/{id}', [interviewController::class, 'edit'])->name('interview.edit');
        Route::post('/update-interview/{id}', [interviewController::class, 'update'])->name('interview.update');
        Route::get('/destroy/{id}', [interviewController::class, 'destroy'])->name('interview.destroy');
        Route::get('/destroyComment/{id}', [interviewController::class, 'destroyComment'])->name('interview.Commentdestroy');
        Route::get('/create', [interviewController::class, 'create'])->name('interview.create');
        Route::post('/store-interview', [interviewController::class, 'store'])->name('interview.store');
        Route::post('/quickstore-interview', [interviewController::class, 'quickStore'])->name('interview.quickStore');
        Route::post('/update-profile/{id}', [interviewer::class, 'updateProfile'])->name('interview.updateProfile');
        Route::post('/update-password/', [interviewer::class, 'update_password'])->name('interview.updatePassword');
        Route::get('/{id}', [ReviewController::class, 'interviewAll'])->name('public.interviewAll');
        Route::post('/accept/{id}', [interviewController::class, 'accept'])->name('interview.accept');
        Route::post('/decline/{id}', [interviewController::class, 'decline'])->name('interview.decline');
    }
);
Route::get('/edit-profile/{id}', [interviewer::class, 'editProfile'])->name('interview.editProfile');
Route::get('/dashboard', [interviewController::class, 'index1'])->name('dashboard.index');

Route::prefix('review')->group(
    function () {
        Route::get('/candidate/{id}', [ReviewController::class, 'overallRating'])->name('review.index');
        Route::get('/edit-review/{id}', [ReviewController::class, 'edit'])->name('review.edit');
        Route::post('/update-review/{id}', [ReviewController::class, 'update'])->name('review.update');
        Route::get('/destroy/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
        Route::get('/allRatings', [ReviewController::class, 'create'])->name('review.create');
        Route::post('/store-review', [ReviewController::class, 'store'])->name('review.store');
        Route::post('/rate',[ReviewController::class,'rateComment'])->name('review.rateComment');
    }
);

Route::prefix('review_attributes')->group(
    function () {
        Route::get('/', [ReviewsAttributesController::class, 'index'])->name('review_attributes.index');
        Route::get('/edit-review/{id}', [ReviewsAttributesController::class, 'edit'])->name('review_attributes.edit');
        Route::post('/update-review/{id}', [ReviewsAttributesController::class, 'update'])->name('review_attributes.update');
        Route::get('/destroy/{id}', [ReviewsAttributesController::class, 'destroy'])->name('review_attributes.destroy');
        Route::get('/create', [ReviewsAttributesController::class, 'create'])->name('review_attributes.create');
        Route::post('/store-review', [ReviewsAttributesController::class, 'store'])->name('review_attributes.store');
  
    }
);

Route::get('/typeform', function () {
    return view('/auth/typeform');
});

Route::prefix('/typeform')->group(
    function () {
        Route::post('/store-typeform', [RegisteredUserController::class, 'typeform'])->name('typeform.typeform');
  
    }
);

Route::get('/additional_reviews', [AdditionalReviewsController::class, 'index'])->name('additional_reviews.index');

Route::get('/emailTest', function () {
    return view('interviewComponents/meetingEmail');
});

require __DIR__ . '/auth.php';