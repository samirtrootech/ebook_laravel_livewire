<?php

use App\Livewire\Admin\Books\Create as CreateBook;
use App\Livewire\Admin\Books\Edit as EditBook;
use App\Livewire\Admin\Books\Index as AdminBooks;
use App\Livewire\Admin\Users\Index as Users;
use App\Livewire\Admin\Users\Create as CreateUser;
use App\Livewire\Admin\Users\Edit as EditUser;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\BookDetails;
use App\Livewire\Books;
use App\Livewire\Favourites;
use App\Livewire\Register;
use App\Livewire\UserProfile;
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


// open
Route::get("/login", Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get("/forgot-password", ForgotPassword::class)->name('forgot.password');
Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
Route::get('/', Books::class)->name('front.books');

/** Admin **/
Route::middleware(['auth', 'adminCheck'])->prefix('admin')->group(function () {
    Route::prefix("books")->group(function () {
        Route::get("/", AdminBooks::class)->name('admin.books');
        Route::get("/create", CreateBook::class)->name('admin.books.create');
        Route::get("/edit/{book}", EditBook::class)->name('admin.books.edit');
        // Route::get("/logout", Login::class)->name('login');
    });
    Route::prefix("users")->group(function () {
        Route::get("/", Users::class)->name('admin.users');
        Route::get("/create", CreateUser::class)->name('admin.users.create');
        Route::get("/edit/{user}", EditUser::class)->name('admin.users.edit');
    });
});

/** Front **/
Route::middleware(['auth'])->group(function () {
    Route::get('/book/favourites', Favourites::class)->name('front.books.fav');
    Route::get('/book/{book}', BookDetails::class)->name('front.books.details');
    Route::get('/profile', UserProfile::class)->name('user.profile');
});
