<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\EducationalContentController;

// Rute untuk authentication (login, register, dan logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rute untuk homepage
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'showHome'])->name('home');
Route::get('/about', [HomeController::class, 'showAbout'])->name('about');

Route::resource('/forum', ForumController::class);


// Rute untuk profile
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('update_profile')->middleware('auth');

//forum
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('posts/{post}/likes', [LikeController::class, 'store'])->name('likes.store');
Route::delete('posts/{post}/likes', [LikeController::class, 'destroy'])->name('likes.destroy');

Route::get('posts/{post}', [ForumController::class, 'show'])->name('posts.show');
Route::post('posts/{post}/comments', [ForumController::class, 'storeComment'])->name('posts.comments.store');
Route::post('posts/{post}/likes', [ForumController::class, 'toggleLike'])->name('posts.likes.toggle');
Route::get('posts/create', [ForumController::class, 'create'])->name('posts.create');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('/forum', [ForumController::class, 'store'])->name('forum.store')->middleware('auth');

// Emergency
Route::get('/send-emergency', [EmergencyController::class, 'sendWhatsApp']);

Route::get('/home', [EducationalContentController::class, 'index']);


